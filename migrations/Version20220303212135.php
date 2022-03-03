<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220303212135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE benefit_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offers (id INT AUTO_INCREMENT NOT NULL, offers_delivery_id INT DEFAULT NULL, offer_benefit_id INT DEFAULT NULL, creator VARCHAR(255) NOT NULL, modifier VARCHAR(255) DEFAULT NULL, creation_date DATETIME NOT NULL, modifier_date DATETIME DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, delivery DOUBLE PRECISION DEFAULT NULL, INDEX IDX_DA4604278253266A (offers_delivery_id), INDEX IDX_DA46042797FBB85D (offer_benefit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_delivery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA4604278253266A FOREIGN KEY (offers_delivery_id) REFERENCES type_of_delivery (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA46042797FBB85D FOREIGN KEY (offer_benefit_id) REFERENCES benefit_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA46042797FBB85D');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA4604278253266A');
        $this->addSql('DROP TABLE benefit_type');
        $this->addSql('DROP TABLE offers');
        $this->addSql('DROP TABLE type_of_delivery');
    }
}
