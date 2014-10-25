<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    protected function _initNamespaces()
    {
        Zend_Loader_Autoloader::getInstance()->registerNamespace("Frameworks_");        
        Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(TRUE);
    }

}

