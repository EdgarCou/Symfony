<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220073522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, creator_id INT NOT NULL, score INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_6DC044C561220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C561220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE habit ADD group_id INT DEFAULT NULL, ADD user_id INT NOT NULL, ADD type VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE habit ADD CONSTRAINT FK_44FE2172FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE habit ADD CONSTRAINT FK_44FE2172A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_44FE2172FE54D947 ON habit (group_id)');
        $this->addSql('CREATE INDEX IDX_44FE2172A76ED395 ON habit (user_id)');
        $this->addSql('ALTER TABLE user ADD group_id INT DEFAULT NULL, DROP group_name');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FE54D947 ON user (group_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habit DROP FOREIGN KEY FK_44FE2172FE54D947');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FE54D947');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C561220EA6');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('ALTER TABLE habit DROP FOREIGN KEY FK_44FE2172A76ED395');
        $this->addSql('DROP INDEX IDX_44FE2172FE54D947 ON habit');
        $this->addSql('DROP INDEX IDX_44FE2172A76ED395 ON habit');
        $this->addSql('ALTER TABLE habit DROP group_id, DROP user_id, DROP type');
        $this->addSql('DROP INDEX IDX_8D93D649FE54D947 ON user');
        $this->addSql('ALTER TABLE user ADD group_name VARCHAR(255) DEFAULT NULL, DROP group_id');
    }
}
