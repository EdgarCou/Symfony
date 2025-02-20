<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220142033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invitation CHANGE user_invited user_invited_id INT NOT NULL');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A261220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2658A81AB FOREIGN KEY (user_invited_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F11D61A261220EA6 ON invitation (creator_id)');
        $this->addSql('CREATE INDEX IDX_F11D61A2658A81AB ON invitation (user_invited_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A261220EA6');
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A2658A81AB');
        $this->addSql('DROP INDEX IDX_F11D61A261220EA6 ON invitation');
        $this->addSql('DROP INDEX IDX_F11D61A2658A81AB ON invitation');
        $this->addSql('ALTER TABLE invitation CHANGE user_invited_id user_invited INT NOT NULL');
    }
}
