<?php

class Chapagain_ProductTooltip_Model_System_Config_Source_Theme
{
 
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'default', 'label'=>Mage::helper('producttooltip')->__('Default')),            
            array('value' => 'light', 'label'=>Mage::helper('producttooltip')->__('Light')),
            array('value' => 'noir', 'label'=>Mage::helper('producttooltip')->__('Noir')),
            array('value' => 'punk', 'label'=>Mage::helper('producttooltip')->__('Punk')),
            array('value' => 'shadow', 'label'=>Mage::helper('producttooltip')->__('Shadow')),            
        );
    }
 
	/**
	 * Get options in "key-value" format
	 *
	 * @return array
	 */
	public function toArray()
	{
		return array(
			'default'  => Mage::helper('producttooltip')->__('Default'),			
			'light'  => Mage::helper('producttooltip')->__('Light'),
			'noir'  => Mage::helper('producttooltip')->__('Noir'),
			'punk'  => Mage::helper('producttooltip')->__('Punk'),
			'shadow'  => Mage::helper('producttooltip')->__('Shadow'),
		);
	}
}
