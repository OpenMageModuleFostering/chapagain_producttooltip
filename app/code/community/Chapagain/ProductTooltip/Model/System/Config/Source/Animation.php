<?php

class Chapagain_ProductTooltip_Model_System_Config_Source_Animation
{
 
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'fade', 'label'=>Mage::helper('producttooltip')->__('Fade')),
            array('value' => 'grow', 'label'=>Mage::helper('producttooltip')->__('Grow')),
            array('value' => 'swing', 'label'=>Mage::helper('producttooltip')->__('Swing')),
            array('value' => 'slide', 'label'=>Mage::helper('producttooltip')->__('Slide')),
            array('value' => 'fall', 'label'=>Mage::helper('producttooltip')->__('Fall')),
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
			'fade'  => Mage::helper('producttooltip')->__('Fade'),
			'grow'  => Mage::helper('producttooltip')->__('Grow'),
			'swing'  => Mage::helper('producttooltip')->__('Swing'),
			'slide'  => Mage::helper('producttooltip')->__('Slide'),
			'fall'  => Mage::helper('producttooltip')->__('Fall'),
		);
	}
}
