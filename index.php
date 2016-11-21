<?php defined( '_JEXEC' ) or die; ?>
<?php include_once JPATH_THEMES.'/'.$this->template.'/logic.php'; ?>
<!doctype html>
<html lang="<?php echo $this->language; ?>">
<head>
	<jdoc:include type="modules" name="headstart" />
	<link rel="stylesheet" href="<?php echo $templateUrl . '/cache/' . $css_file_name;?>" type="text/css" />
	<script src="<?php echo $templateUrl;?>/js/site.min.js" type="text/javascript"></script>
	<jdoc:include type="head" />
	<jdoc:include type="modules" name="headfinish" />
	<!-- Option: <?php echo $ualayout;?> -->
</head>
<body class="<?php if ($frontpage) {echo 'frontpage';} else {echo 'next';} if ($pageclass) echo ' '.$pageclass; ?>" role="document">
	<?php if($analytics): ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', '<?php echo $analytics;?>', 'auto');
	  ga('send', 'pageview');
	</script>
	<?php endif; ?>
	<jdoc:include type="modules" name="bodystart" />
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<jdoc:include type="modules" name="menu" />
			</div>
		</div>
		<div class="row">
			<?php if ($this->countModules('links') || $collapsable == 0) : ?>
			<div class="col-md-3">
				<jdoc:include type="modules" name="links" style="xhtml" />
			</div>
			<?php endif; ?>
			<div class="<?php echo $spanContent; ?>">
				<jdoc:include type="modules" name="contentstart" />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="contentfinish" />
			</div>
			<?php if ($this->countModules('rechts') || $collapsable == 0) : ?>
			<div class="col-md-3">
				<jdoc:include type="modules" name="rechts" style="xhtml" />
			</div>
			<?php endif; ?>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" />
	<jdoc:include type="modules" name="bodyfinish" />
</body>
</html>