<?php defined( '_JEXEC' ) or die;
if($templateparams->get('templateLayout') == "LCR") {
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/links.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/component.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/rechts.php';
}
if($templateparams->get('templateLayout') == "CLR") {
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/component.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/links.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/rechts.php';
}
if($templateparams->get('templateLayout') == "LRC") {
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/links.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/rechts.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/component.php';
}
if($templateparams->get('templateLayout') == "LC") {
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/links.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/component.php';
}
if($templateparams->get('templateLayout') == "CR") {
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/component.php';
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/rechts.php';
}
if($templateparams->get('templateLayout') == "C") {
	include JPATH_THEMES.'/'.$this->template.'/layouts/parts/component.php';
}
?>
