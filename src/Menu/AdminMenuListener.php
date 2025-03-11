<?php

namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $brandMenu = $menu
            ->getChild('catalog')
        ;

        $brandMenu
            ->addChild('new-subitem', [
                'route' => 'app_admin_brand_index',
            ])
            ->setLabel('app.ui.brands')
            ->setLabelAttribute('icon', 'tags')
        ;
    }
}