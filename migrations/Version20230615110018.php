<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615110018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domaine ALTER title TYPE TEXT');
        $this->addSql('ALTER TABLE domaine ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN domaine.created_at IS NULL');
        $this->addSql('ALTER TABLE offre_emploi DROP updated_at');
        $this->addSql('ALTER TABLE offre_emploi ALTER title TYPE TEXT');
        $this->addSql('ALTER TABLE offre_emploi ALTER deleted_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE offre_emploi ALTER closed_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE offre_emploi ALTER closed_at DROP NOT NULL');
        $this->addSql('ALTER TABLE offre_emploi ALTER is_publish DROP NOT NULL');
        $this->addSql('ALTER TABLE offre_emploi ALTER is_publish_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE offre_emploi ALTER slug TYPE TEXT');
        $this->addSql('COMMENT ON COLUMN offre_emploi.deleted_at IS NULL');
        $this->addSql('COMMENT ON COLUMN offre_emploi.closed_at IS NULL');
        $this->addSql('COMMENT ON COLUMN offre_emploi.is_publish_at IS NULL');
        $this->addSql('ALTER TABLE type_contrat ALTER title TYPE TEXT');
        $this->addSql('ALTER TABLE type_contrat ALTER color TYPE TEXT');
        $this->addSql('ALTER TABLE type_contrat ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN type_contrat.created_at IS NULL');
        $this->addSql('ALTER TABLE ville ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN ville.created_at IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE type_contrat ALTER title TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE type_contrat ALTER color TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE type_contrat ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN type_contrat.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE ville ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN ville.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE offre_emploi ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE offre_emploi ALTER title TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE offre_emploi ALTER deleted_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE offre_emploi ALTER closed_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE offre_emploi ALTER closed_at SET NOT NULL');
        $this->addSql('ALTER TABLE offre_emploi ALTER is_publish SET NOT NULL');
        $this->addSql('ALTER TABLE offre_emploi ALTER is_publish_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE offre_emploi ALTER slug TYPE VARCHAR(255)');
        $this->addSql('COMMENT ON COLUMN offre_emploi.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN offre_emploi.deleted_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN offre_emploi.closed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN offre_emploi.is_publish_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE domaine ALTER title TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE domaine ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN domaine.created_at IS \'(DC2Type:datetime_immutable)\'');
    }
}
