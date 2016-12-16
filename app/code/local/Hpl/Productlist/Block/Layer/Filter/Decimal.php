<?php 
class Hpl_Productlist_Block_Layer_Filter_Decimal extends Mage_Catalog_Block_Layer_Filter_Decimal
{
    public function __construct()
    {
        parent::__construct();
        $this->_filterModelName = 'hpl_productlist/layer_filter_decimal';
    }
}