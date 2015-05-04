<?php

class Product extends DataObject {


    private static $db = array (
        'Name' => 'Varchar',
        'Description' => 'Text',
        'Price' => 'Currency',
        'IsActive' => 'Boolean',
        'Order' => 'Int'
    );

    private static $has_one = array (
            'Category' => 'Category',
            'Photo' => 'Image'
    );

    private static $summary_fields = array(
            'GridThumbnail' => '',
            'Name' => 'Name',
            'Category.Name' => 'Category',
            'Description' => 'Description',
            'Order' => 'Order'
    );

     public function getGridThumbnail() {
            if($this->Photo()->exists()) {
                    return $this->Photo()->SetWidth(80);
            }

            return 'No Image';
    }

    public function searchableFields() {
		return array (
			'Name' => array (
				'filter' => 'PartialMatchFilter',
				'title' => 'Name',
				'field' => 'TextField'
            ),
            'CategoryID' => array (
                'filter' => 'ExactMatchFilter',
				'title' => 'Category',
				'field' => DropdownField::create('CategoryID')
							->setSource(
								Category::get()->map('ID','Name')
							)
							->setEmptyString('-- Any Category --')
                    ),
            );
    }

    public function getCMSFields() 
    {

        $fields = FieldList::create(TabSet::create('Root'));
		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Name'),
			TextareaField::create('Description'),
            CurrencyField::create('Price', 'Price'),
            TextField::create('Order'),
            DropdownField::create('CategoryID','Category')
				->setSource(Category::get()->map('ID','Name'))
                ->setEmptyString('-- Select a Category --'),
            CheckboxField::create('IsActive','Is Active/Available'),

		));
		$fields->addFieldToTab('Root.Photos', $uploader = UploadField::create(
			'Photo'
		));

        $uploader->setFolderName('product-photos');
        $uploader->getValidator()->setAllowedExtensions(array(
			'png','gif','jpeg','jpg'
		));


		return $fields;

    }


}
