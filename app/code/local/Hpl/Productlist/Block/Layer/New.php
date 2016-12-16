<?php
class Hpl_Productlist_Block_Layer_New extends Mage_Catalog_Block_Layer_View
{
    public function getLayer()
    {
        if (!$this->hasData('_layer')){
            $layer = Mage::getSingleton('hpl_productlist/layer');
            $this->setData('_layer', $layer);
        }
        return $this->getData('_layer');
    }
    protected function _initBlocks()
    {
        parent::_initBlocks();
        $this->_attributeFilterBlockName    = 'hpl_productlist/layer_filter_attribute';
        $this->_priceFilterBlockName        = 'hpl_productlist/layer_filter_price';
        $this->_decimalFilterBlockName      = 'hpl_productlist/layer_filter_decimal';
    }
    protected function _prepareLayout()
    {
        $stateBlock = $this->getLayout()->createBlock($this->_stateBlockName)
            ->setLayer($this->getLayer());
        $this->setChild('layer_state', $stateBlock);

        $filterableAttributes = $this->_getFilterableAttributes();
        foreach ($filterableAttributes as $attribute) {
            if ($attribute->getAttributeCode() == 'price') {
                $filterBlockName = $this->_priceFilterBlockName;
            } elseif ($attribute->getBackendType() == 'decimal') {
                $filterBlockName = $this->_decimalFilterBlockName;
            } else {
                $filterBlockName = $this->_attributeFilterBlockName;
            }

            $this->setChild($attribute->getAttributeCode() . '_filter',
                $this->getLayout()->createBlock($filterBlockName)
                    ->setLayer($this->getLayer())
                    ->setAttributeModel($attribute)
                    ->init());
        }

        $this->getLayer()->apply();
        return $this;
    }
}
