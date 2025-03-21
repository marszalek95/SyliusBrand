<?php

namespace App\Behat\Context\Ui\Shop;

use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Shop\Product\ShowPageInterface;
use Webmozart\Assert\Assert;

final class ProductContext implements Context
{
    public function __construct(
        private ShowPageInterface $showPage,
    )
    {
    }

    /**
     * @Then I shoul see the product brand :name
     */
    public function iShoulSeeTheProductBrand($name)
    {
        
    }
}