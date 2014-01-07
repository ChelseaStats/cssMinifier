<?php

foreach(
		array(  
		    'reset.css',
				'bootstrap.css',
				'slider.css',
				'style.css' )
		as $cssfile){
?>

<link rel="stylesheet" type="text/css" href="/css/styler.php?variant=<?php echo $variant; ?>&amp;sheet=<?php echo $cssfile; ?>" />
		<?php
		}
	}else{
		?>
<link rel="stylesheet" type="text/css" href="/css/css_wrapper.php?variant=<?php echo $variant; ?>" />
		<?php
	}
}
?>
