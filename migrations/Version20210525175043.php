<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525175043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE highscore ADD COLUMN namn VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__highscore AS SELECT id, score FROM highscore');
        $this->addSql('DROP TABLE highscore');
        $this->addSql('CREATE TABLE highscore (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('INSERT INTO highscore (id, score) SELECT id, score FROM __temp__highscore');
        $this->addSql('DROP TABLE __temp__highscore');
    }
}
