<?php defined( '_JEXEC' ) or die;
$cwidth = $templateparams->get('Cwidth');
if ($templateparams->get('collapsable') == 1) {
	if ($this->countModules('links') == 0) $cwidth = $cwidth + $templateparams->get('Lwidth');
	if ($this->countModules('rechts') == 0) $cwidth = $cwidth + $templateparams->get('Rwidth');
}
?>
<div class="col-md-<?php echo $cwidth; ?> component">
	<jdoc:include type="modules" name="contentstart" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="contentfinish" />
</div>