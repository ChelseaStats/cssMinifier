<?php
if($variant == 'live'){
?>
<link rel="stylesheet" type="text/css" href="/css/minified.css" />
<?php
	}
	else {
		foreach(
				array(
				    'reset.css',
						'bootstrap.css',
						'slider.css',
						'style.css' )
				as $cssfile)
	  {
?>

	<link rel="stylesheet" type="text/css" href="/css/styler.php?variant=<?php echo $variant; ?>&amp;sheet=<?php echo $cssfile; ?>" />

<?php
	}
	  }
?>
