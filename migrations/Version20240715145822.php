<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715145822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE telephone telephone VARCHAR(255) DEFAULT NULL, CHANGE no_voie_user no_voie_user VARCHAR(255) DEFAULT NULL, CHANGE voie_user voie_user VARCHAR(255) DEFAULT NULL, CHANGE type_voie_user type_voie_user VARCHAR(255) DEFAULT NULL, CHANGE code_postal_user code_postal_user VARCHAR(255) DEFAULT NULL, CHANGE is_active is_active TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE no_voie_user no_voie_user VARCHAR(255) NOT NULL, CHANGE voie_user voie_user VARCHAR(255) NOT NULL, CHANGE type_voie_user type_voie_user VARCHAR(255) NOT NULL, CHANGE code_postal_user code_postal_user VARCHAR(255) NOT NULL, CHANGE is_active is_active TINYINT(1) NOT NULL');
    }
}
