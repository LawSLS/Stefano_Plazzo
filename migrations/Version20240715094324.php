<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715094324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paris_valeur_fonciere ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE paris_valeur_fonciere ADD CONSTRAINT FK_2F9ECDAFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2F9ECDAFA76ED395 ON paris_valeur_fonciere (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paris_valeur_fonciere DROP FOREIGN KEY FK_2F9ECDAFA76ED395');
        $this->addSql('DROP INDEX IDX_2F9ECDAFA76ED395 ON paris_valeur_fonciere');
        $this->addSql('ALTER TABLE paris_valeur_fonciere DROP user_id');
    }
}
