<?php

header('Content-type: text/css');

$variant = $_REQUEST['variant'];

$sheet = "ALL";

if(isset($_REQUEST['sheet']) && $_REQUEST['sheet'] != ''){

	$sheet = $_REQUEST['sheet'];

}

// use these presets in your style sheet for a simple preprocessor type thing
$presets = array(

	'$preset' => "/* A preset! */",
	'$veryLightGrey' => "rgb(235, 235, 235)",
	'$lightGrey' => "rgb(230, 230, 230)",
	'$mediumGrey' => "rgb(200, 200, 200)",
	'$lessDarkGrey' => "rgb(150, 150, 150)",
	'$darkGrey' => "rgb(100, 100, 100)",
	'$veryDarkGrey' => "rgb(75, 75, 75)",
	'$lighterBlueLink' => "rgb(92, 106, 232)",
	'$darkBlue' => "rgb(53, 83, 128)",
	'$mediumBlue' => "rgb(103, 133, 178)",
	'$lightBlue' => "rgb(240, 240, 255)",
	'$veryDark' => 'rgb(53, 83, 128)',
	'$lightest' => "rgb(250, 250, 250)",
	'$light' => "rgb(230, 230, 230)",
	'$dark' => "rgb(100, 100, 100)",
	'$sfrBlue' => "rgb(0, 52, 102)",
	'../../globals/images' => "../images"

);

$cssStr = "/* css file generated " . date('r') . "*/
";

//foreach file
foreach(

		array( 'reset.css','bootstrap.css','slider.css','style.css','print.css')
as $cssfile){

	if($sheet == 'ALL' || $sheet == $cssfile){

		//load it
		$tmp = file_get_contents($cssfile);

		//sub out any presets
		foreach($presets as $key => $value){

			$tmp = str_ireplace($key, $value, $tmp);

		}

		//add to string
		$cssStr .= $tmp . "
	";

	}

}

if($variant = 'dev'){

	//echo out the string - not minified for dev, as we may want to look at it
	echo $cssStr;

}

if($sheet == 'ALL'){

	//and save the file if we've processed all of them (note that both these files need to be editable by the IUSR)
	@file_put_contents('to_minify.css', $cssStr);
	
	/*
	$arr = array();
	$str = exec("updateMinifiedCss.cmd", $arr, $retVar);
	mail("email@domain.tld", "dbg", $str . "\n" . print_r($arr, true) . "\n" . print_r($retVar, true));
    */
}

?>
