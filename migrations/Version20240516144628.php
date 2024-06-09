<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516144628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, recettes_id INTEGER DEFAULT NULL, texte VARCHAR(255) NOT NULL, data VARCHAR(255) NOT NULL, CONSTRAINT FK_67F068BC3E2ED6D6 FOREIGN KEY (recettes_id) REFERENCES recettes (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_67F068BC3E2ED6D6 ON commentaire (recettes_id)');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE recettes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, texte VARCHAR(255) NOT NULL, duree_totale VARCHAR(255) NOT NULL, nombre_de_personne VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE recettes_ingredient (recettes_id INTEGER NOT NULL, ingredient_id INTEGER NOT NULL, PRIMARY KEY(recettes_id, ingredient_id), CONSTRAINT FK_EAAC1B383E2ED6D6 FOREIGN KEY (recettes_id) REFERENCES recettes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EAAC1B38933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_EAAC1B383E2ED6D6 ON recettes_ingredient (recettes_id)');
        $this->addSql('CREATE INDEX IDX_EAAC1B38933FE08C ON recettes_ingredient (ingredient_id)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON "user" (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recettes');
        $this->addSql('DROP TABLE recettes_ingredient');
        $this->addSql('DROP TABLE "user"');
    }
}
