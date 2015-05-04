<?php
class ProductAdmin extends ModelAdmin {
	private static $menu_title = 'Products';
	private static $url_segment = 'products';
	private static $managed_models = array (
		'Product'
	);
}
