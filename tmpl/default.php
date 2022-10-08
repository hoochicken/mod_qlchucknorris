<?php
/**
 * @package		mod_qlchucknorris
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::stylesheet('mod_qlchucknorris/style.css', [], true);
JHtml::script('mod_qlchucknorris/script.js', false, true);
?>
<div id="module_<?php echo $module->id; ?>" class="qlchucknorris">
    <div id="qlcn_<?php echo $module->id; ?>" class="hidden"><?php echo $strText; ?></div>
    <div id="qlcn_buttons_<?php echo $module->id; ?>" class="hidden"><?php echo $strButtons; ?></div>
    <button class="btn" onclick="roundhouseKickNow(<?php echo $module->id; ?>)"><?php echo $strButton; ?></button>
</div>
