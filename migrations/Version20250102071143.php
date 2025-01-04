<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102071143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_product_brand (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_51A9B62A44F5D008 (brand_id), INDEX IDX_51A9B62A4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_product_brand ADD CONSTRAINT FK_51A9B62A44F5D008 FOREIGN KEY (brand_id) REFERENCES sylius_brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_brand ADD CONSTRAINT FK_51A9B62A4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_brand DROP FOREIGN KEY FK_51A9B62A44F5D008');
        $this->addSql('ALTER TABLE sylius_product_brand DROP FOREIGN KEY FK_51A9B62A4584665A');
        $this->addSql('DROP TABLE sylius_product_brand');
    }
}
