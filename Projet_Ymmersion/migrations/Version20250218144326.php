<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218144326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habit ADD COLUMN completed BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE habit ADD COLUMN category VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__habit AS SELECT id, text, difficulty, color, periodicity, created_at FROM habit');
        $this->addSql('DROP TABLE habit');
        $this->addSql('CREATE TABLE habit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, text VARCHAR(255) NOT NULL, difficulty VARCHAR(50) NOT NULL, color VARCHAR(7) NOT NULL, periodicity VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO habit (id, text, difficulty, color, periodicity, created_at) SELECT id, text, difficulty, color, periodicity, created_at FROM __temp__habit');
        $this->addSql('DROP TABLE __temp__habit');
    }
}
