<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240612161919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_evenement (user_id INTEGER NOT NULL, evenement_id INTEGER NOT NULL, PRIMARY KEY(user_id, evenement_id), CONSTRAINT FK_BC6E5FAA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BC6E5FAFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_BC6E5FAA76ED395 ON user_evenement (user_id)');
        $this->addSql('CREATE INDEX IDX_BC6E5FAFD02F13 ON user_evenement (evenement_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, nom, roles, password, prenom, email, is_admin FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_admin BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO user (id, nom, roles, password, prenom, email, is_admin) SELECT id, nom, roles, password, prenom, email, is_admin FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_NOM ON user (nom)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_evenement');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, nom, roles, password, prenom, email, is_admin FROM "user"');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_admin BOOLEAN DEFAULT 0 NOT NULL)');
        $this->addSql('INSERT INTO "user" (id, nom, roles, password, prenom, email, is_admin) SELECT id, nom, roles, password, prenom, email, is_admin FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_NOM ON "user" (nom)');
    }
}
