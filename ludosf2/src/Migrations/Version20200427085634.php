<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200427085634 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE liste_jeux (id INT AUTO_INCREMENT NOT NULL, code_jeu INT NOT NULL, nom_jeu VARCHAR(255) NOT NULL, suspendu VARCHAR(255) NOT NULL, date_achat VARCHAR(55) DEFAULT NULL, emplacement VARCHAR(255) DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, annee_edition VARCHAR(255) DEFAULT NULL, nb_joueurs VARCHAR(55) DEFAULT NULL, age_joueurs VARCHAR(55) DEFAULT NULL, manque VARCHAR(255) DEFAULT NULL, type_jeu VARCHAR(255) DEFAULT NULL, nb_pieces VARCHAR(255) DEFAULT NULL, temps_jeu VARCHAR(255) DEFAULT NULL, etat_jeu VARCHAR(255) DEFAULT NULL, descriptif1 VARCHAR(255) DEFAULT NULL, descriptif2 VARCHAR(255) DEFAULT NULL, descriptif3 VARCHAR(255) DEFAULT NULL, lien_img VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, nb_points VARCHAR(255) DEFAULT NULL, niveau_jeu VARCHAR(255) DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, prix_estimÈ VARCHAR(255) DEFAULT NULL, auteur VARCHAR(255) DEFAULT NULL, illustrateur VARCHAR(255) DEFAULT NULL, sur_place VARCHAR(255) DEFAULT NULL, contenu1 VARCHAR(255) DEFAULT NULL, contenu2 VARCHAR(255) DEFAULT NULL, hlx VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE liste_jeux');
    }
}
