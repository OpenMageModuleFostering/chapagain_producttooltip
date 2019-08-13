<?php

class Chapagain_ProductTooltip_Model_System_Config_Source_Position
{
 
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'right', 'label'=>Mage::helper('producttooltip')->__('Right')),
            array('value' => 'left', 'label'=>Mage::helper('producttooltip')->__('Left')),
            array('value' => 'top', 'label'=>Mage::helper('producttooltip')->__('Top')),
            array('value' => 'top-right', 'label'=>Mage::helper('producttooltip')->__('Top Right')),
            array('value' => 'top-left', 'label'=>Mage::helper('producttooltip')->__('Top Left')),
            array('value' => 'bottom', 'label'=>Mage::helper('producttooltip')->__('Bottom')),
            array('value' => 'bottom-right', 'label'=>Mage::helper('producttooltip')->__('Bottom Right')),
            array('value' => 'bottom-left', 'label'=>Mage::helper('producttooltip')->__('Bottom Left')),
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
			'right'  => Mage::helper('producttooltip')->__('Right'),
			'left'  => Mage::helper('producttooltip')->__('Left'),
			'top'  => Mage::helper('producttooltip')->__('Top'),
			'top-right'  => Mage::helper('producttooltip')->__('Top Right'),
			'top-left'  => Mage::helper('producttooltip')->__('Top Left'),
			'bottom'  => Mage::helper('producttooltip')->__('Bottom'),
			'bottom-right'  => Mage::helper('producttooltip')->__('Bottom Right'),
			'bottom-left'  => Mage::helper('producttooltip')->__('Bottom Left'),
		);
	}
}
