<?php

// Parses text with ANSI control codes and returns HTML
function ansispan($str) {

	// Colors
	$fgColors = array(
		30 => 'black',
		31 => 'red',
		32 => 'green',
		33 => 'yellow',
		34 => 'blue',
		35 => 'magenta',
		36 => 'cyan',
		37 => 'white'
	);
	$bgColors = array(
		40 => 'black',
		41 => 'red',
		42 => 'green',
		43 => 'yellow',
		44 => 'blue',
		45 => 'magenta',
		46 => 'cyan',
		47 => 'white'
	);

	// Replace foreground color codes
	foreach(array_keys($fgColors) as $color) {
		$span = '<span style="color: '.$fgColors[$color].'">';
		
		// 33[Xm == 33[0;Xm sets foreground color to X
		$str = preg_replace("/\x1B33\[".$color.'m/',$span,$str);
		$str = preg_replace("/\x1B33\[0;".$color.'m/',$span,$str);
	}
	
	// Replace background color codes
	foreach(array_keys($fgColors) as $color) {
		$span = '<span style="background-color: '.$fgColors[$color].'">';
		
		// 33[Xm == 33[0;Xm sets background color to X
		$str = preg_replace("/\x1B33\[".$color.'m/',$span,$str);
		$str = preg_replace("/\x1B33\[0;".$color.'m/',$span,$str);
	}
	
	// 33[1m enables bold font, 33[22m disables it
	$str = preg_replace("/\x1B33\[1m/",'<b>',$str);
	$str = preg_replace("/\x1B33\[22m/",'</b>',$str);

	// 33[3m enables italics font, 33[23m disables it
	$str = preg_replace("/\x1B33\[3m/",'<i>',$str);
	$str = preg_replace("/\x1B33\[23m/",'</i>',$str);

	// Catch any remaining close tags
	$str = preg_replace("/\x1B33\[m/",'</span>',$str);
	$str = preg_replace("/\x1B33\[0m/",'</span>',$str);
	
	// Replace "default" codes with closing span
	return preg_replace("/\x1B33\[(39|49)m/",'</span>', $str);
	
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