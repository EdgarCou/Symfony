<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219134144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE habit (id INT AUTO_INCREMENT NOT NULL, completed TINYINT(1) NOT NULL, category VARCHAR(50) NOT NULL, text VARCHAR(255) NOT NULL, difficulty VARCHAR(50) NOT NULL, color VARCHAR(7) NOT NULL, periodicity VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\', ADD is_verified TINYINT(1) NOT NULL, ADD group_name VARCHAR(255) DEFAULT NULL, DROP pseudo, DROP name, DROP first_name, DROP age, DROP adress, CHANGE email email VARCHAR(180) NOT NULL, CHANGE profile_picture profile_picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE habit');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user ADD pseudo VARCHAR(255) NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD age INT NOT NULL, ADD adress VARCHAR(255) NOT NULL, DROP roles, DROP is_verified, DROP group_name, CHANGE email email VARCHAR(255) NOT NULL, CHANGE profile_picture profile_picture VARCHAR(255) NOT NULL');
    }
}
