<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230819143318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('ALTER TABLE poll_resp ADD id INT NOT NULL, DROP poll_resp_poll_resp, DROP PRIMARY KEY, ADD PRIMARY KEY (poll_resp)');
    }

    public function down(Schema $schema): void
    {
    }
}
