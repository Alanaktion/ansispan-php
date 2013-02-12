<?php

// ansispan
// Parses text with ANSI control codes and returns HTML
function ansispan($str) {

	// Foreground colors
	$fgColors = array(
		'30' => 'black',
		'31' => 'red',
		'32' => 'green',
		'33' => 'yellow',
		'35' => 'purple',
		'36' => 'cyan',
		'37' => 'white'
	);

	// Replace color codes
	foreach(array_keys($fgColors) as $color) {
		$span = '<span style="color: ' + $fgColors[$color] + '">';
		
		// \033[Xm == \033[0;Xm sets foreground color to X.
		$str = preg_replace('/\033\\['.$color.'m/',$span,$str);
		$str = preg_replace('/\033\\[0;'.$color.'m/',$span,$str);		
	}
	
	// \033[1m enables bold font, \033[22m disables it
	$str = preg_replace('/\033\[1m/','<b>',$str);
	$str = preg_replace('/\033\[22m/','</b>',$str);

	// \033[3m enables italics font, \033[23m disables it
	$str = preg_replace('/\033\[3m/','<i>',$str);
	$str = preg_replace('/\033\[23m/','</i>',$str);

	// Catch any remaining close tags
	$str = preg_replace('/\033\[m/','</span>',$str);
	$str = preg_replace('/\033\[0m/','</span>',$str);
	
	return preg_replace('/\033\[39m/', '</span>', $str);
	
}

// mclogparse
// Parses Minecraft log file and returns HTML
/* OLD FUNCTION, HAD WAAAAAAY TOO MANY <SPAN> TAGS
function mclogparse($str) {
	$str = htmlspecialchars($str);
	
	$str = preg_replace("/\\[3([0-9a-f])\;(1m|22m|39m)/",'<span class="c${1}">',$str);
	$str = strtr($str,array(
		'[INFO]' => '[<span class="c7">INFO</span>]',
		'[WARNING]' => '[<span class="c6">WARNING</span>]',
		'[SEVERE]' => '[<span class="cc">SEVERE</span>]'
	));
	$str = str_replace('[0;39m','</span></span></span></span></span>',$str);
	$str = str_replace('[m','</span></span></span></span></span></span></span></span></span></span>',$str);	// I have no idea what I'm doing with this :P
	
	return $str;
}*/

?>