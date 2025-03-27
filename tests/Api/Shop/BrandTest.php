<?php

declare(strict_types=1);

namespace Sylius\Tests\Api\Shop;

use Sylius\Tests\Api\JsonApiTestCase;
use App\Entity\Brand\BrandInterface;

final class BrandTest extends JsonApiTestCase
{
    protected function setUp(): void
    {
        $this->setUpDefaultGetHeaders();

        parent::setUp();
    }

    /** @test */
    public function it_gets_brand_without_image() : void 
    {
        $fixtures = $this->loadFixturesFromFile('product/product_brand_without_image.yaml');    

        /** @var BrandInterface $brand */
        $brand = $fixtures['brand_altra'];

        $this->requestGet(sprintf('/api/v2/shop/brands/%d', $brand->getId()));

        $this->assertResponse(
            $this->client->getResponse(), 
            'shop/brand/get_brand_without_image_response'
        );
    }

    /** @test */
    public function it_gets_brand_with_image() : void 
    {
        $fixtures = $this->loadFixturesFromFile('product/product_brand_with_image.yaml');    

        /** @var BrandInterface $brand */
        $brand = $fixtures['brand_altra'];
        
        $this->requestGet(sprintf('/api/v2/shop/brands/%d', $brand->getId()));

        $this->assertResponse(
            $this->client->getResponse(), 
            'shop/brand/get_brand_with_image_response'
        );
    }
}