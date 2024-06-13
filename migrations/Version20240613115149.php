<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240613115149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__evenement AS SELECT id, titre, description, date, nb_max, public FROM evenement');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('CREATE TABLE evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, proprietaire_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME NOT NULL, nb_max INTEGER NOT NULL, public BOOLEAN NOT NULL, CONSTRAINT FK_B26681E76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO evenement (id, titre, description, date, nb_max, public) SELECT id, titre, description, date, nb_max, public FROM __temp__evenement');
        $this->addSql('DROP TABLE __temp__evenement');
        $this->addSql('CREATE INDEX IDX_B26681E76C50E4A ON evenement (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__evenement AS SELECT id, titre, description, date, nb_max, public FROM evenement');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('CREATE TABLE evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME NOT NULL, nb_max INTEGER NOT NULL, public BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO evenement (id, titre, description, date, nb_max, public) SELECT id, titre, description, date, nb_max, public FROM __temp__evenement');
        $this->addSql('DROP TABLE __temp__evenement');
    }
}
