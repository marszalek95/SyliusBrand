<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102091659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_brand DROP FOREIGN KEY FK_51A9B62A2420AFE1');
        $this->addSql('DROP INDEX IDX_51A9B62A2420AFE1 ON sylius_product_brand');
        $this->addSql('ALTER TABLE sylius_product_brand CHANGE brandd_id brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_product_brand ADD CONSTRAINT FK_51A9B62A44F5D008 FOREIGN KEY (brand_id) REFERENCES sylius_brand (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_51A9B62A44F5D008 ON sylius_product_brand (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_brand DROP FOREIGN KEY FK_51A9B62A44F5D008');
        $this->addSql('DROP INDEX IDX_51A9B62A44F5D008 ON sylius_product_brand');
        $this->addSql('ALTER TABLE sylius_product_brand CHANGE brand_id brandd_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_product_brand ADD CONSTRAINT FK_51A9B62A2420AFE1 FOREIGN KEY (brandd_id) REFERENCES sylius_brand (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_51A9B62A2420AFE1 ON sylius_product_brand (brandd_id)');
    }
}
