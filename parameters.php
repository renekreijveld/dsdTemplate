<?php
// This template by DSD business internet | coded by René Kreijveld | r.kreijveld@gakijken.nl
defined( '_JEXEC' ) or die;

// connect with Joomla
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$juser = JFactory::getUser();

// joomla variables
$templateUrl = $this->baseurl.'/templates/'.$this->template;
$templateDir = JPATH_SITE.'/templates/'.$this->template.'/';
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$id = $app->input->getCmd('id', '');
$sitename = $app->getCfg('sitename');
$menu = $app->getMenu();
$menu_active = $app->getMenu()->getActive();
$contentparams = $app->getParams();
$templateparams = $app->getTemplate(true)->params;
$pageclass = $contentparams->get('pageclass_sfx');

// check if on home
$frontpage = ($menu_active == $menu->getDefault() ? true : false);

// check if logged in
$loggedin = ($juser->id > 0 ? true : false);

// Add Javascripts
if ($templateparams->get('jquery') == 1 && $templateparams->get('bootstrapjs') == 1) {
	$doc->addScript($templateUrl.'/js/template.bootstrap.min.js');	
}
if ($templateparams->get('jquery') == 1 && $templateparams->get('bootstrapjs') == 0) {
	$doc->addScript($templateUrl.'/js/template.min.js');	
}

// Add Stylesheets
$cssmode = $templateparams->get('cssmode');
switch($cssmode)
{
	case 'fofless':
		// Automatically compile LESS using FOF
		jimport('fof.include');
		FOFTemplateUtils::addLESS('template://templates/'.$this->template.'/less/template.less');
		break;
	case 'lessphp':
		// Automatically compile LESS using http://leafo.net/lessphp
		require_once $templateDir.'lib/lessc.inc.php';
		$less = new lessc;
		$less->checkedCompile($templateDir.'less/template.less', $templateDir.'less/compiled.css');
		$doc->addStyleSheet($templateUrl.'/css/compiled.css');
		break;
	case 'phpless':
		// Automatically compile LESS using https://github.com/oyejorge/less.php
		$cssFile = $templateDir.'css/template.compiled.css';
		$lessFile = $templateDir.'less/template.less';
		if(filemtime($lessFile) > filemtime($cssFile)) {
			require_once $templateDir.'lib/oyejorge/less.php/lessc.inc.php';
			$options = array( 'compress'=>true );
			$parser = new Less_Parser( $options );
			$parser->parseFile($lessFile, JURI::root());
			$css = $parser->getCss();
			file_put_contents($cssFile, $css);
		}
		$doc->addStyleSheet($templateUrl.'/css/template.compiled.css');
		break;
	case 'css':
		$doc->addStyleSheet($templateUrl.'/css/template.css');
		break;
	default:
		$doc->addStyleSheet($templateUrl.'/css/template.css');
}

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
unset($this->_scripts[$this->baseurl .'/components/com_rsform/assets/js/script.js']);
if (isset($this->_script['text/javascript'])) {
	$this->_script['text/javascript'] = preg_replace('%window\.addEvent\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace('%jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\(\'\.hasTooltip\'\)\.tooltip\(\{\"html\"\:\s*true\,\"container\"\:\s*\"body\"\}\);\s*\}\);\s*%', '', $this->_script['text/javascript']);
	$this->_script['text/javascript'] = preg_replace('%window\.addEvent\(\'domready\',\s*function\(\)\s*{\s*\$\$\(\'.hasTip\'\).each\(function\(el\)\s*{\s*var\s*title\s*=\s*el.get\(\'title\'\);\s*if\s*\(title\)\s*{\s*var\s*parts\s*=\s*title.split\(\'::\',\s*2\);\s*el.store\(\'tip:title\',\s*parts\[0\]\);\s*el.store\(\'tip:text\',\s*parts\[1\]\);\s*}\s*}\);\s*var\s*JTooltips\s*=\s*new\s*Tips\(\$\$\(\'.hasTip\'\),\s*{\s*maxTitleChars:\s*50,\s*fixed:\s*false}\);\s*}\);\s*%', '', $this->_script['text/javascript']);
	if (empty($this->_script['text/javascript'])) {
		unset($this->_script['text/javascript']);
	}
}

// Remove Unwanted CSS
$unset_css = array('com_rsform','com_two');
foreach($this->_styleSheets as $name=>$style) {
	foreach($unset_css as $css) {
		if (strpos($name,$css) !== false) {
			unset($this->_styleSheets[$name]);
		}
	}
}

// Set MetaData
$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($sitename);

// Custom Icons
$doc->addFavicon($templateUrl . '/favicon.png','image/png','shortcut icon');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="57x57" href="' . $templateUrl . '/icons/apple-touch-icon-57x57.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="60x60" href="' . $templateUrl . '/icons/apple-touch-icon-60x60.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="72x72" href="' . $templateUrl . '/icons/apple-touch-icon-72x72.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="76x76" href="' . $templateUrl . '/icons/apple-touch-icon-76x76.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="114x114" href="' . $templateUrl . '/icons/apple-touch-icon-114x114.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="120x120" href="' . $templateUrl . '/icons/apple-touch-icon-120x120.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="144x144" href="' . $templateUrl . '/icons/apple-touch-icon-144x144.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="152x152" href="' . $templateUrl . '/icons/apple-touch-icon-152x152.png">');
$doc->addCustomTag('<link rel="apple-touch-icon" sizes="180x180" href="' . $templateUrl . '/icons/apple-touch-icon-180x180.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="16x16" href="' . $templateUrl . '/icons/favicon-16x16.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="32x32" href="' . $templateUrl . '/icons/favicon-32x32.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="96x96" href="' . $templateUrl . '/icons/favicon-96x96.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="160x160" href="' . $templateUrl . '/icons/favicon-160x160.png">');
$doc->addCustomTag('<link rel="icon" type="image/png" sizes="196x196" href="' . $templateUrl . '/icons/favicon-196x196.png">');
?>