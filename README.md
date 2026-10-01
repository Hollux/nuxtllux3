# hollux.fr

Site portfolio d'Hollux / Adrien Marchand, en Nuxt 4, généré en statique.

## Prérequis

Node 24 (voir `.nvmrc`) : `nvm install && nvm use`.

## Commandes

```bash
make install    # npm install
make up         # serveur de dev sur 127.0.0.1:3001, servi par Apache sur https://holluxdev.hollux.fr
make down       # arrête le serveur de dev
make generate   # génère le site statique dans .output/public
make            # aide : toutes les commandes
```

## Mise en production

Même chaîne que les autres projets : la **forge** (Forgejo sur nuclluxII, via Tailscale)
génère le site et construit l'image ; **debianProd** la télécharge et la garde sur place,
ce qui permet un retour arrière même forge éteinte.

    nuclluxII                                                 debianProd
    git push ──► forge : génération complète du site à chaque push
    make release v=v3.0.0 ──► tag ──► génération ──► image hollux-site ──► registre
                                                                   │ (Tailscale)
                                  prod hollux deploy v3.0.0 ◄──────┘
                                  prod hollux rollback v2.9.0   (100 % local)

- Forge : https://hlxvault.tail47a825.ts.net:8443/hollux/hollux (CI : onglet Actions,
  `.forgejo/workflows/ci.yml`). Si la génération échoue (page en erreur, lien interne
  cassé), aucune image n'est publiée.
- L'image `hollux-site` (`Dockerfile`) contient le site généré servi par nginx
  (`deploy/nginx.conf`) ; Apache relaie hollux.fr vers `127.0.0.1:2330`.

Sur nuclluxII, `master` propre et poussé sur la forge :

    make release v=v3.0.0        # tag : la forge génère puis construit l'image (~2 min)

Sur debianProd, en compte hollux :

    prod hollux deploy v3.0.0    # télécharge, bascule, attend que le site réponde
    prod hollux versions         # versions présentes sur le serveur (* = en service)
    prod hollux status           # conteneur ; logs pour le détail
    prod hollux rollback v2.9.0  # retour arrière, sans réseau

### Installer sur debianProd (une seule fois)

    sudo install -d -o hollux -g prodops -m 2775 /srv/hollux /srv/hollux/shared
    # depuis ce dépôt : deploy/prod.conf.exemple -> /srv/hollux/shared/prod.conf
    #                   deploy/env.prod.exemple  -> /srv/hollux/shared/.env
    prod hollux deploy v3.0.0
    curl -sI http://127.0.0.1:2330/              # 200 : le site tourne

Puis bascule du domaine (hollux.fr est encore chez OVH) : DNS `hollux.fr` et
`www.hollux.fr` → debianProd, puis le vhost `deploy/apache/hollux.fr.conf` (procédure
en tête du fichier, certbot compris).

`public/sw.js` est un service worker auto-destructeur : il désinstalle celui de l'ancienne version (PWA Nuxt 2) chez les visiteurs. Il doit rester en ligne.

## Structure

- `app/pages/` : une page par route (accueil, compétences, réalisations, CV, en savoir plus, mentions légales)
- `app/components/` : en-tête, pied de page, bouton « trait », carte de projet
- `public/img/` : images sources, optimisées en WebP à la génération par `@nuxt/image`
- `server/routes/sitemap.xml.ts` : sitemap, pré-rendu à la génération
- `deploy/` : vhosts Apache (dev et prod), nginx de l'image, réglages de l'outil `prod`
- `Dockerfile`, `docker-compose.prod.yaml`, `.forgejo/workflows/ci.yml` : chaîne de mise en production
