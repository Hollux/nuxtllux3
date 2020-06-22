<template>
  <div class="enSavoirPlus">
  	<div class="container">
    	<h1>En savoir plus</h1>
    	<p>En bref : développeur web, Alsacien, fan de cinéma.</p>
	</div>
	<div class="trait"></div>
	<div class="container">
		<b-button v-b-toggle.quiSuisJe><h2>qui suis-je ?</h2><hr class="quiSuisJe"/></b-button><br/>
		<b-collapse id="quiSuisJe">
	      <b-card>
	        <p>
				Mon nom est <b>Adrien Marchand</b> mais je suis aussi appelé <b>Hollux</b> sur la toile.<br/>
				Je suis calme, presque flegmatique mais aussi énergique et efficace. Je déteste ne rien faire.<br/>
				Je suis avide de connaissances, toujours en quête de nouveaux défis pour m'occuper et progresser.
			</p>
			<p>
				J'écoute aussi beaucoup les avis et conseils de tous pour me faire ma propre opinion et évoluer dans les divers domaines qui m'intéressent.
			</p>
	      </b-card>
	    </b-collapse>

		<b-button v-b-toggle.maVie><h2>ma vie</h2><hr class="maVie"/></b-button><br/>
		<b-collapse id="maVie">
	      <b-card>
	        <p>
				<b>Développeur web </b> de 29 ans, j'ai découvert le web très jeune, alors qu'il fallait presque une semaine pour télécharger (légalement !) un film. Depuis je ne l'ai plus quitté. J'ai également une appétence pour le hardware, et je monte moi-même mes ordinateurs depuis que j'ai 10 ans.
			</p>
			<p>
				J'ai d'abord été Technicien en Electricité, mais ce métier n'était pas assez stimulant pour moi. J'ai donc changé de voie et ai suivi une formation de <b>développeur / intégrateur web</b> pour faire un travail qui me motive plus.
			</p>
			<p>
				Alsacien d'origine, je suis parti sur Lyon 3 ans, durant lesquels j'ai travaillé pour la société Alcyon. Maintenant de retour dans ma région, je suis à la recherche d'un poste captivant et durable.
			</p>
	      </b-card>
	    </b-collapse>
	    <b-button v-b-toggle.projetsPro><h2>projets professionnels</h2><hr class="projetsPro"/></b-button><br/>
		<b-collapse id="projetsPro">
	      <b-card>
	        <p>
				Quelques informations complémentaires sur ce que je faisais à Alcyon :
			</p>
			<ul>
				<li>J'ai passé un an et demi à travailler sur <b>Symfony</b> avec le lead developper David De Sousa, qui m'a formé et m'a beaucoup aidé à progresser en tant que développeur ainsi que sur le framework Symfony. </li>
				<li>À son départ, j'ai mis le nez dans quelques autres projets de l'entreprise en plus de Symfony : du Zend Framework 1 pour debug, DPI, maintenance. Je suis également intervenu sur de la maintenance sur une application Android en Java, et enfin j'ai fait un essai de Progressive Web App en Vue.JS</li>
				<li>Tout ceci a été parsemé de divers outils : netbean, PhpStorm, GitHub, svn, SoapUI, etc.</li>
				<li>J'ai fini par près de 6 mois sur <b>Vue.JS</b>.</li>
			</ul>
			<p>
				Chez 2LE, j'ai travaillé sur plusieurs projets pour lesquels j'ai utilisé Symfony, Vue.JS, et les outils habituels (PhpStorm, GitHub, etc.).
			</p>
	      </b-card>
	    </b-collapse>
	    <b-button v-b-toggle.projetsPerso><h2>projets personnels</h2><hr class="projetsPerso"/></b-button><br/>
		<b-collapse id="projetsPerso">
	      <b-card>
	        <p>
				À mes heures perdues je réalise des projets personnels divers et variés. Tous résultent simplement de mon envie d'en apprendre plus, de m'entraîner mais aussi d'aider.
			</p>
			<p>J'ai commencé par des sites sandbox personnels de différente façons :</p>
			<ul>
				<li>V1 : pré-formation, à coup de tutoriels entièrement en HTML/CSS.</li>
				<li>V2 : post-formation, on débute du vrai code avec un petit framework MVC maison.</li>
				<li>V3 : Là on passe enfin à <b>Symfony 3</b> ! Presque 2 ans à m'amuser et à faire des petits modules, des jeux, des tests, bref, tout ce qui me passe par la tête.</li>
				<li>V4 : Dernière version en <b>Symfony 4</b>, où tout doucement je remets certains modules et certaines choses.</li>
				<li>V5 : La version actuelle en <b>NuxtJS</b>, j'aime la réactivité de Vue.JS. Je vais rapidement rajouter des liens vers la V4 qui va servir d'API et combler ce que je n'ai pas re-développé.</li>
			</ul>
			<p>En plus de ça, j'ai créé un template <b>Wordpress</b> pour une ludothèque où je suis bénévole. J'ai choisi Wordpress car j'étais ainsi sûr d'une administration standard et facile pour eux. J'ai également décliné un thème Wordpress existant pour un client (thème enfant).</p>
			<p>J'ai aussi fait un petit site vitrine avec mon framework maison.</p>
			<p>J'ai également réalisé deux sites en Symfony 3 pour des commandes.</p>
			<p>Et le dernier arrivé, un drive pour une ludothèque réalisé en NuxtJS + Symfony, lié à leur outil de gestion (Ludoprêt).</p>

			<p>J'ai aussi voulu en savoir plus sur les serveurs et comment fonctionnaient mes sites. J'ai donc commencé avec un petit serveur sur un Raspberry, puis j'ai fait l'acquisition d'un NUC afin d'avoir un peu plus de puissance pour me faire un environnement plus propre, avec à terme de l'<b>intégration continue</b>.<br/>
			Enfin, j'ai finalisé mon environnement de développement avec l'achat d'un Mac pour travailler sur une machine bien plus adaptée au code que mon PC Windows standard.</p>
			</p>
	      </b-card>
	    </b-collapse>
	    <b-button v-b-toggle.recrutement><h2>recrutement</h2><hr class="recrutement"/></b-button><br/>
		<b-collapse id="recrutement">
	      <b-card>
	        <p>Comme indiqué sur ma page CV, je suis à la recherche d'un poste de <b>développeur web fullstack</b>.</p>
			<p>
				Je cherche un emploi sur des sujets qui me passionnent : travailler sur un <b>framework JS</b>, principalement <b>Vue.JS</b> voire ReactJS qui me semblent avoir un potentiel énorme, et continuer à utiliser un <b>framework PHP</b> récent comme Symfony ou Laravel pour la partie serveur.<br/>

				Je voudrais aussi faire des webservices, des API, du code propre, testé et stable. Et qui sait, peut-être même pouvoir me tourner vers des applications mobiles ou des progressive web app !</p>

				<p>L'idéal pour moi serait d'être dans une entreprise avec un environnement de travail moderne : possibilité de télétravail, utilisation de git, intégration continue, travail d'équipe, une bonne machine adaptée au développement avec les programmes nécessaires.</p>
	      </b-card>
	    </b-collapse>
	    <b-button v-b-toggle.passions><h2>mes passions</h2><hr class="passions"/></b-button><br/>
		<b-collapse id="passions">
	      <b-card>
	        <p>En continuelle recherche de passe-temps stimulants, je suis devenu un passionné de jeux en tous genres : jeux de plateau, de figurines, de cartes ou de dés, jeux vidéos...</p>
            <p>Très clairement attiré par la stratégie, cela a fortement développé ma réflexion, et fait que j'apprends très vite avec une logique assez brute.</p>
            <p>Je m'intéresse également au modélisme, au cinéma, aux séries. Je joue de la guitare, et fais du jonglage (parfois même avec du feu).</p>
	      </b-card>
	    </b-collapse>
	</div>
  </div>
</template>


<style lang="scss" scoped>
	.btn-secondary {
		background-color: transparent;
		border-color: transparent;
		color:black;
		width: 100%;
    	text-align: left;
	}
	.btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active, .show > .btn-secondary.dropdown-toggle {
		background-color: transparent;
		border-color: transparent;
		color:black;
	}
	.btn-secondary:focus, .btn-secondary.focus {
		box-shadow: none;
	}
	hr {
		border-top:1px solid black;
		margin-top:-43px;
	}
	hr.quiSuisJe {
		margin-left:180px;
	}
	hr.maVie {
		margin-left:96px;
	}
	hr.projetsPro {
		margin-left:290px;
	}
	hr.projetsPerso {
		margin-left:240px;
	}
	hr.recrutement {
		margin-left:155px;
	}
	hr.passions {
		margin-left:165px;
	}
	.card {
		border: none;
		border-radius: 0;
	}
</style>

