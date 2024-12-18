<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217233610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheteur (idAcheteur INT AUTO_INCREMENT NOT NULL, login_a VARCHAR(50) NOT NULL, pwd VARCHAR(50) NOT NULL, raison_sociale_entreprise VARCHAR(100) NOT NULL, loc_rue VARCHAR(12) NOT NULL, rue VARCHAR(80) NOT NULL, ville VARCHAR(50) NOT NULL, cp VARCHAR(5) NOT NULL, num_habilitation VARCHAR(50) NOT NULL, PRIMARY KEY(idAcheteur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bac (idBac INT AUTO_INCREMENT NOT NULL, tare VARCHAR(50) NOT NULL, type_bac VARCHAR(10) NOT NULL, PRIMARY KEY(idBac)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bateau (idBateau INT AUTO_INCREMENT NOT NULL, nom_bateau VARCHAR(50) NOT NULL, PRIMARY KEY(idBateau)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece (idEspece INT AUTO_INCREMENT NOT NULL, nom_espece VARCHAR(50) NOT NULL, nom_scientifique_espece VARCHAR(80) NOT NULL, nom_commun_espece VARCHAR(50) NOT NULL, PRIMARY KEY(idEspece)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (idPanier INT AUTO_INCREMENT NOT NULL, total NUMERIC(15, 2) NOT NULL, idAcheteur INT NOT NULL, INDEX IDX_24CC0DF263E9D5C6 (idAcheteur), PRIMARY KEY(idPanier)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peche (datePeche DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', idBateau INT NOT NULL, INDEX IDX_E96511E2C57518C0 (idBateau), PRIMARY KEY(idBateau, datePeche)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (idPresentation INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(idPresentation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualite (idQualite INT AUTO_INCREMENT NOT NULL, specification_qualite VARCHAR(20) NOT NULL, PRIMARY KEY(idQualite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille (idTaille INT AUTO_INCREMENT NOT NULL, specification VARCHAR(50) NOT NULL, PRIMARY KEY(idTaille)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF263E9D5C6 FOREIGN KEY (idAcheteur) REFERENCES acheteur (idAcheteur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT FK_E96511E2C57518C0 FOREIGN KEY (idBateau) REFERENCES bateau (idBateau) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF263E9D5C6');
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY FK_E96511E2C57518C0');
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE bac');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE peche');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE taille');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
