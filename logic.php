<?php
// This template by DSD business internet | coded by René Kreijveld | r.kreijveld@dsd.nu
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
$analytics      = $templateparams->get('analytics');
$collapsable    = $templateparams->get('collapsable');

// Get pageclass
$pageclass  = '';
// Custom Pageclass from Menu Advanced Tab
if (is_object($menu_active)) :
	$pageclass  = $menu_active->params->get('pageclass_sfx');
endif;

// Test for collapsable modules
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

// check if logged in
$loggedin = ($juser->id > 0 ? true : false);

// Browser info
jimport('joomla.environment.browser');
$browser 		= JBrowser::getInstance();
$browserType 	= $browser->getBrowser();
$browserVersion = $browser->getMajor();

// Call JavaScript to be able to unset it :-S
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');

// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/modal.js']);

if (isset($this->_script['text/javascript']))
{
	$this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $this->_script['text/javascript']);
}

// Unset unwanted CSS
$unset_css = array('com_finder');
foreach($this->_styleSheets as $name=>$style)
{
	foreach($unset_css as $css)
	{
		if (strpos($name,$css) !== false)
		{
			unset($this->_styleSheets[$name]);
		}
	}
}

// Add Stylesheets
$cssmode = $templateparams->get('cssmode');
switch($cssmode)
{
	case 'css':
		$doc->addStyleSheet($templateUrl.'/css/site.min.css');
		break;
	case 'codekit':
		$doc->addStyleSheet($templateUrl.'/css/site.css');
		break;
	case 'phpless':
		// Automatically compile LESS using https://github.com/oyejorge/less.php
		$cssFile = $templateDir.'css/site.min.css';
		$lessFile = $templateDir.'less/site.less';
		require_once $templateDir.'lib/less.php/Less.php';
		$options = array(
			'compress' => true,
			'cache_dir' => $templateDir . 'cache'
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
		//$doc->addStyleSheet($templateUrl.'/css/site.min.css');
		break;
}

// Set MetaData
$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($sitename);

// Custom Icons, generate your own icon at http://realfavicongenerator.net
if ($ualayout)
{
	if ($ualayout == "desktop")
	{
		$doc->addFavicon($templateUrl . '/icons/favicon.ico','image/png','shortcut icon');
	}
	else
	{
		$doc->addCustomTag('<link rel="apple-touch-icon" sizes="180x180" href="' . $templateUrl . '/icons/apple-touch-icon.png">');
		$doc->addCustomTag('<link rel="icon" type="image/png" sizes="32x32" href="' . $templateUrl . '/icons/favicon-32x32.png">');
		$doc->addCustomTag('<link rel="icon" type="image/png" sizes="16x16" href="' . $templateUrl . '/icons/favicon-16x16.png">');
		$doc->addCustomTag('<link rel="manifest" href="' . $templateUrl . '/icons/manifest.json">');
		$doc->addCustomTag('<link rel="mask-icon" color="#5bbad5" href="' . $templateUrl . '/icons/safari-pinned-tab.svg">');
		$doc->setMetadata('theme-color','#ffffff');
		$doc->addCustomTag('<meta name="apple-mobile-web-app-title" content="Sitename">');
	}
}
else
{
	$doc->addFavicon($templateUrl . '/icons/favicon.ico','image/png','shortcut icon');
	$doc->addCustomTag('<link rel="apple-touch-icon" sizes="180x180" href="' . $templateUrl . '/icons/apple-touch-icon.png">');
	$doc->addCustomTag('<link rel="icon" type="image/png" sizes="32x32" href="' . $templateUrl . '/icons/favicon-32x32.png">');
	$doc->addCustomTag('<link rel="icon" type="image/png" sizes="16x16" href="' . $templateUrl . '/icons/favicon-16x16.png">');
	$doc->addCustomTag('<link rel="manifest" href="' . $templateUrl . '/icons/manifest.json">');
	$doc->addCustomTag('<link rel="mask-icon" color="#5bbad5" href="' . $templateUrl . '/icons/safari-pinned-tab.svg">');
	$doc->setMetadata('theme-color','#ffffff');
	$doc->addCustomTag('<meta name="apple-mobile-web-app-title" content="Sitename">');
}
?>