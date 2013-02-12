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

?>