<?php

class Category extends DataObject {


    private static $db = array (
        'Name' => 'Varchar',
        'Description' => 'Text',
        'Order' => 'Int'
    );

    private static $has_one = array (
            'Photo' => 'Image'
    );

    private static $summary_fields = array(
            'GridThumbnail' => '',
            'Name' => 'Name',
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
        )
        );
    }
 
    public function getCMSFields() 
    {

        $fields = FieldList::create(TabSet::create('Root'));
		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Name'),
			TextareaField::create('Description'),
            TextField::create('Order'),

		));
		$fields->addFieldToTab('Root.Photos', $uploader = UploadField::create(
			'Photo'
		));

        $uploader->setFolderName('category-photos');
        $uploader->getValidator()->setAllowedExtensions(array(
			'png','gif','jpeg','jpg'
		));


		return $fields;

    }
     

}
