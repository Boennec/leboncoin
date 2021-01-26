<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126144530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, idcategorie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, debut DATETIME NOT NULL, fin DATETIME NOT NULL, prixdepart DOUBLE PRECISION DEFAULT NULL, priximmediat DOUBLE PRECISION DEFAULT NULL, photos LONGTEXT NOT NULL, INDEX IDX_F65593E5FA5A9824 (idcategorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere (id INT AUTO_INCREMENT NOT NULL, iduser_id INT NOT NULL, idannonce_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, dateheure DATETIME NOT NULL, INDEX IDX_38D1870F786A81FB (iduser_id), INDEX IDX_38D1870F45ACB615 (idannonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, idenvoi_id INT NOT NULL, idrecoit_id INT NOT NULL, texte LONGTEXT NOT NULL, dateheure DATETIME NOT NULL, INDEX IDX_B6BD307F9542A4E8 (idenvoi_id), INDEX IDX_B6BD307F74CF2DF5 (idrecoit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FA5A9824 FOREIGN KEY (idcategorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F45ACB615 FOREIGN KEY (idannonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9542A4E8 FOREIGN KEY (idenvoi_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F74CF2DF5 FOREIGN KEY (idrecoit_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F45ACB615');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FA5A9824');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F786A81FB');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9542A4E8');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F74CF2DF5');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE user');
    }
}
