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
$DCA['subpalettes']['showColor']           = 'defaultColor,gradientDirection';

// New fields
$newFields = array(
    'showColor'         => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute']['showColor'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array(
            'submitOnChange' => true,
            'tl_class'       => 'w50 m12',
        ),
        'sql'       => "char(1) NOT NULL default ''",
    ),
    'defaultColor'      => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute']['defaultColor'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => array(
            'mandatory'      => true,
            'maxlength'      => 6,
            'colorpicker'    => true,
            'isHexColor'     => true,
            'decodeEntities' => true,
            'tl_class'       => 'w50 wizard',
        ),
        'sql'       => "varchar(64) NOT NULL default ''",
    ),
    'gradientDirection' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_iso_attribute']['gradientDirection'],
        'exclude'   => true,
        'inputType' => 'select',
        'default' => 'to bottom',
        'options'   => array(
            'to bottom' => 'to_bottom',
            'to top' => 'to top',
            'to left' => 'to left',
            'to right' => 'to right',
            '45deg' => '45°',
            '135deg' => '135°',
            '225deg' => '225°',
            '315deg' => '315°',
        ),
        'eval'      => array(
            'mandatory' => true,
            'includeBlankOption' => true,
            'tl_class'  => 'w50 wizard',
        ),
        'sql'       => "varchar(64) NOT NULL default 'to bottom'",
    ),
);

$DCA['fields'] = array_merge($DCA['fields'], $newFields);
