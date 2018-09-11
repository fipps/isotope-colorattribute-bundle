<?php
/**
 *  Copyright Information
 *  @copyright: 2018 agentur fipps e.K.
 *  @author   : Arne Borchert
 *  @license  : LGPL 3.0+
 */


$DCA = &$GLOBALS['TL_DCA']['tl_iso_attribute_option'];

// Palettes
$DCA['palettes']['option'] =  str_replace(',label', ',label,color;', $DCA['palettes']['option']);

// Change fields
$DCA['fields']['label']['eval']['tl_class'] = 'clr w50';

// New fields
$newFields = array(
    'color'   => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute_option']['color'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => array(
            'maxlength'      => 6,
            'multiple'       => true,
            'size'           => 2,
            'colorpicker'    => true,
            'isHexColor'     => true,
            'decodeEntities' => true,
            'tl_class'       => 'w50 wizard',
        ),
        'sql'       => "varchar(64) NOT NULL default ''",
    ),
);

$DCA['fields'] = array_merge($DCA['fields'], $newFields);