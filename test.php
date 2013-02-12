<?php
require 'ansispan.inc.php';

$log = <<<'EOT'
33[0;32mhello world33[39m
EOT;

/*
[[34;1mSurvival[37;1m][0;39m<[31;22m~Alan[0;39m> I got those skeletons good :D[m
[[34;1mSurvival[37;1m][0;39m<[31;22m~James[0;39m> haha[m
[[34;1mSurvival[37;1m][0;39m<[31;22m~Alan[0;39m> lol I have no idea what I'm doing :P[m
[[34;1mSurvival[37;1m][0;39m<[31;22m~James[0;39m> hehe XD[m
[[34;1mSurvival[37;1m][0;39m<[31;22m~James[0;39m> brb[m
[35;1m[Server] login's taking forever :/[m
[[34;1mSurvival[37;1m][0;39m<[31;22m~Alan[0;39m> lol I need to add stripslashes...[m
CONSOLE: [32;1mReload complete.[m
send a message to a player[m
/xmpp <player> <message>[m
To view help from the console, type ?.[m
[33;1m--------- [37;1mHelp: /xmpp [33;1m---------------------------[m
[33;22mDescription: [37;1msend a message to a player[m
[33;22mUsage: [37;1m/xmpp <player> <message>[m
*/

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