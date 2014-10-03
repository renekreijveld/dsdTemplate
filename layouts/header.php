<?php defined( '_JEXEC' ) or die; ?>
<?php if ($templateparams->get('header1') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('header1'); ?>">
	<jdoc:include type="modules" name="header1" style="<?php echo $templateparams->get('head1stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('header2') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('header2'); ?>">
	<jdoc:include type="modules" name="header2" style="<?php echo $templateparams->get('head2stijl'); ?>" />
</div>
<?php } ?>
<?php if ($templateparams->get('header3') != 0) { ?>
<div class="col-md-<?php echo $templateparams->get('header3'); ?>">
	<jdoc:include type="modules" name="header3" style="<?php echo $templateparams->get('head3stijl'); ?>" />
</div>
<?php } ?>