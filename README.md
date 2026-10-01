# hollux.fr

Site portfolio d'Hollux / Adrien Marchand, en Nuxt 4, généré en statique.

## Prérequis

Node 24 (voir `.nvmrc`) : `nvm install && nvm use`.

## Commandes

```bash
make install    # npm install
make dev        # serveur de dev sur 127.0.0.1:3001, servi par Apache sur https://holluxdev.hollux.fr
make stop       # arrête le serveur de dev
make generate   # génère le site statique dans .output/public
```

## Mise en production

`make generate`, puis déposer le contenu de `.output/public/` à la racine de l'hébergement OVH (hollux.fr).

`public/sw.js` est un service worker auto-destructeur : il désinstalle celui de l'ancienne version (PWA Nuxt 2) chez les visiteurs. Il doit rester en ligne.

## Structure

- `app/pages/` : une page par route (accueil, compétences, réalisations, CV, en savoir plus, contact, mentions légales)
- `app/components/` : en-tête, pied de page, bouton « trait », grille d'outils, carte de projet
- `public/img/` : images sources, optimisées en WebP à la génération par `@nuxt/image`
- `server/routes/sitemap.xml.ts` : sitemap, pré-rendu à la génération
- `deploy/apache/` : vhost du serveur de dev
