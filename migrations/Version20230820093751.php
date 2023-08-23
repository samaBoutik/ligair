<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820093751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date_run_date_ech (date_run_id INT NOT NULL, date_ech_id INT NOT NULL, INDEX IDX_B984E3D06057C127 (date_run_id), INDEX IDX_B984E3D0B44FCEFA (date_ech_id), PRIMARY KEY(date_run_id, date_ech_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE date_run_date_ech ADD CONSTRAINT FK_B984E3D06057C127 FOREIGN KEY (date_run_id) REFERENCES date_run (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE date_run_date_ech ADD CONSTRAINT FK_B984E3D0B44FCEFA FOREIGN KEY (date_ech_id) REFERENCES date_ech (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
