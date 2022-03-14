<?php

declare(strict_types=1);

/*
 * This file is part of Contao Slick Bundle.
 *
 * (c) Jannik Nölke (https://jaynoe.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'slick_centerMode';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['slick_centerMode'] = 'slick_centerPadding';
$GLOBALS['TL_DCA']['tl_content']['palettes']['slick_wrapper_start'] =
    '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop'
;

PaletteManipulator::create()
    ->addLegend('slick_legend', 'type_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('slick_slidesToShow', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_slidesToScroll', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_speed', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_autoplaySpeed', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_initialSlide', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_arrows', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_dots', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_infinite', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('slick_centerMode', 'slick_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('ignore_bundle_classes', 'expert_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('slick_wrapper_start', 'tl_content')
;

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_slidesToShow'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_slidesToShow'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'maxlength' => 2, 'mandatory' => true),
    'sql' => 'varchar(2) NULL'
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_slidesToScroll'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_slidesToScroll'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'maxlength' => 2, 'mandatory' => true),
    'sql' => 'varchar(2) NULL'
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_speed'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_speed'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'maxlength' => 4),
    'sql' => "varchar(4) NOT NULL default '300'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_autoplaySpeed'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_autoplaySpeed'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'maxlength' => 4),
    'sql' => "varchar(4) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_initialSlide'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_initialSlide'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'maxlength' => 2),
    'sql' => "varchar(2) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_arrows'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_arrows'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'clr'),
    'sql' => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_dots'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_dots'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'clr'),
    'sql' => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_infinite'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_infinite'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'clr'),
    'sql' => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_centerMode'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_infinite'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'clr', 'submitOnChange' => true),
    'sql' => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slick_centerPadding'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slick_centerPadding'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'maxlength' => 6),
    'sql' => "varchar(6) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ignore_bundle_classes'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['ignore_bundle_classes'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'clr'),
    'sql' => "char(1) NOT NULL default '0'"
);