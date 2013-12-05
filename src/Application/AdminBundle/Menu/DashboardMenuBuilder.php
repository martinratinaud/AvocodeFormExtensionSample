<?php
namespace Application\AdminBundle\Menu;

use Admingenerator\GeneratorBundle\Menu\AdmingeneratorMenuBuilder;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class DashboardMenuBuilder extends AdmingeneratorMenuBuilder
{
    protected $translation_domain = 'Admin';

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return ItemInterface
     */
    public function company(FactoryInterface $factory, array $options)
    {
        return $this->createEntries($factory->createItem('root'), 'Company');
    }

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return Ambigous ItemInterface
     */
    public function product(FactoryInterface $factory, array $options)
    {
        return $this->createEntries($factory->createItem('root'), 'Product');
    }

    /**
     * @param ItemInterface $menu
     * @param string $entityName
     * @return ItemInterface
     */
    protected function createEntries(ItemInterface $menu, $entityName)
    {
        $menu->setChildrenAttributes(array('class' => 'nav nav-list dashboard-' . strtolower($entityName)));
        $this->addHeader($menu, sprintf('dashboard.%s.title', strtolower($entityName)));
        $this->addLinkRoute($menu, sprintf('dashboard.%s.list', strtolower($entityName)), sprintf('Application_AdminBundle_%s_list', $entityName))->setExtra('icon', 'icon-search');
        $this->addLinkRoute($menu, sprintf('dashboard.%s.new', strtolower($entityName)), sprintf('Application_AdminBundle_%s_new', $entityName))->setExtra('icon', 'icon-plus');

        return $menu;
    }

    /**
     * Add a header on sub menu item to this menu
     *
     * Returns the child item
     *
     * @param ItemInterface|string $child An ItemInterface instance or the name of a new item to create
     * @param string               $label Label of the sub header
     *
     * @return ItemInterface
     * @throws \InvalidArgumentException if the item is already in a tree
     */
    protected function addSubHeader(ItemInterface $menu, $label, $additionnalClass = '')
    {
        $item = $this->addClass($menu->addChild($label), !empty($additionnalClass) ? 'item-'.$additionnalClass : '');
        $item->setExtra('translation_domain', $this->translation_domain);

        return $item;
    }

    /**
     * @param  ItemInterface $item
     * @param  string        $class
     * @return ItemInterface
     */
    protected function addClass(ItemInterface $item, $class)
    {
        if (empty($class)) {
            return;
        }

        $item->setAttribute('class', ltrim($item->getAttribute('class', '') . ' ' . $class));

        return $item;
    }

    /**
     * (non-PHPdoc)
     * @see \Admingenerator\GeneratorBundle\Menu\AdmingeneratorMenuBuilder::addDropdown()
     */
    protected function addDropdown(ItemInterface $menu, $label, $caret = true)
    {
        $item = parent::addDropdown($menu, $label, $caret);
        // Remove dropdown click: use CSS
        $item->setUri('javascript:void(0)');
        $item->setLinkAttributes(array());

        return $item;
    }
}
