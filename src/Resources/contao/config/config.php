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

$GLOBALS['TL_WRAPPERS']['start'][] = 'slick_wrapper_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'slick_wrapper_end';