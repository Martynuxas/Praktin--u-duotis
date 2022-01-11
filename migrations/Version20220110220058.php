<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220110220058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs_done ADD section_start_id INT DEFAULT NULL, ADD section_end_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jobs_done ADD CONSTRAINT FK_3C3AE88DF250A3C7 FOREIGN KEY (section_start_id) REFERENCES roads (id)');
        $this->addSql('ALTER TABLE jobs_done ADD CONSTRAINT FK_3C3AE88DA8F57836 FOREIGN KEY (section_end_id) REFERENCES roads (id)');
        $this->addSql('CREATE INDEX IDX_3C3AE88DF250A3C7 ON jobs_done (section_start_id)');
        $this->addSql('CREATE INDEX IDX_3C3AE88DA8F57836 ON jobs_done (section_end_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs_done DROP FOREIGN KEY FK_3C3AE88DF250A3C7');
        $this->addSql('ALTER TABLE jobs_done DROP FOREIGN KEY FK_3C3AE88DA8F57836');
        $this->addSql('DROP INDEX IDX_3C3AE88DF250A3C7 ON jobs_done');
        $this->addSql('DROP INDEX IDX_3C3AE88DA8F57836 ON jobs_done');
        $this->addSql('ALTER TABLE jobs_done DROP section_start_id, DROP section_end_id');
    }
}
