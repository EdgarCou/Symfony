<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250219201057.php
final class Version20250219201057 extends AbstractMigration
========
final class Version20250219190412 extends AbstractMigration
>>>>>>>> 3691f42 (make group and join them, habit for group):Projet_Ymmersion/migrations/Version20250219190412.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habit ADD type VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habit DROP type');
    }
}
