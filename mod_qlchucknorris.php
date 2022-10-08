<?php
/**
 * @package        mod_qlchucknorris
 * @copyright    Copyright (C) 2022 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';
$obj_helper = new modQlchucknorrisHelper($module, $params);

$numSource = $params->get('source');;

if (1 == $numSource) {
    $strText = $obj_helper->getTextModule();
    $strButtons = $obj_helper->getButtonsModule();
    $strButton = $obj_helper->getButton();
} elseif (2 == $numSource) {
    $strText = $obj_helper->getTextArticle();
    $strButtons = $obj_helper->getButtonsArticle();
    $strButton = $obj_helper->getButton();
} else {
    $strText = $obj_helper->getTextDefault();
    $strButtons = $obj_helper->getButtonsDefault();
    $strButton = $obj_helper->getButton();
}
$strText = $obj_helper->cleanString($strText);

require JModuleHelper::getLayoutPath('mod_qlchucknorris', $params->get('layout', 'default'));
