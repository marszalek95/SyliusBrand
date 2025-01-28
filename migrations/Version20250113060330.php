<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250113060330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product ADD productBrands VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_brand CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product DROP productBrands');
        $this->addSql('ALTER TABLE sylius_product_brand CHANGE product_id product_id INT NOT NULL, CHANGE brand_id brand_id INT NOT NULL');
    }
}
