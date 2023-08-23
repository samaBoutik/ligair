<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823130041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_insee MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON code_insee');
        $this->addSql('ALTER TABLE code_insee CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE code_insee ADD PRIMARY KEY (code_insee)');
        $this->addSql('ALTER TABLE data DROP FOREIGN KEY FK_ADF3F36325A1CF2C');
        $this->addSql('ALTER TABLE data DROP FOREIGN KEY FK_ADF3F363EBA2B0B');
        $this->addSql('ALTER TABLE data DROP FOREIGN KEY FK_ADF3F363C112B72B');
        $this->addSql('ALTER TABLE data CHANGE poll_resp_id poll_resp_id VARCHAR(7) NOT NULL');
        $this->addSql('ALTER TABLE data ADD CONSTRAINT data_ibfk_1 FOREIGN KEY (val_ind_id) REFERENCES val_ind (val_ind)');
        $this->addSql('ALTER TABLE data ADD CONSTRAINT data_ibfk_2 FOREIGN KEY (poll_resp_id) REFERENCES poll_resp (poll_resp)');
        $this->addSql('ALTER TABLE data ADD CONSTRAINT FK_ADF3F363C112B72B FOREIGN KEY (code_insee_id) REFERENCES code_insee (code_insee) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE data RENAME INDEX idx_adf3f36325a1cf2c TO FK_ADF3F36325A1CF2C');
        $this->addSql('ALTER TABLE data RENAME INDEX idx_adf3f363eba2b0b TO poll_resp_id');
        $this->addSql('ALTER TABLE val_ind MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON val_ind');
        $this->addSql('CREATE INDEX id ON val_ind (id)');
        $this->addSql('ALTER TABLE val_ind ADD PRIMARY KEY (val_ind)');
        $this->addSql('ALTER TABLE poll_resp MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON poll_resp');
        $this->addSql('ALTER TABLE poll_resp CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE poll_resp ADD PRIMARY KEY (poll_resp)');
    }
}
