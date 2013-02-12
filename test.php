<?php
require 'ansispan.inc.php';

$log = <<<'EOT'
33[0;32mhello world33[39m
EOT;

$parsed = ansispan($log);

?><!DOCTYPE html>
<html>
<head>
	<title>ANSI-to-&lt;span&gt; Test</title>
	<style type="text/css">
		pre {
			padding: 5px;
			border-radius: 4px;
			color: #fff;
			background: #000;
			word-wrap: break-word;
		}
	</style>
</head>
<body>
<pre class="c"><?php echo $parsed; ?></pre>
</body>
</html>