<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */

namespace Fipps\ColorattributeBundle\Listener;


use Isotope\Model\AttributeOption;

class HooksListener extends \System
{

    /**
     * @param string  $strBuffer
     * @param \Widget $widget
     * @return string
     */
    public function onParseWidget(string $strBuffer, \Widget $widget)
    {
        $newTemplate = 'form_colorRadio';
        $style       = new \Fipps\ColorattributeBundle\Service\generateBackgroundColorStyle();

        if ($widget instanceof \Contao\FormRadioButton && isset($widget->showColor) && $widget->showColor == 1 && $widget->template != $newTemplate) {
            $cloneWidget           = clone ($widget);
            $cloneWidget->template = $newTemplate;
            $options               = $cloneWidget->options;
            foreach ($options as $key => $option) {
                $option['style'] = $style->getStyleFromOption($option['model'], $widget->defaultColor, $widget->gradientDirection);
                $options[$key]   = $option;
            }
            $cloneWidget->options = $options;
            $strBuffer            = $cloneWidget->parse();

            return $strBuffer;
        }

        return $strBuffer;
    }


}