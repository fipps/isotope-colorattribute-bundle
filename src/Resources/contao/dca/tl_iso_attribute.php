<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */

$DCA = &$GLOBALS['TL_DCA']['tl_iso_attribute'];

// Palettes
$DCA['palettes']['__selector__'][]         = 'showColor';
$DCA['subpalettes']['optionsSource_table'] .= ',showColor';
$DCA['subpalettes']['showColor']           = 'defaultColor';

// New fields
$newFields = array(
    'showColor'    => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute']['showColor'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array(
            'submitOnChange' => true,
            'tl_class'       => 'w50 m12',
        ),
        'sql'       => "char(1) NOT NULL default ''",
    ),
    'defaultColor' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute']['defaultColor'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => array(
            'mandatory'      => true,
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
