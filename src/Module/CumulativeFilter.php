<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */

namespace Fipps\ColorattributeBundle\Module;

use \Isotope\Model\AttributeOption;

class CumulativeFilter extends \Isotope\Module\CumulativeFilter
{

    /**
     * @inheritdoc
     */
    public function __construct($objModule, $strColumn)
    {
        $this->navigationTpl = $this->navigationTpl ?: 'nav_isofilter';
        parent::__construct($objModule, $strColumn);
    }

    /**
     * @inheritdoc
     */
    protected function generateOptionItem($attribute, $label, $value, $matchCount, $isActive)
    {
        $item  = parent::generateOptionItem($attribute, $label, $value, $matchCount, $isActive);
        $style = new \Fipps\ColorattributeBundle\Service\generateBackgroundColorStyle();

        // Add color attribute
        if (($objAttribute = $GLOBALS['TL_DCA']['tl_iso_product']['attributes'][$attribute]) !== null) {
            if ($objAttribute->showColor == 1) {
                $option = AttributeOption::findById($value);

                $item['style'] = $style->getStyleFromOption($option, $objAttribute->defaultColor, $objAttribute->gradientDirection);
            }
        }

        return $item;
    }
}