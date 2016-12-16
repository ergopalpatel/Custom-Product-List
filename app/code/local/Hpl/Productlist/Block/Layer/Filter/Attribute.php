<?php 
class Hpl_Productlist_Block_Layer_Filter_Attribute extends Mage_Catalog_Block_Layer_Filter_Attribute
{
    public function __construct()
    {
        parent::__construct();
        $this->_filterModelName = 'hpl_productlist/layer_filter_attribute';
    }
}