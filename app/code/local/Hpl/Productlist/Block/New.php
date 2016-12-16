<?php
class Hpl_Productlist_Block_New extends Mage_Catalog_Block_Product_List
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getModuleName()
    {
        return 'Mage_Catalog';
    }
    protected function _getProductCollection()
    {
        if (is_null($this->_productCollection)) {
            $this->_productCollection = $this->getLayer()->getProductCollection();
        }
        return $this->_productCollection;
    }
    public function getLayer()
    {
        $layer = Mage::registry('current_layer');
        if ($layer) {
            return $layer;
        }
        return Mage::getSingleton('hpl_productlist/layer');
    }
}