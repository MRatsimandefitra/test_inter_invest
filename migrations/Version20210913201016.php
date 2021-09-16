<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913201016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forme_juridique (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, forme_juridique_id INT NOT NULL, nom VARCHAR(255) NOT NULL, numero_siren VARCHAR(255) NOT NULL, ville_immatriculation VARCHAR(255) NOT NULL, date_immatriculation DATE NOT NULL, INDEX IDX_19653DBD9AEE68EB (forme_juridique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD9AEE68EB FOREIGN KEY (forme_juridique_id) REFERENCES forme_juridique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD9AEE68EB');
        $this->addSql('DROP TABLE forme_juridique');
        $this->addSql('DROP TABLE societe');
    }
}
