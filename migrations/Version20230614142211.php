<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614142211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE competence_id_seq CASCADE');
        $this->addSql('ALTER TABLE competence DROP CONSTRAINT fk_94d4687fb08996ed');
        $this->addSql('DROP TABLE competence');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE competence_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE competence (id INT NOT NULL, offre_emploi_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_94d4687fb08996ed ON competence (offre_emploi_id)');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT fk_94d4687fb08996ed FOREIGN KEY (offre_emploi_id) REFERENCES offre_emploi (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
