<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217120317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sto_comment ADD user_id INT NOT NULL, DROP pseudo');
        $this->addSql('ALTER TABLE sto_comment ADD CONSTRAINT FK_F52182F1A76ED395 FOREIGN KEY (user_id) REFERENCES app_user (id)');
        $this->addSql('CREATE INDEX IDX_F52182F1A76ED395 ON sto_comment (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sto_comment DROP FOREIGN KEY FK_F52182F1A76ED395');
        $this->addSql('DROP INDEX IDX_F52182F1A76ED395 ON sto_comment');
        $this->addSql('ALTER TABLE sto_comment ADD pseudo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP user_id');
    }
}
