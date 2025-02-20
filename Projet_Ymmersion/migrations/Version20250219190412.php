<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250221003546.php
final class Version20250221003546 extends AbstractMigration
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
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250221003546.php
        $this->addSql('ALTER TABLE `group` ADD score INT NOT NULL');
========
        $this->addSql('ALTER TABLE habit ADD type VARCHAR(10) NOT NULL');
>>>>>>>> 3691f42 (make group and join them, habit for group):Projet_Ymmersion/migrations/Version20250219190412.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250221003546.php
        $this->addSql('ALTER TABLE `group` DROP score');
========
        $this->addSql('ALTER TABLE habit DROP type');
>>>>>>>> 3691f42 (make group and join them, habit for group):Projet_Ymmersion/migrations/Version20250219190412.php
    }
}
