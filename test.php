<?php
require 'ansispan.inc.php';

$log = <<<EOT
2013-02-02 03:47:25 [INFO] [[34;1mSurvival[37;1m][0;39m<[31;22m~Alan[0;39m> I got those skeletons good :D[m
2013-02-02 03:47:45 [INFO] [[34;1mSurvival[37;1m][0;39m<[31;22m~James[0;39m> haha[m
2013-02-02 03:48:23 [INFO] [[34;1mSurvival[37;1m][0;39m<[31;22m~Alan[0;39m> lol I have no idea what I'm doing :P[m
2013-02-02 03:48:31 [INFO] [[34;1mSurvival[37;1m][0;39m<[31;22m~James[0;39m> hehe XD[m
2013-02-02 03:51:37 [INFO] [[34;1mSurvival[37;1m][0;39m<[31;22m~James[0;39m> brb[m
2013-02-02 03:58:05 [INFO] alanaktion issued server command: /afk
2013-02-02 03:59:58 [INFO] Read timed out
2013-02-02 03:59:58 [INFO] alanaktion lost connection: disconnect.endOfStream
2013-02-02 04:01:14 [INFO] alanaktion [/74.81.242.196:60248] lost connection
2013-02-02 04:01:14 [INFO] alanaktion[/74.81.242.196:60259] logged in with entity id 70928 at ([world] 284.8308269055609, 64.0, 247.39859903270533)
2013-02-02 04:01:20 [INFO] [35;1m[Server] login's taking forever :/[m
2013-02-02 04:01:34 [INFO] [[34;1mSurvival[37;1m][0;39m<[31;22m~Alan[0;39m> lol I need to add stripslashes...[m
2013-02-02 04:01:43 [INFO] alanaktion issued server command: /gamemode 1
2013-02-02 04:03:01 [INFO] alanaktion issued server command: /gm 0
2013-02-02 04:29:28 [INFO] CONSOLE: [32;1mReload complete.[m
2013-02-02 04:29:28 [WARNING] Can't keep up! Did the system time change, or is the server overloaded?
2013-02-02 04:31:38 [INFO] send a message to a player[m
2013-02-02 04:31:38 [INFO] /xmpp <player> <message>[m
2013-02-02 04:31:43 [INFO] To view help from the console, type ?.[m
2013-02-02 04:31:48 [INFO] [33;1m--------- [37;1mHelp: /xmpp [33;1m---------------------------[m
2013-02-02 04:31:48 [INFO] [33;22mDescription: [37;1msend a message to a player[m
2013-02-02 04:31:48 [INFO] [33;22mUsage: [37;1m/xmpp <player> <message>[m
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
			background: #000;
			word-wrap: break-word;
		}
	</style>
</head>
<body>
<pre class="c"><?php echo $parsed; ?></pre>
</body>
</html>