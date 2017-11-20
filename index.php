<?php
defined( '_JEXEC' ) or die; 

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

include_once JPATH_THEMES.'/'.$this->template.'/logic.php';

// Declare the template as HTML5
$this->setHtml5(true);

// Load template CSS
$this->addStyleSheet($templateUrl . '/cache/' . $css_file_name);

// Load jQuery
if ($loadjquery)
{
	HTMLHelper::_('script', 'jquery-2.2.4.min.js', ['version' => 'auto', 'relative' => true, 'detectDebug' => (bool) JDEBUG], []);
	HTMLHelper::_('script', 'jquery-noconflict.js', ['version' => 'auto', 'relative' => true, 'detectDebug' => (bool) JDEBUG], []);
	HTMLHelper::_('script', 'jquery-migrate-1.4.1.min.js', ['version' => 'auto', 'relative' => true, 'detectDebug' => (bool) JDEBUG], []);
}

// Load Bootstrap 3 javascript
if ($loadbootstrapjs) HTMLHelper::_('script', 'bootstrap-3.3.6.min.js', ['version' => 'auto', 'relative' => true, 'detectDebug' => (bool) JDEBUG], []);

// Load scotchPanels javascript for Offcanvas navigation.
// Publish your offcancas menu in the offcanvas module position.
if ($loadscotchpanels) HTMLHelper::_('script', 'scotchPanels.min.js', ['version' => 'auto', 'relative' => true, 'detectDebug' => (bool) JDEBUG], []);

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="modules" name="headstart" />
	<jdoc:include type="head" />
	<jdoc:include type="modules" name="headfinish" />
	<?php if ($fluid == 1): ?>
	<style>.container-fluid{max-width:<?php echo $sitewidth;?>;margin:0 auto;}</style>
	<?php endif; ?>
</head>
<body class="<?php if ($frontpage) {echo 'frontpage';} else {echo 'next';} if ($pageclass) echo ' '.$pageclass; ?>" role="document">
	<?php if ($debuginfo): ?>
	<!-- Option: <?php echo $option;?> -->
	<!-- View: <?php echo $view;?> -->
	<!-- Layout: <?php echo $layout;?> -->
	<!-- Task: <?php echo $task;?> -->
	<!-- UALayout: <?php echo $ualayout;?> -->
	<!-- Juser: <?php echo $juser->id . ' ' . $juser->username;?> --> ?>
	<!-- Browser type: <?php echo $browserType;?> -->
	<!-- Browser version: <?php echo $browserVersion;?> -->
	<?php endif; ?>
	<jdoc:include type="modules" name="bodystart" />
	<div class="container<?php echo $ccextra;?>">
		<div class="row">
			<?php if ($loadscotchpanels): ?>
			<?php if ($offcanvas == 'left'): ?>
			<div class="col-xs-1">
				<p><a class="toggle-panel"><i class="fa fa-bars" aria-hidden="true"></i></a></p>
			</div>
			<div class="col-xs-11">
				<jdoc:include type="modules" name="menu" />
			</div>
			<?php endif; ?>
			<?php if ($offcanvas == 'right'): ?>
			<div class="col-xs-11">
				<jdoc:include type="modules" name="menu" />
			</div>
			<div class="col-xs-1">
				<p><a class="toggle-panel"><i class="fa fa-bars" aria-hidden="true"></i></a></p>
			</div>
			<?php endif; ?>
			<?php else: ?>
			<div class="col-md-12">
				<jdoc:include type="modules" name="menu" />
			</div>
			<?php endif; ?>
		</div>
		<div class="row">
			<?php if ($this->countModules('links') || $collapsable == 0): ?>
			<div class="col-md-3">
				<jdoc:include type="modules" name="links" style="xhtml" />
			</div>
			<?php endif; ?>
			<div class="<?php echo $spanContent; ?>">
				<jdoc:include type="modules" name="contentstart" />
				<?php if (count(JFactory::getApplication()->getMessageQueue())): ?>
				<jdoc:include type="message"/>
				<?php endif; ?>
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="contentfinish" />
				<p>Browser type: <?php echo $browserType;?><br/>
				Browser version: <?php echo $browserVersion;?></p>
			</div>
			<?php if ($this->countModules('rechts') || $collapsable == 0): ?>
			<div class="col-md-3">
				<jdoc:include type="modules" name="rechts" style="xhtml" />
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if ($loadscotchpanels): ?>
	<div id="offcanvas">
		<p style="text-align: <?php echo $offcanvasclose;?>"><a class="toggle-panel"><i class="fa fa-window-close" aria-hidden="true"></i></a></p>
		<jdoc:include type="modules" name="offcanvas" />
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		var panelExample = $('#offcanvas').scotchPanel({
		    containerSelector: 'body', // Make this appear on the entire screen
		    direction: '<?php echo $offcanvas;?>', // Make it toggle in from left or right
    		duration: 300, // Speed in ms how fast you want it to be
		    transition: 'ease', // CSS3 transition type: linear, ease, ease-in, ease-out, ease-in-out, cubic-bezier(P1x,P1y,P2x,P2y)
    		clickSelector: '.toggle-panel', // Enables toggling when clicking elements of this class
		    distanceX: '320px', // Size fo the toggle
    		enableEscapeKey: true // Clicking Esc will close the panel
		});
	});
	</script>
	<?php endif; ?>
	<jdoc:include type="modules" name="debug" />
	<jdoc:include type="modules" name="bodyfinish" />
</body>
</html>