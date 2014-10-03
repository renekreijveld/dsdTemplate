<?php defined( '_JEXEC' ) or die; ?>
<?php if ($templateparams->get('module1') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('module1'); ?>">
	<jdoc:include type="modules" name="module1" style="<?php echo $templateparams->get('mod1stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('module2') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('module2'); ?>">
	<jdoc:include type="modules" name="module2" style="<?php echo $templateparams->get('mod2stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('module3') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('module3'); ?>">
	<jdoc:include type="modules" name="module3" style="<?php echo $templateparams->get('mod3stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('module4') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('module4'); ?>">
	<jdoc:include type="modules" name="module4" style="<?php echo $templateparams->get('mod4stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('module5') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('module5'); ?>">
	<jdoc:include type="modules" name="module5" style="<?php echo $templateparams->get('mod5stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('module6') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('module6'); ?>">
	<jdoc:include type="modules" name="module6" style="<?php echo $templateparams->get('mod6stijl'); ?>" />
</div>
<?php } ?>