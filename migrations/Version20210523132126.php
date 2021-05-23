<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210523132126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, debut DATETIME NOT NULL, fin DATETIME NOT NULL, description LONGTEXT NOT NULL, journee_complete TINYINT(1) NOT NULL, couleur_fond VARCHAR(7) NOT NULL, couleur_bordure VARCHAR(7) NOT NULL, couleur_texte VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cv ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE92FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B66FFE92FB88E14F ON cv (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3CFE419E2');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3CFE419E2 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP cv_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE evenement');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE92FB88E14F');
        $this->addSql('DROP INDEX UNIQ_B66FFE92FB88E14F ON cv');
        $this->addSql('ALTER TABLE cv DROP utilisateur_id');
        $this->addSql('ALTER TABLE utilisateur ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3CFE419E2 ON utilisateur (cv_id)');
    }
}
