<?php
 
class Chapagain_ProductTooltip_Model_Observer
{
    public function insertBlock($observer)
    {
        /** @var $_block Mage_Core_Block_Abstract */
        /*Get block instance*/
        $_block = $observer->getBlock();
        
        /*get Block type*/
        $_type = $_block->getType();
        
       /*Check block type*/
        if ($_type == 'catalog/product_list') { 
            /*Clone block instance*/
            $_child = clone $_block;
            /*set another type for block*/
            $_child->setType('producttooltip/producttooltip');
            /*set child for block*/
            $_block->setChild('child.product_list', $_child);
            /*set our template*/
            $_block->setTemplate('chapagain_producttooltip/producttooltip.phtml');
        }
        
    }
}
