<template>
  <div>
    <h2>Expériences professionnelles</h2>
    <ul v-for="experience in experiences" :key="experience.index" class="experiencefor">
      <li>
        <p>
          <b>{{ experience.periodes }} : {{ experience.titre }}</b>
          // <i>{{ experience.personne }}</i>
        </p>
        <p v-html="experience.text"></p>
      </li>
      <br />
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      experiences: [
        {
          periodes: "Août 2023 à aujourd'hui",
          titre: "Lead Développeur",
          personne: "Sermes",
          text:
            "Développement d’outils internes en Symfony / React / SQL. Analyse et réalisation des demandes internes, gestion des serveurs, relation avec les clients / prestataires / autres développeurs, gestion de projet. Encadrement de l'équipe de développement web, collaboration avec l’équipe AS400 gérant l’ERP de l’entreprise."
        },
        {
          periodes: "Novembre 2021 à août 2023",
          titre: "Développeur Full Stack",
          personne: "Jaune de Mars",
          text:
            "Administration et évolution d'un outil complet de gestion d’ascenseur : clients, appareils, techniciens, tickets, suivi des interventions, API, etc. Site PHP \"fait main\" avec évolutions MVC / Objet s'inspirant des framework modernes."
        },
        {
          periodes: "Juillet à novembre 2021",
          titre: "Développeur Full Stack",
          personne: "Agence Thuria",
          text:
            "Création de sites administrables avec modules de gestion pour les offices de tourisme, entièrement réalisés en Wordpress / PHP, Twig, JS."
        },
        {
          periodes: "Juin à novembre 2019",
          titre: "Chef de projet / Développeur Full Stack",
          personne: "2LE",
          text:
            "Migration d’un site de Symfony 2 vers Symfony 4 + Vue.JS. Gestion de projet web.",
        },
        {
          periodes: "Mars 2016 à janvier 2019",
          titre: "Développeur Full Stack",
          personne: "Alcyon France",
          text:
            "Travail sur la refonte du site d’Alcyon en Symfony 3 pendant 2 ans(site marchand, accès privé, catalogue en ligne, applications web à destination des vétérinaires). Maintenance de l’ancien site sous Zend Framework 1. Développement d’une application Android en Java.Recherches pour la création d'une progressive web app."
        }
      ],
      formations: [
        {
          periodes: "Septembre 2018",
          titre: "Formation Vue.JS",
          personne: "// Zenika",
          text: ""
        },
        {
          periodes: "Janvier 2017",
          titre: "Formations Symfony : SFC3 / SFC4",
          personne: "// Sensiolabs",
          text: ""
        },
        {
          periodes: "Octobre à décembre 2015",
          titre: "Formation de Développeur / intégrateur",
          personne: "// 3WAcademy",
          text: ""
        },
        {
          periodes: "Janvier 2011 à décembre 2014",
          titre: "Formation et travail en tant que Technicien en électricité",
          personne: "",
          text: ""
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.experiencefor {
  margin-bottom: 10px;
}
</style>