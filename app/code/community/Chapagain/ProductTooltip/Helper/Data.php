<?php

class Chapagain_ProductTooltip_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
	 * General Configuration Settings
	 */ 	
	 	
	public function getIsEnabled()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/is_enabled');
    }
    
    public function getShowName()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/show_name');
    }
    
    public function getShowPrice()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/show_price');
    }
    
    public function getShowRating()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/show_rating');
    }
    
    public function getShowShortDescription()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/show_short_description');
    }
    
    public function getShowAttribute()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/show_attribute');
    }
    
    public function getShowAttributeProductListing()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/general/show_attribute_product_listing');
    }
    
    /**
     * Tooltip Design Configuration Settings
     */ 
    
    public function getAnimation()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/design/animation');
    }
    
    public function getDelay()
    { 		
        return (int)Mage::getStoreConfig('chapagain_producttooltip/design/delay');
    }
    
    public function getMinWidth()
    { 		
        return (int)Mage::getStoreConfig('chapagain_producttooltip/design/min_width');
    }
    
    public function getMaxWidth()
    { 	
		$value = (int)Mage::getStoreConfig('chapagain_producttooltip/design/max_width');
		return $value > 0 ? $value : null;
    }
    
    public function getIconDesktop()
    { 		
        $value = Mage::getStoreConfig('chapagain_producttooltip/design/icon_desktop');
        return $value == 0 ? 'false' : 'true';
    }
    
    public function getIconTouch()
    { 		
        $value = Mage::getStoreConfig('chapagain_producttooltip/design/icon_touch');
        return $value == 0 ? 'false' : 'true';
    }
    
    public function getPosition()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/design/position');
    }
    
    public function getSpeed()
    { 		
        return (int)Mage::getStoreConfig('chapagain_producttooltip/design/speed');
    }
    
    public function getTheme()
    { 		
        return Mage::getStoreConfig('chapagain_producttooltip/design/theme');
    }
    
    public function getTouchDevices()
    { 		
        $value = Mage::getStoreConfig('chapagain_producttooltip/design/touch_devices');
        return $value == 0 ? 'false' : 'true';
    }
    
    
    /**
     * Get Product Attributes
     */ 
         
    public function getProductAttributes($_product) {
		$data = array();	
		$_product = Mage::getModel('catalog/product')->load($_product->getEntityId());
		$attributes = $_product->getAttributes();	
		foreach ($attributes as $attribute) {
			
			// added a new condition $attribute->getUsedInProductListing() 
			// to show only those attributes which are set as Used In Product Listing = Yes
			if ($this->getShowAttributeProductListing()) {
				if ($attribute->getIsVisibleOnFront() && !in_array($attribute->getAttributeCode()) 
				&& $attribute->getUsedInProductListing()
				) {
					$value = $attribute->getFrontend()->getValue($_product);			
					if (!$_product->hasData($attribute->getAttributeCode())) {
						$value = Mage::helper('catalog')->__('N/A');
					} elseif ((string)$value == '') {			
						$value = Mage::helper('catalog')->__('No');
					} elseif ($attribute->getFrontendInput() == 'price' && is_string($value)) {
						$value = Mage::app()->getStore()->convertPrice($value, true);
					}

					if (is_string($value) && strlen($value)) {
						$data[$attribute->getAttributeCode()] = array(
							'label' => $attribute->getStoreLabel(),
							'value' => $value,
							'code'  => $attribute->getAttributeCode()
						);
					}
				}
			} else {
				if ($attribute->getIsVisibleOnFront() && !in_array($attribute->getAttributeCode())) {
					$value = $attribute->getFrontend()->getValue($_product);			
					if (!$_product->hasData($attribute->getAttributeCode())) {
						$value = Mage::helper('catalog')->__('N/A');
					} elseif ((string)$value == '') {			
						$value = Mage::helper('catalog')->__('No');
					} elseif ($attribute->getFrontendInput() == 'price' && is_string($value)) {
						$value = Mage::app()->getStore()->convertPrice($value, true);
					}

					if (is_string($value) && strlen($value)) {
						$data[$attribute->getAttributeCode()] = array(
							'label' => $attribute->getStoreLabel(),
							'value' => $value,
							'code'  => $attribute->getAttributeCode()
						);
					}
				}
			}			
		}
		return $data;
	}

	public function getAttributeTable($_product) {
		$_additional = $this->getProductAttributes($_product);
		
		$table = '';
		
		if (!empty($_additional)) {		
			$table = '<table class="data-table" id="product-attribute-specs-table"><col width="25%" /><col /><tbody>';
			foreach ($_additional as $_data):
				$table .= '<tr><th class="label">'.Mage::helper("core")->escapeHtml($_data["label"]).'</th><td class="data">'.Mage::helper("catalog/output")->productAttribute($_product, $_data["value"], $_data["code"]) .'</td></tr>';
			endforeach;			
			$table .= '</tbody></table>';
		}
		
		return $table;
	}
	
	/**
	 * Checking Magento Version
	 */ 
    
    public function getVersion()
    {
		return Mage::getVersion();
	}
	
	public function getVersion19() 
	{
		if (version_compare($this->getVersion(), '1.9', '>=')){
			return true;
		} 
		return false;
	}
}
