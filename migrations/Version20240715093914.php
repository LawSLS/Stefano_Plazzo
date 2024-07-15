<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715093914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE paris_valeur_fonciere (id INT AUTO_INCREMENT NOT NULL, nature_mutation VARCHAR(255) DEFAULT NULL, no_voie VARCHAR(255) NOT NULL, b_t_q VARCHAR(255) DEFAULT NULL, type_voie VARCHAR(255) NOT NULL, code_voie VARCHAR(255) NOT NULL, voie VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, nb_lots INT NOT NULL, code_type_local VARCHAR(255) NOT NULL, surface_reelle_bati VARCHAR(255) NOT NULL, nb_pieces VARCHAR(255) NOT NULL, surface_terrain VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, d_p_e VARCHAR(255) DEFAULT NULL, prix_vente DOUBLE PRECISION NOT NULL, images LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', date_creation_annonce DATE NOT NULL, date_desactivation_annonce DATE DEFAULT NULL, date_mutation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE paris_valeur_fonciere');
    }
}
