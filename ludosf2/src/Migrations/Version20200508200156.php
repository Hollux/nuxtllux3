<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508200156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(55) NOT NULL, password VARCHAR(64) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', username VARCHAR(55) DEFAULT NULL, member_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link_liste_jeux (id INT AUTO_INCREMENT NOT NULL, nom_jeu VARCHAR(255) DEFAULT NULL, suspendu VARCHAR(255) DEFAULT NULL, date_achat VARCHAR(55) DEFAULT NULL, emplacement VARCHAR(255) DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, annee_edition VARCHAR(255) DEFAULT NULL, nb_joueurs VARCHAR(55) DEFAULT NULL, age_joueurs VARCHAR(55) DEFAULT NULL, manque VARCHAR(255) DEFAULT NULL, type_jeu VARCHAR(255) DEFAULT NULL, nb_pieces VARCHAR(255) DEFAULT NULL, temps_jeu VARCHAR(255) DEFAULT NULL, etat_jeu VARCHAR(255) DEFAULT NULL, descriptif1 VARCHAR(255) DEFAULT NULL, descriptif2 VARCHAR(255) DEFAULT NULL, descriptif3 VARCHAR(255) DEFAULT NULL, lien_img VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, nb_points VARCHAR(255) DEFAULT NULL, niveau_jeu VARCHAR(255) DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, prix_estimÈ VARCHAR(255) DEFAULT NULL, auteur VARCHAR(255) DEFAULT NULL, illustrateur VARCHAR(255) DEFAULT NULL, sur_place VARCHAR(255) DEFAULT NULL, contenu1 VARCHAR(255) DEFAULT NULL, contenu2 VARCHAR(255) DEFAULT NULL, external_url VARCHAR(255) DEFAULT NULL, hlx VARCHAR(255) DEFAULT NULL, listeJeu_codejeu INT DEFAULT NULL, UNIQUE INDEX UNIQ_4188B52B712E5C41 (listeJeu_codejeu), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_jeux (id INT AUTO_INCREMENT NOT NULL, code_jeu VARCHAR(54) NOT NULL, nom_jeu VARCHAR(255) NOT NULL, suspendu VARCHAR(255) DEFAULT NULL, date_achat VARCHAR(55) DEFAULT NULL, emplacement VARCHAR(255) DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, annee_edition VARCHAR(255) DEFAULT NULL, nb_joueurs VARCHAR(55) DEFAULT NULL, age_joueurs VARCHAR(55) DEFAULT NULL, manque VARCHAR(255) DEFAULT NULL, type_jeu VARCHAR(255) DEFAULT NULL, nb_pieces VARCHAR(255) DEFAULT NULL, temps_jeu VARCHAR(255) DEFAULT NULL, etat_jeu VARCHAR(255) DEFAULT NULL, descriptif1 VARCHAR(255) DEFAULT NULL, descriptif2 VARCHAR(255) DEFAULT NULL, descriptif3 VARCHAR(255) DEFAULT NULL, lien_img VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, nb_points VARCHAR(255) DEFAULT NULL, niveau_jeu VARCHAR(255) DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, prix_estimÈ VARCHAR(255) DEFAULT NULL, auteur VARCHAR(255) DEFAULT NULL, illustrateur VARCHAR(255) DEFAULT NULL, sur_place VARCHAR(255) DEFAULT NULL, contenu1 VARCHAR(255) DEFAULT NULL, contenu2 VARCHAR(255) DEFAULT NULL, hlx VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE link_liste_jeux ADD CONSTRAINT FK_4188B52B712E5C41 FOREIGN KEY (listeJeu_codejeu) REFERENCES liste_jeux (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE link_liste_jeux DROP FOREIGN KEY FK_4188B52B712E5C41');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE link_liste_jeux');
        $this->addSql('DROP TABLE liste_jeux');
    }
}
