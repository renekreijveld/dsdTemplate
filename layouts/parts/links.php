<?php defined( '_JEXEC' ) or die;
if (($templateparams->get('collapsable') == 1 && $this->countModules('links') > 0) || $templateparams->get('collapsable') == 0) {
?>
<div class="col-md-<?php echo $templateparams->get('Lwidth'); ?> links">
	<jdoc:include type="modules" name="links" style="xhtml" />
</div>
<?php } ?>