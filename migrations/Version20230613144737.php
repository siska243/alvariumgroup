<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230613144737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE domaine_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE offre_emploi_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_contrat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ville_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE domaine (id INT NOT NULL, title VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN domaine.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE offre_emploi (id INT NOT NULL, type_contrat_id INT DEFAULT NULL, domaine_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, ville_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, salaire DOUBLE PRECISION DEFAULT NULL, competences JSON NOT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, closed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_publish BOOLEAN NOT NULL, is_publish_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_132AD0D1520D03A ON offre_emploi (type_contrat_id)');
        $this->addSql('CREATE INDEX IDX_132AD0D14272FC9F ON offre_emploi (domaine_id)');
        $this->addSql('CREATE INDEX IDX_132AD0D1B03A8386 ON offre_emploi (created_by_id)');
        $this->addSql('CREATE INDEX IDX_132AD0D1A73F0036 ON offre_emploi (ville_id)');
        $this->addSql('COMMENT ON COLUMN offre_emploi.deleted_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN offre_emploi.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN offre_emploi.closed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN offre_emploi.is_publish_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE type_contrat (id INT NOT NULL, title VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN type_contrat.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE ville (id INT NOT NULL, title VARCHAR(255) NOT NULL, zip VARCHAR(255) DEFAULT NULL, is_active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN ville.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D1520D03A FOREIGN KEY (type_contrat_id) REFERENCES type_contrat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D14272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D1B03A8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D1A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD last_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE domaine_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE offre_emploi_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_contrat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ville_id_seq CASCADE');
        $this->addSql('ALTER TABLE offre_emploi DROP CONSTRAINT FK_132AD0D1520D03A');
        $this->addSql('ALTER TABLE offre_emploi DROP CONSTRAINT FK_132AD0D14272FC9F');
        $this->addSql('ALTER TABLE offre_emploi DROP CONSTRAINT FK_132AD0D1B03A8386');
        $this->addSql('ALTER TABLE offre_emploi DROP CONSTRAINT FK_132AD0D1A73F0036');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE offre_emploi');
        $this->addSql('DROP TABLE type_contrat');
        $this->addSql('DROP TABLE ville');
        $this->addSql('ALTER TABLE "user" DROP name');
        $this->addSql('ALTER TABLE "user" DROP last_name');
    }
}
