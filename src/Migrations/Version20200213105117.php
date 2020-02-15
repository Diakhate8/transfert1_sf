<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213105117 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, compte_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_F4DD61D3A76ED395 (user_id), INDEX IDX_F4DD61D3F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, partenaire_id INT NOT NULL, usercreateur_id INT DEFAULT NULL, numero_compte VARCHAR(255) NOT NULL, solde_initial INT NOT NULL, UNIQUE INDEX UNIQ_CFF652609731415A (numero_compte), INDEX IDX_CFF6526098DE13AC (partenaire_id), INDEX IDX_CFF65260B78E3771 (usercreateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, compte_de_depot_id INT DEFAULT NULL, user_createur_id INT NOT NULL, compte_de_retrait_id INT DEFAULT NULL, prenom_env VARCHAR(255) DEFAULT NULL, nom_env VARCHAR(255) DEFAULT NULL, nin_correspondant INT DEFAULT NULL, solde INT NOT NULL, prenom_correspondant VARCHAR(255) DEFAULT NULL, nom_correspondant VARCHAR(255) DEFAULT NULL, code INT NOT NULL, created_at DATETIME NOT NULL, telephone_env INT NOT NULL, telephone_correspondant INT NOT NULL, mode VARCHAR(255) NOT NULL, INDEX IDX_723705D1DD8C9426 (compte_de_depot_id), INDEX IDX_723705D1DAB9C870 (user_createur_id), INDEX IDX_723705D1D44137C3 (compte_de_retrait_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raport (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, mouvement VARCHAR(255) NOT NULL, debit INT DEFAULT NULL, credit INT DEFAULT NULL, commission INT DEFAULT NULL, part_etat INT NOT NULL, part_service INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, ninea VARCHAR(255) NOT NULL, rc VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_32FFA373C678AEBE (ninea), UNIQUE INDEX UNIQ_32FFA373886B3969 (rc), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, user_createur_id INT DEFAULT NULL, numero_compte VARCHAR(255) NOT NULL, montant_depot INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_47948BBCF2C56620 (compte_id), INDEX IDX_47948BBCDAB9C870 (user_createur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_object (id INT AUTO_INCREMENT NOT NULL, file_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, image_id INT DEFAULT NULL, partenaire_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone INT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649D60322AC (role_id), INDEX IDX_8D93D6493DA5256D (image_id), INDEX IDX_8D93D64998DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526098DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B78E3771 FOREIGN KEY (usercreateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1DD8C9426 FOREIGN KEY (compte_de_depot_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1DAB9C870 FOREIGN KEY (user_createur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1D44137C3 FOREIGN KEY (compte_de_retrait_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBCF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBCDAB9C870 FOREIGN KEY (user_createur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493DA5256D FOREIGN KEY (image_id) REFERENCES media_object (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64998DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3F2C56620');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1DD8C9426');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1D44137C3');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBCF2C56620');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526098DE13AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64998DE13AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493DA5256D');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3A76ED395');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260B78E3771');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1DAB9C870');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBCDAB9C870');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE raport');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE user');
    }
}
