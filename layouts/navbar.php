<?php defined( '_JEXEC' ) or die; ?>
<nav class="navbar navbar-default <?php if ($templateparams->get('navbarTop') == 1) echo 'navbar-fixed-top';?>" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<?php
					if ($templateparams->get('navbarBrandSoort') == 1) echo $templateparams->get('navbarBrand');
					if ($templateparams->get('navbarBrandSoort') == 2) echo '<img src="'.$templateparams->get('navbarImg').'"/>';
				?>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<jdoc:include type="modules" name="navbarmenu" />
			<jdoc:include type="modules" name="navbarzoek" />
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>