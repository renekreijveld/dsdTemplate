<?php defined( '_JEXEC' ) or die;
if (($templateparams->get('collapsable') == 1 && $this->countModules('rechts') > 0) || $templateparams->get('collapsable') == 0) {
?>
<div class="col-md-<?php echo $templateparams->get('Rwidth'); ?> rechts">
	<jdoc:include type="modules" name="rechts" style="xhtml" />
</div>
<?php } ?>