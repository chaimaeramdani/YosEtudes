<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200916130740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_competence (client_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_480553E19EB6921 (client_id), INDEX IDX_480553E15761DAB (competence_id), PRIMARY KEY(client_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_experience (client_id INT NOT NULL, experience_id INT NOT NULL, INDEX IDX_95C4FC4219EB6921 (client_id), INDEX IDX_95C4FC4246E90E27 (experience_id), PRIMARY KEY(client_id, experience_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_formation (client_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_AB60F1B019EB6921 (client_id), INDEX IDX_AB60F1B05200282E (formation_id), PRIMARY KEY(client_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_competence ADD CONSTRAINT FK_480553E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_competence ADD CONSTRAINT FK_480553E15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_experience ADD CONSTRAINT FK_95C4FC4219EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_experience ADD CONSTRAINT FK_95C4FC4246E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_formation ADD CONSTRAINT FK_AB60F1B019EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_formation ADD CONSTRAINT FK_AB60F1B05200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_competence');
        $this->addSql('DROP TABLE client_experience');
        $this->addSql('DROP TABLE client_formation');
    }
}
