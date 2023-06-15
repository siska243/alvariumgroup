<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614102239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offre_emploi_competence (offre_emploi_id INT NOT NULL, competence_id INT NOT NULL, PRIMARY KEY(offre_emploi_id, competence_id))');
        $this->addSql('CREATE INDEX IDX_83B41EC0B08996ED ON offre_emploi_competence (offre_emploi_id)');
        $this->addSql('CREATE INDEX IDX_83B41EC015761DAB ON offre_emploi_competence (competence_id)');
        $this->addSql('ALTER TABLE offre_emploi_competence ADD CONSTRAINT FK_83B41EC0B08996ED FOREIGN KEY (offre_emploi_id) REFERENCES offre_emploi (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offre_emploi_competence ADD CONSTRAINT FK_83B41EC015761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE offre_emploi_competence DROP CONSTRAINT FK_83B41EC0B08996ED');
        $this->addSql('ALTER TABLE offre_emploi_competence DROP CONSTRAINT FK_83B41EC015761DAB');
        $this->addSql('DROP TABLE offre_emploi_competence');
    }
}
