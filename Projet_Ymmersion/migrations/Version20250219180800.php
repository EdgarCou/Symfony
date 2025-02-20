<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219180800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habit ADD group_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE habit ADD CONSTRAINT FK_44FE2172FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE habit ADD CONSTRAINT FK_44FE2172A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_44FE2172FE54D947 ON habit (group_id)');
        $this->addSql('CREATE INDEX IDX_44FE2172A76ED395 ON habit (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habit DROP FOREIGN KEY FK_44FE2172FE54D947');
        $this->addSql('ALTER TABLE habit DROP FOREIGN KEY FK_44FE2172A76ED395');
        $this->addSql('DROP INDEX IDX_44FE2172FE54D947 ON habit');
        $this->addSql('DROP INDEX IDX_44FE2172A76ED395 ON habit');
        $this->addSql('ALTER TABLE habit DROP group_id, DROP user_id');
    }
}
