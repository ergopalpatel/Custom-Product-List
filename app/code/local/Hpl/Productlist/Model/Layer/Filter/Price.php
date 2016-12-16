<?php 
class HPl_Productlist_Model_Layer_Filter_Price extends Mage_Catalog_Model_Layer_Filter_Price
{
    protected function _createItem($label, $value, $count = 0)
    {
        return Mage::getModel('hpl_productlist/layer_filter_item')
            ->setFilter($this)
            ->setLabel($label)
            ->setValue($value)
            ->setCount($count);
    }
}