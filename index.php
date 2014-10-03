<?php defined( '_JEXEC' ) or die; ?><!doctype html>

<html lang="<?php echo $this->language; ?>">

<?php include_once JPATH_THEMES.'/'.$this->template.'/parameters.php'; ?>

<head>
	<jdoc:include type="modules" name="headstart" />
	<jdoc:include type="head" />
	<jdoc:include type="modules" name="headfinish" />
</head>

<body class="<?php if ($frontpage) {echo 'frontpage';} else {echo 'next';} echo ' '.$menu_active->alias.' '.$pageclass; ?>" role="document">
	<jdoc:include type="modules" name="bodystart" />
	<?php if ($templateparams->get('navbar') == 1) {
		include JPATH_THEMES.'/'.$this->template.'/layouts/navbar.php';
	} ?>
	<div class="container<?php echo ($templateparams->get('fluidContainer') ? '-fluid' : ''); ?>">
		<?php
		// Part1
		if ($templateparams->get('part1') != 'no') {
			echo '<div class="row '.$templateparams->get('part1').'">';
			include JPATH_THEMES.'/'.$this->template.'/layouts/'.$templateparams->get('part1').'.php';
			echo '</div>';
		}
		// Part2
		if ($templateparams->get('part2') != 'no') {
			echo '<div class="row '.$templateparams->get('part2').'">';
			include JPATH_THEMES.'/'.$this->template.'/layouts/'.$templateparams->get('part2').'.php';
			echo '</div>';
		}
		// Part3
		if ($templateparams->get('part3') != 'no') {
			echo '<div class="row '.$templateparams->get('part3').'">';
			include JPATH_THEMES.'/'.$this->template.'/layouts/'.$templateparams->get('part3').'.php';
			echo '</div>';
		}
		// Part4
		if ($templateparams->get('part4') != 'no') {
			echo '<div class="row '.$templateparams->get('part4').'">';
			include JPATH_THEMES.'/'.$this->template.'/layouts/'.$templateparams->get('part4').'.php';
			echo '</div>';
		}
		// Part5
		if ($templateparams->get('part5') != 'no') {
			echo '<div class="row '.$templateparams->get('part5').'">';
			include JPATH_THEMES.'/'.$this->template.'/layouts/'.$templateparams->get('part5').'.php';
			echo '</div>';
		}
		// Part6
		if ($templateparams->get('part6') != 'no') {
			echo '<div class="row '.$templateparams->get('part6').'">';
			include JPATH_THEMES.'/'.$this->template.'/layouts/'.$templateparams->get('part6').'.php';
			echo '</div>';
		}
		?>
	</div>
	<jdoc:include type="modules" name="debug" />
	<jdoc:include type="modules" name="bodyfinish" />
</body>

</html>