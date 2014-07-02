<?php

/**
 * SiteMenu
 */
class SiteMenu
{

    /**
     *
     */
    const MENU_MAIN = 1;
    /**
     *
     */
    const MENU_USER = 2;

    /**
     * @param $id
     * @param int $depthLimit
     * @throws CException
     * @return array
     */
    public static function getItemsFromMenu($id, $depthLimit = 0)
    {
        $cacheKey = 'SiteMenu.getItemsFromMenu.' . $id . '.' . Yii::app()->user->id;
        $items = Yii::app()->cache->get($cacheKey);
        if ($items !== false)
            return $items;

        $menuItem = MenuItem::model()->findByPk($id);
        if (!$menuItem)
            throw new CException('No MenuItem with ID=' . $id);
        $items = $menuItem->getItems($depthLimit);
        Yii::app()->cache->set($cacheKey, $items);
        return $items;
    }

    /**
     * @return array
     */
    public static function topMenu()
    {
        $menu = array();

        // main
        $menu[] = array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => self::getItemsFromMenu(SiteMenu::MENU_MAIN, 2),
        );
        //$menu[] = YdDynamicMenu::output();

        // user
        $menu[] = SiteMenu::userMenu();

        // search
        if (!Yii::app()->user->isGuest) {
            $menu[] = self::searchBar();
        }
        //$menu[] = '<form id="navmenu-header-search" class="navbar-search pull-right" action="' . Yii::app()->createUrl('/site/search') . '"><input type="text" name="term" class="search-query span1" id = "jump-search-box" placeholder="' . Yii::t('dressing', 'Search') . '"><input type="hidden" name="r" value="site/jump"></form>';

        return $menu;
    }

    /**
     * @return array
     */
    public static function userMenu()
    {
        return TbHtml::buttonGroup(array(
            array(
                'label' => Yii::app()->user->isGuest ? '<i class="fa fa-user"></i>&nbsp;' . Yii::t('app', 'Login') : i('//www.gravatar.com/avatar/' . md5(Yii::app()->user->user ? strtolower(trim(Yii::app()->user->user->email)) : uniqid()) . '?s=16&d=wavatar', '', array('style' => 'padding:1px;border:1px solid #ddd;border-radius:4px;')) . ' ' . Yii::app()->user->name,
                'menuOptions' => array(
                    'class' => 'pull-right',
                ),
                'items' => self::getItemsFromMenu(SiteMenu::MENU_USER, 1),
                'encodeLabel' => false,
            ),
        ), array('id' => 'user-menu', 'class' => 'pull-right'));
    }

    /**
     * @return string
     */
    public static function searchBar()
    {
        $searchForm = CHtml::beginForm(url('/product/index'), 'get', array(
            'class' => 'navbar-search pull-right',
            //'target' => '_blank',
        ));
        $searchForm .= '<input type="text" name="Product[keywords]" class="search-query" placeholder="' . Yii::t('app', 'Product') . '">';
        $searchForm .= CHtml::endForm();
        return $searchForm;
    }

}
