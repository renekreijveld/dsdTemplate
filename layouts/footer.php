<?php defined( '_JEXEC' ) or die; ?>
<?php if ($templateparams->get('footer1') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('footer1'); ?>">
	<jdoc:include type="modules" name="footer1" style="<?php echo $templateparams->get('foot1stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('footer2') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('footer2'); ?>">
	<jdoc:include type="modules" name="footer2" style="<?php echo $templateparams->get('foot2stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('footer3') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('footer3'); ?>">
	<jdoc:include type="modules" name="footer3" style="<?php echo $templateparams->get('foot3stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('footer4') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('footer4'); ?>">
	<jdoc:include type="modules" name="footer4" style="<?php echo $templateparams->get('foot4stijl'); ?>" />
</div>
<?php } ?>