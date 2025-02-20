<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250220092518.php
final class Version20250220092518 extends AbstractMigration
========
final class Version20250219190412 extends AbstractMigration
>>>>>>>> 3691f42 (make group and join them, habit for group):Projet_Ymmersion/migrations/Version20250219190412.php
=======
final class Version20250220092518 extends AbstractMigration
>>>>>>> b7539fa (correct bug personalhabits and correcte front design)
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250220092518.php
        $this->addSql('ALTER TABLE habit CHANGE color color VARCHAR(20) DEFAULT \'color1\' NOT NULL');
========
        $this->addSql('ALTER TABLE habit ADD type VARCHAR(10) NOT NULL');
>>>>>>>> 3691f42 (make group and join them, habit for group):Projet_Ymmersion/migrations/Version20250219190412.php
=======
        $this->addSql('ALTER TABLE habit CHANGE color color VARCHAR(20) DEFAULT \'color1\' NOT NULL');
>>>>>>> b7539fa (correct bug personalhabits and correcte front design)
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD
<<<<<<<< HEAD:Projet_Ymmersion/migrations/Version20250220092518.php
        $this->addSql('ALTER TABLE habit CHANGE color color VARCHAR(7) NOT NULL');
========
        $this->addSql('ALTER TABLE habit DROP type');
>>>>>>>> 3691f42 (make group and join them, habit for group):Projet_Ymmersion/migrations/Version20250219190412.php
=======
        $this->addSql('ALTER TABLE habit CHANGE color color VARCHAR(7) NOT NULL');
>>>>>>> b7539fa (correct bug personalhabits and correcte front design)
    }
}
