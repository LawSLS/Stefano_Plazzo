<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715111754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD telephone VARCHAR(255) NOT NULL, ADD no_voie_user VARCHAR(255) NOT NULL, ADD voie_user VARCHAR(255) NOT NULL, ADD type_voie_user VARCHAR(255) NOT NULL, ADD code_postal_user VARCHAR(255) NOT NULL, ADD country VARCHAR(255) DEFAULT NULL, ADD commune_user VARCHAR(255) DEFAULT NULL, ADD code_departement_user VARCHAR(255) DEFAULT NULL, ADD is_active TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP telephone, DROP no_voie_user, DROP voie_user, DROP type_voie_user, DROP code_postal_user, DROP country, DROP commune_user, DROP code_departement_user, DROP is_active');
    }
}
