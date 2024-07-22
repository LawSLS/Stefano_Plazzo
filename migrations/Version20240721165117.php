<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240721165117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE paris_valeur_fonciere (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nature_mutation VARCHAR(255) DEFAULT NULL, no_voie VARCHAR(255) DEFAULT NULL, b_t_q VARCHAR(255) DEFAULT NULL, type_voie VARCHAR(255) DEFAULT NULL, code_voie VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, section VARCHAR(255) DEFAULT NULL, nb_lots INT DEFAULT NULL, code_type_local VARCHAR(255) DEFAULT NULL, surface_reelle_bati VARCHAR(255) DEFAULT NULL, nb_pieces VARCHAR(255) DEFAULT NULL, surface_terrain VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, d_p_e VARCHAR(255) DEFAULT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, images LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', date_creation_annonce DATE DEFAULT NULL, date_desactivation_annonce DATE DEFAULT NULL, date_mutation VARCHAR(255) DEFAULT NULL, valeur_fonciere DOUBLE PRECISION DEFAULT NULL, code_departement VARCHAR(255) DEFAULT NULL, code_commune VARCHAR(255) DEFAULT NULL, type_local VARCHAR(255) DEFAULT NULL, INDEX IDX_2F9ECDAFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, no_voie_user VARCHAR(255) DEFAULT NULL, voie_user VARCHAR(255) DEFAULT NULL, type_voie_user VARCHAR(255) DEFAULT NULL, code_postal_user VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, commune_user VARCHAR(255) DEFAULT NULL, code_departement_user VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE paris_valeur_fonciere ADD CONSTRAINT FK_2F9ECDAFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paris_valeur_fonciere DROP FOREIGN KEY FK_2F9ECDAFA76ED395');
        $this->addSql('DROP TABLE paris_valeur_fonciere');
        $this->addSql('DROP TABLE user');
    }
}
