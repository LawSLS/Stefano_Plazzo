<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715145613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paris_valeur_fonciere CHANGE user_id user_id INT DEFAULT NULL, CHANGE no_voie no_voie VARCHAR(255) DEFAULT NULL, CHANGE type_voie type_voie VARCHAR(255) DEFAULT NULL, CHANGE code_voie code_voie VARCHAR(255) DEFAULT NULL, CHANGE voie voie VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL, CHANGE section section VARCHAR(255) DEFAULT NULL, CHANGE nb_lots nb_lots INT DEFAULT NULL, CHANGE code_type_local code_type_local VARCHAR(255) DEFAULT NULL, CHANGE surface_reelle_bati surface_reelle_bati VARCHAR(255) DEFAULT NULL, CHANGE nb_pieces nb_pieces VARCHAR(255) DEFAULT NULL, CHANGE prix_vente prix_vente DOUBLE PRECISION DEFAULT NULL, CHANGE date_creation_annonce date_creation_annonce DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paris_valeur_fonciere CHANGE user_id user_id INT NOT NULL, CHANGE no_voie no_voie VARCHAR(255) NOT NULL, CHANGE type_voie type_voie VARCHAR(255) NOT NULL, CHANGE code_voie code_voie VARCHAR(255) NOT NULL, CHANGE voie voie VARCHAR(255) NOT NULL, CHANGE code_postal code_postal VARCHAR(255) NOT NULL, CHANGE commune commune VARCHAR(255) NOT NULL, CHANGE section section VARCHAR(255) NOT NULL, CHANGE nb_lots nb_lots INT NOT NULL, CHANGE code_type_local code_type_local VARCHAR(255) NOT NULL, CHANGE surface_reelle_bati surface_reelle_bati VARCHAR(255) NOT NULL, CHANGE nb_pieces nb_pieces VARCHAR(255) NOT NULL, CHANGE prix_vente prix_vente DOUBLE PRECISION NOT NULL, CHANGE date_creation_annonce date_creation_annonce DATE NOT NULL');
    }
}
