<?php
class Hpl_Productlist_Controller_Router extends Mage_Core_Controller_Varien_Router_Abstract
{
    const NEW_PRODUCTS_URL_KEY = 'new-products';
    public function initControllerRouters($observer)
    {
        $front = $observer->getEvent()->getFront();
        $front->addRouter('hpl_productlist', $this);
        return $this;
    }

    public function match(Zend_Controller_Request_Http $request)
    {
        if (!Mage::isInstalled()) {
            Mage::app()->getFrontController()->getResponse()
                ->setRedirect(Mage::getUrl('install'))
                ->sendResponse();
            exit;
        }
        $urlKey = trim($request->getPathInfo(), '/');
        if ($urlKey == self::NEW_PRODUCTS_URL_KEY) {
            $request->setModuleName('productlist')
                ->setControllerName('index')
                ->setActionName('index');
            $request->setAlias(
                Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS,
                $urlKey
            );
            return true;
        }
        return false;
    }
}