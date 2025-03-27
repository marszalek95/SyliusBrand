<?php

namespace Sylius\Tests\Api\Shop;

use Sylius\Tests\Api\JsonApiTestCase;
use App\Entity\Product\ProductBrandInterface;
use Symfony\Component\HttpFoundation\Response;

final class ProductBrandTest extends JsonApiTestCase
{
    protected function setUp(): void
    {
        $this->setUpDefaultGetHeaders();

        parent::setUp();
    }

    /** @test */
    public function it_gets_product_brand() : void 
    {
        $fixtures = $this->loadFixturesFromFile('product/product_brand_without_image.yaml');

        /** @var ProductBrandInterface @productBrand */
        $productBrand = $fixtures['product_brand_altra'];

        $this->requestGet(sprintf('/api/v2/shop/product-brands/%d', $productBrand->getId()));

        $this->assertResponse(
            $this->client->getResponse(),
            'shop/product_brand/get_product_brand_response'
        );

    }

    /** @test */
    public function it_returns_nothing_if_product_brand_not_found() : void
    {
        $this->loadFixturesFromFile('product/product_brand_without_image.yaml');

        $this->requestGet(sprintf('/api/v2/shop/product-brands/%s', 'wrong_id'));

        $this->assertSame(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }
}