<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */


$DCA = &$GLOBALS['TL_DCA']['tl_iso_attribute_option'];

// Palettes
$DCA['palettes']['option'] = str_replace(',isDefault', ',isDefault,color;', $DCA['palettes']['option']);

// Change fields
$DCA['fields']['label']['eval']['tl_class'] = 'w50';

// New fields
$newFields = array(
    'color' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute_option']['color'],
        'inputType' => 'multiColumnWizard',
        'eval'      => array(
            'tl_class'        => 'clr w50',
            'columnsCallback' => array('Fipps\ColorattributeBundle\DataContainer\IsoAttributeOptions', 'getColumns'),
        ),
        'sql'       => "blob NULL",
    ),
);

$DCA['fields'] = array_merge($DCA['fields'], $newFields);