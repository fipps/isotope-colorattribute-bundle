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
        $return = parent::generateOptionItem($attribute, $label, $value, $matchCount, $isActive);

        // Add color attribute
        if (($objAttribute = $GLOBALS['TL_DCA']['tl_iso_product']['attributes'][$attribute]) !== null) {
            if ($objAttribute->showColor == 1) {
                $options = AttributeOption::findById($value);
                $arrColorValues = array();
                try {
                    foreach (deserialize($options->color) as $color) {
                        $arrColorValues[] = $color['color'];
                    };
                } catch (Exception $e) {
                    $arrColorValues = [$objAttribute->defaultColor];
                }
                $return['color'] = $arrColorValues;
            }
        }

        return $return;
    }
}