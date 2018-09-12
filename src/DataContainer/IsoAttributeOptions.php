<?php
/**
 *  Copyright Information
 *  @copyright: 2018 agentur fipps e.K.
 *  @author   : Arne Borchert
 *  @license  : LGPL 3.0+
 */

namespace Fipps\ColorattributeBundle\DataContainer;


class IsoAttributeOptions
{
    /**
     * Return list of MultiColumnWizard columns
     * @param   \MultiColumnWizard
     * @return  array
     */
    public function getColumns($objWidget)
    {
        $arrColumns = array
        (
            'color' => array
            (
                'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute_options']['multiColumnWizardColorHeader'],
                'inputType' => 'text',
                'eval'      => array(
                    'maxlength'      => 6,
                    'colorpicker'    => true,
                    'isHexColor'     => true,
                    'decodeEntities' => true,
                    'tl_class'       => 'wizard tl_text_4',
                ),
            )
        );

        return $arrColumns;
    }

}