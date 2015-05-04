<?php

class MenuPage extends Page {

}

class MenuPage_Controller extends Page_Controller {

	public function MenuProducts() {
		return Product::get()
				->filter(array(
					'IsActive' => true
				));
	}
}
