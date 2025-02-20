<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220233015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score_log DROP FOREIGN KEY FK_F8958A3EA76ED395');
        $this->addSql('ALTER TABLE score_log DROP FOREIGN KEY FK_F8958A3EFE54D947');
        $this->addSql('DROP TABLE score_log');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE score_log (id INT AUTO_INCREMENT NOT NULL, group_id INT NOT NULL, user_id INT NOT NULL, points INT NOT NULL, timestamp DATETIME NOT NULL, INDEX IDX_F8958A3EA76ED395 (user_id), INDEX IDX_F8958A3EFE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE score_log ADD CONSTRAINT FK_F8958A3EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE score_log ADD CONSTRAINT FK_F8958A3EFE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
    }
}
