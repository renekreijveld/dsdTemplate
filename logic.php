<?php

// This template by DSD business internet | coded by René Kreijveld | r.kreijveld@dsd.nl
defined( '_JEXEC' ) or die;

// Connect with Joomla
$app            = JFactory::getApplication();
$doc            = JFactory::getDocument();
$session        = JFactory::getSession();
$juser          = JFactory::getUser();

// Get variables
$option         = $app->input->getCmd('option', '');
$view           = $app->input->getCmd('view', '');
$layout         = $app->input->getCmd('layout', '');
$task           = $app->input->getCmd('task', '');
$itemid         = $app->input->getCmd('Itemid', '');
$id             = $app->input->getCmd('id', '');
$sitename       = $app->getCfg('sitename');
$menu           = $app->getMenu();
$menu_active    = $menu->getActive();
$frontpage      = ($menu_active == $menu->getDefault() ? true : false);
$templateparams = $app->getTemplate(true)->params;
$templateUrl    = $this->baseurl.'/templates/'.$this->template;
$templateDir    = JPATH_THEMES . '/' . $this->template . '/';
$siteDir        = JPATH_ROOT;
$ualayout       = $session->get('ualayout');
$collapsable    = $templateparams->get('collapsable');
$fluid          = $templateparams->get('fluid');
$sitewidth      = $templateparams->get('sitewidth');

// Get pageclass
$pageclass  = ''; // Custom Pageclass from Menu Advanced Tab
if (is_object($menu_active)) :
	$pageclass  = $menu_active->params->get('pageclass_sfx');
endif;

// Fluid bepalen
$ccextra = "";
if ($fluid == 1) $ccextra = "-fluid";

// Collapsable modules testen
if ($collapsable == 1)
{
	if ($this->countModules('links') && $this->countModules('rechts'))
	{
		$spanContent = "col-md-6";
	}
	elseif ($this->countModules('links') || $this->countModules('rechts'))
	{
		$spanContent = "col-md-9";
	}
	else
	{
		$spanContent = "col-md-12";
	}
}
else
{
	$spanContent = "col-md-6";
}

// Check if user is logged in
$loggedin = ($juser->id > 0 ? true : false);

// Load jQuery?
$loadjquery = ($templateparams->get('loadjquery') == 1 ? true : false);

// Load Boostrap Javascript?
$loadbootstrapjs = ($templateparams->get('loadbootstrapjs') == 1 ? true : false);

// Load ScotchPanel Javascript (offcanvas navigation) ?
$loadscotchpanels = ($templateparams->get('loadscotchpanels') == 1 ? true : false);
$offcanvas = $templateparams->get('offcanvaspos');
if ($offcanvas == 'left') $offcanvasclose = 'right';
if ($offcanvas == 'right') $offcanvasclose = 'left';

// Add debug info?
$debuginfo = ($templateparams->get('debuginfo') == 1 ? true : false);

// Browser info
jimport('joomla.environment.browser');
$browser 		= JBrowser::getInstance();
$browserType 	= $browser->getBrowser();
$browserVersion = $browser->getMajor();

// Automatically compile LESS to CSS using https://github.com/oyejorge/less.php
$cssFile = $templateDir.'css/site.min.css';
$lessFile = $templateDir.'less/site.less';
require_once $templateDir.'lib/less.php/Less.php';
$options = array(
	'compress' => true,
	'cache_dir' => $templateDir . 'cache',
	'sourceMap' => true,
	'sourceMapWriteTo' => $templateDir.'map/site.map',
	'sourceMapURL' => $templateUrl . '/map/site.map'
);
try {
	$parser = new Less_Parser($options);
	$less_files = array($lessFile => $templateUrl . '/less/');
	$css_file_name = Less_Cache::Get($less_files, $options);
} catch(Exception $e){
	$error_message = $e->getMessage();
	print_r('<pre>'.$error_message.'</pre>');
	die();
}

// Set MetaData
$doc->setCharset('utf8');
$doc->setMetaData('X-UA-Compatible', 'IE=edge', true);
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0');
$doc->setMetaData('content-type', 'text/html', true );
$doc->setMetaData('mobile-web-app-capable', 'yes');
$doc->setMetaData('apple-mobile-web-app-capable', 'yes');
$doc->setMetaData('apple-mobile-web-app-status-bar-style', 'black');
$doc->setMetaData('apple-mobile-web-app-title', $sitename);
$doc->setGenerator($sitename);

// Custom Icons
// Generate your icons at https://realfavicongenerator.net
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="180x180" href="' . $templateUrl . '/icons/apple-touch-icon.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="32x32" href="' . $templateUrl . '/icons/favicon-32x32.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="16x16" href="' . $templateUrl . '/icons/favicon-16x16.png">');
$doc->addCustomTag('<link rel="manifest" href="' . $templateUrl . '/icons/manifest.json">');
$doc->addCustomTag('<link rel="mask-icon" href="' . $templateUrl . '/icons/safari-pinned-tab.svg" color="#ffffff">');
$doc->addCustomTag('<link rel="shortcut icon" href="' . $templateUrl . '/icons/favicon.ico">');
$doc->setMetadata('msapplication-config',$templateUrl . '/icons/browserconfig.xml');
$doc->setMetadata('theme-color','#ffffff');
?>