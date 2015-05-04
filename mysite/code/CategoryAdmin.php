<?php

class CategoryAdmin extends ModelAdmin {
        
    private static $menu_title = 'Categories';
	private static $url_segment = 'categories';
	private static $managed_models = array (
		'Category'
    );

    //Todo
    //private static $menu_icon = 'mysite/images/icons/category-icon.png';

}
