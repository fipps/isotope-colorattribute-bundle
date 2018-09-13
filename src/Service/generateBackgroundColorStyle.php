<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */

namespace Fipps\ColorattributeBundle\Service;


use Isotope\Model\AttributeOption;

class generateBackgroundColorStyle
{

    /**
     * @param array  $arrColors
     * @param string $strDirection
     * @return string
     */
    public function getStyle(array $arrColors, $strDirection = 'to bottom')
    {
        $numberOfColors   = count($arrColors);
        $count            = 0;
        $gradientTemplate = '#%s %u%%, #%s %u%%';
        $gradient         = array();
        foreach ($arrColors as $color) {
            $pos1       = round(100 / $numberOfColors) * $count++;
            $pos2       = min([round(100 / $numberOfColors) * $count, 100]);
            $gradient[] = sprintf($gradientTemplate, $color, $pos1, $color, $pos2);
        }
        $ret = sprintf('background-image: linear-gradient(%s, %s);', $strDirection, implode(', ', $gradient));

        return $ret;
    }

    public function getStyleFromOption(AttributeOption $option, $defaultColor = '000000', $direction = 'to bottom')
    {
        $arrColors = array();
        try {
            foreach (deserialize($option->color) as $color) {
                $arrColors[] = $color['color'];
            };
        } catch (Exception $e) {
            $arrColors = [$defaultColor];
        }

        return $this->getStyle($arrColors, $direction);
    }
}