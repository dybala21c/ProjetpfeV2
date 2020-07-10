<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200709144821 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enseignant ADD niveau_id INT NOT NULL');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA1B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau_etude (id)');
        $this->addSql('CREATE INDEX IDX_81A72FA1B3E9C81 ON enseignant (niveau_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA1B3E9C81');
        $this->addSql('DROP INDEX IDX_81A72FA1B3E9C81 ON enseignant');
        $this->addSql('ALTER TABLE enseignant DROP niveau_id');
    }
}
