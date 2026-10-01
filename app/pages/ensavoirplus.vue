<script setup lang="ts">
useSeoMeta({
  title: 'En savoir plus',
  description: "Parcours, projets professionnels et personnels, recherche d'emploi et passions d'Hollux, développeur web alsacien.",
})

const age = ageAt()
</script>

<template>
  <div>
    <div class="container">
      <h1>En savoir plus !</h1>
      <p>En bref : développeur web, Alsacien, apprend de tout.</p>
    </div>
    <div class="trait" />

    <div class="container accordion">
      <details name="ensavoirplus" open>
        <summary><h2>Qui suis-je ?</h2></summary>
        <p>
          Mon nom est <b>Adrien Marchand</b> mais je suis aussi appelé <b>Hollux</b> sur la toile.<br />
          Je suis calme, presque flegmatique mais aussi énergique et efficace. Je déteste ne rien faire.<br />
          Je suis avide de connaissances, toujours en quête de nouveaux défis pour m'occuper et progresser.
        </p>
        <p>
          J'écoute aussi beaucoup les avis et conseils de tous pour me faire ma propre opinion et évoluer dans les divers
          domaines qui m'intéressent.
        </p>
      </details>

      <details name="ensavoirplus">
        <summary><h2>Ma vie</h2></summary>
        <p>
          <b>Développeur web</b> de {{ age }} ans, j'ai découvert le web très jeune, alors qu'il fallait presque une
          semaine pour télécharger (légalement !) un film. Depuis je ne l'ai plus quitté. J'ai également une appétence
          pour le hardware, et je monte moi-même mes ordinateurs depuis que j'ai 10 ans.
        </p>
        <p>
          J'ai d'abord été technicien en électricité, mais ce métier n'était pas assez stimulant pour moi. J'ai donc
          changé de voie et suivi une formation de <b>développeur / intégrateur web</b> pour faire un travail qui me
          motive plus.
        </p>
        <p>
          Alsacien d'origine, j'ai vécu 2 ans à Metz, puis 3 ans à Lyon (mon premier poste de développeur) et 2 ans à
          Mulhouse. Enfin, je suis de retour vers Strasbourg depuis 5 ans.
        </p>
      </details>

      <details name="ensavoirplus">
        <summary><h2>Projets professionnels</h2></summary>
        <p>Quelques informations complémentaires sur ce que je faisais à Alcyon :</p>
        <ul>
          <li>
            J'ai passé un an et demi à travailler sur <b>Symfony</b> avec le lead développeur David De Sousa, qui m'a
            formé et m'a beaucoup aidé à progresser en tant que développeur ainsi que sur le framework Symfony.
          </li>
          <li>
            À son départ, j'ai mis le nez dans quelques autres projets de l'entreprise en plus de Symfony : du Zend
            Framework 1 pour du debug, DPI, maintenance. Je suis également intervenu sur de la maintenance d'une
            application Android en Java, et enfin j'ai fait un essai de Progressive Web App en Vue.js.
          </li>
          <li>Tout ceci a été parsemé de divers outils : NetBeans, PhpStorm, GitHub, SVN, SoapUI, etc.</li>
          <li>J'ai fini par près de 6 mois sur <b>Vue.js</b>.</li>
        </ul>
        <p>
          Chez 2LE, j'ai travaillé sur plusieurs projets pour lesquels j'ai utilisé Symfony, Vue.js, et les outils
          habituels (PhpStorm, GitHub, etc.).
        </p>
        <p>
          Mon passage chez Thuria a été rapide. Je n'ai pas accroché avec WordPress, leur outil principal, mais mon
          intérêt pour le code complexe m'a permis d'y développer quelques modules et bouts de code à faire pâlir les
          collègues !
        </p>
        <p>
          J'arrive ensuite à Jaune de Mars. Pendant 2 ans, j'ai fait évoluer un code écrit from scratch avec le plus
          possible de rigueur, de MVC, d'objet et de SOLID. Chaque nouvel outil était un défi très intéressant dans
          cette société.
        </p>
        <p>
          Enfin je suis arrivé chez Sermes, où j'ai passé 2 ans et demi qui m'en ont semblé 10 tant les journées étaient
          remplies ! Lead développeur dans un petit service, cela correspondait à des missions très diverses :
        </p>
        <ul>
          <li>
            Chef de projet : réunions avec le métier et prise de toutes les décisions techniques, définition des délais,
            démystification du développement aux non-initiés.
          </li>
          <li>
            Scrum master : gestion et répartition des tickets, réunions sprint, points projet avec un Product Owner qui
            n'allait pas voir les clients...
          </li>
          <li>
            Développeur full stack, une grande part de mon travail : réalisation des développements, tests, vérification
            des merge requests.
          </li>
          <li>Administrateur système : Docker, serveurs internes, etc.</li>
          <li>Conseiller pour tout ce qui concernait les réalisations avec les prestataires sur les 2 e-shops.</li>
        </ul>
        <p>
          Chaque jour là-bas était une aventure, il fallait gérer mille choses différentes chaque semaine ! Sans compter
          la période de cyberattaque, où il a fallu faire le tour de tous les PC de l'entreprise de Strasbourg à
          Molsheim, tout en installant des Windows par paquets de 100.
        </p>
      </details>

      <details name="ensavoirplus">
        <summary><h2>Projets personnels</h2></summary>
        <p>
          À mes heures perdues je réalise des projets personnels divers et variés. Tous résultent simplement de mon envie
          d'en apprendre plus, de m'entraîner mais aussi d'aider.
        </p>
        <p>J'ai commencé par des sites sandbox personnels de différentes façons :</p>
        <ul>
          <li>V1 : pré-formation, à coup de tutoriels entièrement en HTML/CSS.</li>
          <li>V2 : post-formation, on débute du vrai code avec un petit framework MVC maison.</li>
          <li>
            V3 : là on passe enfin à <b>Symfony 3</b> ! Presque 2 ans à m'amuser et à faire des petits modules, des
            jeux, des tests, bref, tout ce qui me passe par la tête.
          </li>
          <li>V4 : en <b>Symfony 4</b>, où tout doucement je remets certains modules et certaines choses.</li>
          <li>V5 : la version actuelle en <b>Nuxt</b>, j'aime la réactivité de Vue.js.</li>
        </ul>
        <p>
          En plus de ça, j'ai créé un template <b>WordPress</b> pour une ludothèque où je suis bénévole. J'ai choisi
          WordPress car j'étais ainsi sûr d'une administration standard et facile pour eux. J'ai également décliné un
          thème WordPress existant pour un client (thème enfant).
        </p>
        <p>J'ai également réalisé deux sites en Symfony 3 pour des commandes.</p>
        <p>Un drive pour une ludothèque réalisé en Nuxt + Symfony, lié à leur outil de gestion (Ludoprêt).</p>
        <p>Un outil web pour le jeu vidéo Genshin Impact.</p>
        <p>Le site météo basé sur Horbourg-Wihr avec ses graphiques, ses données, etc.</p>
        <p>
          Une commande très particulière pour le livre-énigme La Clef, avec toutes ses contraintes techniques, ses secrets
          et certaines réalisations à l'aveugle à la demande des auteurs.
        </p>
        <p>
          Pour en savoir plus sur les serveurs et le fonctionnement de mes sites, je me suis formé à l'administration
          système. J'ai commencé avec un petit serveur sur un Raspberry Pi, puis j'ai fait l'acquisition d'un NUC afin
          d'avoir un peu plus de puissance pour me faire un environnement plus propre, avec pour but l'<b
            >intégration continue</b
          >.<br />
          J'ai continué mon environnement de développement avec l'achat d'un Mac pour travailler sur une machine bien
          plus adaptée au code que mon PC Windows standard. Maintenant à fond sur Docker et ses très nombreuses
          possibilités.
        </p>
      </details>

      <details name="ensavoirplus">
        <summary><h2>Recrutement</h2></summary>
        <p>Comme indiqué sur ma page CV, je suis à la recherche d'un poste de <b>lead développeur</b>.</p>
        <p>
          Ce que je fais de mieux, ce sont des outils pratiques et utiles aux entreprises pour gagner toujours plus de
          temps, être toujours plus précis, rapide et garder sa compétitivité dans un monde en constante évolution
          informatique.
        </p>
        <p>
          Je cherche un emploi sur des sujets qui me passionnent : travailler sur un <b>framework JS</b>, principalement
          <b>Vue.js / React</b> qui me semblent avoir un potentiel énorme, et continuer à utiliser un
          <b>framework PHP</b> récent comme Symfony ou Laravel pour la partie serveur.<br />
          Je voudrais aussi faire des webservices, des API, du code propre, testé et stable. Et qui sait, peut-être même
          pouvoir me tourner vers des applications mobiles ou des progressive web apps !
        </p>
        <p>
          L'idéal pour moi serait d'être dans une entreprise avec un environnement de travail moderne : télétravail,
          utilisation de git, intégration continue, travail d'équipe, une bonne machine adaptée au développement avec les
          programmes nécessaires.
        </p>
      </details>

      <details name="ensavoirplus">
        <summary><h2>Mes passions</h2></summary>
        <p>
          En continuelle recherche de passe-temps stimulants, je suis devenu un passionné de jeux en tous genres : jeux
          de plateau, de figurines, de cartes ou de dés, jeux vidéo...
        </p>
        <p>
          Très clairement attiré par la stratégie, cela a fortement développé ma réflexion, et fait que j'apprends très
          vite avec une logique assez brute.
        </p>
        <p>
          Depuis plusieurs années je fais aussi du 4x4 radiocommandé (crawler), un monde passionnant rempli de défis
          techniques, d'optimisation et de précision.
        </p>
        <p>
          Je m'intéresse également au cinéma, aux séries, à la BD. Je joue de la guitare, et fais du jonglage (parfois
          même avec du feu).
        </p>
      </details>
    </div>
  </div>
</template>

<style scoped>
summary {
  display: flex;
  align-items: center;
  gap: 25px;
  padding: 0.375rem 0.75rem;
  cursor: pointer;
  list-style: none;
}

summary::-webkit-details-marker {
  display: none;
}

summary h2 {
  flex: none;
  margin: 30px 0;
}

/* Trait horizontal puis flèche, qui pivote à l'ouverture */
summary::before {
  content: '';
  order: 1;
  flex: 1;
  border-top: 1px solid var(--c-ink);
}

summary::after {
  content: '';
  order: 2;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid var(--c-ink);
  transform: rotate(-90deg);
  transition: transform 0.3s ease;
}

details[open] > summary::after {
  transform: rotate(0deg);
}

details > :not(summary) {
  padding: 0 1.25rem;
}

details[open] {
  padding-bottom: 1rem;
}
</style>
