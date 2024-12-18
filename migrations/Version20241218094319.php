<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218094319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lot (id_lot INT AUTO_INCREMENT NOT NULL, id_bateau INT DEFAULT NULL, date_peche DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', poids_brut_lot VARCHAR(50) NOT NULL, prix_plancher NUMERIC(10, 2) NOT NULL, prix_depart NUMERIC(10, 2) NOT NULL, prix_enchere_max NUMERIC(10, 2) NOT NULL, date_enchere DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', heure_debut_enchere TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', idTaille INT NOT NULL, idPresentation INT NOT NULL, idBac INT NOT NULL, idQualite INT NOT NULL, idEspece INT NOT NULL, idAcheteur INT NOT NULL, idPanier INT NOT NULL, INDEX IDX_B81291B805305B75395F96E (id_bateau, date_peche), INDEX IDX_B81291B154123A2 (idTaille), INDEX IDX_B81291BC5F84C62 (idPresentation), INDEX IDX_B81291B3D07B1DF (idBac), INDEX IDX_B81291B780A3CAD (idQualite), INDEX IDX_B81291B62B3092B (idEspece), INDEX IDX_B81291B63E9D5C6 (idAcheteur), INDEX IDX_B81291B47DDA568 (idPanier), PRIMARY KEY(id_lot)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B805305B75395F96E FOREIGN KEY (id_bateau, date_peche) REFERENCES peche (idBateau, datePeche)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B154123A2 FOREIGN KEY (idTaille) REFERENCES taille (idTaille) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BC5F84C62 FOREIGN KEY (idPresentation) REFERENCES presentation (idPresentation) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B3D07B1DF FOREIGN KEY (idBac) REFERENCES bac (idBac) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B780A3CAD FOREIGN KEY (idQualite) REFERENCES qualite (idQualite) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B62B3092B FOREIGN KEY (idEspece) REFERENCES espece (idEspece) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B63E9D5C6 FOREIGN KEY (idAcheteur) REFERENCES acheteur (idAcheteur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B47DDA568 FOREIGN KEY (idPanier) REFERENCES panier (idPanier) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B805305B75395F96E');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B154123A2');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BC5F84C62');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B3D07B1DF');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B780A3CAD');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B62B3092B');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B63E9D5C6');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B47DDA568');
        $this->addSql('DROP TABLE lot');
    }
}
