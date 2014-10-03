<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$tmplpar = $app->getTemplate(true)->params;
?>
<div class="search<?php echo $moduleclass_sfx ?>">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" role="form" <?php if ($button && ($button_pos=='left'||$button_pos=='right')) echo 'class="form-inline"'; ?>>
		<?php if ($button && $button_pos=='top') { ?>
		<button style="margin-bottom:15px;" type="submit" class="btn btn-default" onclick="this.form.searchword.focus();"><?php echo $button_text; ?></button>
		<?php } ?>
		<div class="form-group">
			<?php if ($button && $button_pos=='left') { ?>
			<button type="submit" class="btn btn-default" onclick="this.form.searchword.focus();"><?php echo $button_text; ?></button>
			<?php } ?>
			<?php if ($tmplpar->get('modSearchLoupe')==1) {?>
			<div class="input-group">
			<?php } ?>
			<?php if ($tmplpar->get('modSearchLoupe')==1 && $tmplpar->get('modSearchLoupePos')=='l') {?>
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
			<?php } ?>
			<input placeholder="<?php echo $label; ?>" name="searchword" id="mod-search-searchword" maxlength="<?php echo $maxlength; ?>"  class="form-control" type="text" />
			<?php if ($tmplpar->get('modSearchLoupe')==1 && $tmplpar->get('modSearchLoupePos')=='r') {?>
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
			<?php } ?>
			<?php if ($tmplpar->get('modSearchLoupe')==1) {?>
			</div>
			<?php } ?>
			<?php if ($button && $button_pos=='right') { ?>
			<button type="submit" class="btn btn-default" onclick="this.form.searchword.focus();"><?php echo $button_text; ?></button>
			<?php } ?>
		</div>
		<?php if ($button && $button_pos=='bottom') { ?>
		<button type="submit" class="btn btn-default" onclick="this.form.searchword.focus();"><?php echo $button_text; ?></button>
		<?php } ?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</form>
</div>
