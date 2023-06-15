<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614103830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_emploi_competence DROP CONSTRAINT fk_83b41ec0b08996ed');
        $this->addSql('ALTER TABLE offre_emploi_competence DROP CONSTRAINT fk_83b41ec015761dab');
        $this->addSql('DROP TABLE offre_emploi_competence');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE offre_emploi_competence (offre_emploi_id INT NOT NULL, competence_id INT NOT NULL, PRIMARY KEY(offre_emploi_id, competence_id))');
        $this->addSql('CREATE INDEX idx_83b41ec015761dab ON offre_emploi_competence (competence_id)');
        $this->addSql('CREATE INDEX idx_83b41ec0b08996ed ON offre_emploi_competence (offre_emploi_id)');
        $this->addSql('ALTER TABLE offre_emploi_competence ADD CONSTRAINT fk_83b41ec0b08996ed FOREIGN KEY (offre_emploi_id) REFERENCES offre_emploi (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offre_emploi_competence ADD CONSTRAINT fk_83b41ec015761dab FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
