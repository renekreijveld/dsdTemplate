<?php
// Template by Perfect Web Team // www.perfectwebteam.nl //
defined('_JEXEC') or die;

// Connect with Joomla
$app 			= JFactory::getApplication();
$doc 			= JFactory::getDocument();
$uri 			= JFactory::getURI();

// Variables
$option   	 	= $app->input->getCmd('option', '');
$view     		= $app->input->getCmd('view', '');
$layout   		= $app->input->getCmd('layout', '');
$task     		= $app->input->getCmd('task', '');
$itemid   		= $app->input->getCmd('Itemid', '');
$id				= $app->input->getCmd('id', '');
$sitename 		= $app->getCfg('sitename');
$menu 			= $app->getMenu();
$menu_active 	= $menu->getActive();
$frontpage 		= ($menu_active == $menu->getDefault() ? true : false);
$page_url 		= $uri->toString();

// Browser info
jimport('joomla.environment.browser');
$browser 		= JBrowser::getInstance();
$browserType 	= $browser->getBrowser();
$browserVersion = $browser->getMajor();

// Add Javascripts
$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.min.js', 'text/javascript');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Remove unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);
if (isset($this->_script['text/javascript'])) {
	$this->_script['text/javascript'] = preg_replace('%window\.addEvent\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace('%window\.addEvent\(\'domready\',\s*function\(\)\s*{\s*\$\$\(\'.hasTip\'\).each\(function\(el\)\s*{\s*var\s*title\s*=\s*el.get\(\'title\'\);\s*if\s*\(title\)\s*{\s*var\s*parts\s*=\s*title.split\(\'::\',\s*2\);\s*el.store\(\'tip:title\',\s*parts\[0\]\);\s*el.store\(\'tip:text\',\s*parts\[1\]\);\s*}\s*}\);\s*var\s*JTooltips\s*=\s*new\s*Tips\(\$\$\(\'.hasTip\'\),\s*{\s*maxTitleChars:\s*50,\s*fixed:\s*false}\);\s*}\);\s*%', '', $this->_script['text/javascript']);
	if (empty($this->_script['text/javascript'])) {
		unset($this->_script['text/javascript']);
	}
}

// Remove Unwanted CSS
$unset_css = array('com_one','com_two');
foreach($this->_styleSheets as $name=>$style) {
	foreach($unset_css as $css) {
		if (strpos($name,$css) !== false) {
			unset($this->_styleSheets[$name]);
		}
	}
}

// Set MetaData
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($sitename);

// Custom Icons
$doc->addFavicon($this->baseurl . '/templates/' . $this->template . '/favicon.png','image/png','shortcut icon');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="57x57" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-57x57.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="60x60" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-60x60.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="72x72" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-72x72.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="76x76" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-76x76.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="114x114" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-114x114.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="144x144" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-144x144.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="120x120" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-120x120.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="152x152" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-152x152.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="180x180" href="' . $this->baseurl . '/templates/' . $this->template . '/images/icons/apple-touch-icon-180x180.png">');