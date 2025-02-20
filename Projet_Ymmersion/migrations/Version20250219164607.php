<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250219164607.php
final class Version20250219164607 extends AbstractMigration
========
final class Version20250219144642 extends AbstractMigration
>>>>>>>> main:Projet_Ymmersion/migrations/Version20250219144642.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250219164607.php
        $this->addSql('ALTER TABLE habit CHANGE color color VARCHAR(20) DEFAULT \'color1\' NOT NULL');
        $this->addSql('ALTER TABLE user ADD group_name VARCHAR(255) DEFAULT NULL');
========
        $this->addSql('ALTER TABLE user ADD group_id INT DEFAULT NULL, DROP group_name');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FE54D947 ON user (group_id)');
>>>>>>>> main:Projet_Ymmersion/migrations/Version20250219144642.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250219164607.php
        $this->addSql('ALTER TABLE habit CHANGE color color VARCHAR(7) NOT NULL');
        $this->addSql('ALTER TABLE user DROP group_name');
========
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FE54D947');
        $this->addSql('DROP INDEX IDX_8D93D649FE54D947 ON user');
        $this->addSql('ALTER TABLE user ADD group_name VARCHAR(255) DEFAULT NULL, DROP group_id');
>>>>>>>> main:Projet_Ymmersion/migrations/Version20250219144642.php
    }
}
