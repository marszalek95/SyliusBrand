<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250506155938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_88EDCB39989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_brand_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3986B4B17E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_brand (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, INDEX IDX_51A9B62A4584665A (product_id), INDEX IDX_51A9B62A44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_brand_image ADD CONSTRAINT FK_3986B4B17E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_brand ADD CONSTRAINT FK_51A9B62A4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_brand ADD CONSTRAINT FK_51A9B62A44F5D008 FOREIGN KEY (brand_id) REFERENCES sylius_brand (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_brand_image DROP FOREIGN KEY FK_3986B4B17E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_brand DROP FOREIGN KEY FK_51A9B62A4584665A');
        $this->addSql('ALTER TABLE sylius_product_brand DROP FOREIGN KEY FK_51A9B62A44F5D008');
        $this->addSql('DROP TABLE sylius_brand');
        $this->addSql('DROP TABLE sylius_brand_image');
        $this->addSql('DROP TABLE sylius_product_brand');
    }
}
