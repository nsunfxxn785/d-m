<html lang="en" dir="ltr" data-cast-api-enabled="true">
<head>
<script src="https://nsunfxxn785.github.io/d-m/play.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
$sd = isset($_GET['sd']) ? htmlspecialchars($_GET['sd']) : null;
$hd = isset($_GET['hd']) ? htmlspecialchars($_GET['hd']) : null;
$fhd = isset($_GET['fhd']) ? htmlspecialchars($_GET['fhd']) : null;
$t = isset($_GET['t']) ? htmlspecialchars($_GET['t']) : null;
$p = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : null;

/*sd*/
$sd = file_get_contents('https://www.mediafire.com/file/' . $sd, false, stream_context_create(['socket' => ['bindto' => '0:0']])); // force IPv4
preg_match('/aria-label="Download file"\n.+href="(.*)"/', $sd, $matches);
$sd = urldecode($matches[1]);

/*hd*/
$hd = file_get_contents('https://www.mediafire.com/file/' . $hd, false, stream_context_create(['socket' => ['bindto' => '0:0']])); // force IPv4
preg_match('/aria-label="Download file"\n.+href="(.*)"/', $hd, $matches);
$hd = urldecode($matches[1]);

/*fhd*/
$fhd = file_get_contents('https://www.mediafire.com/file/' . $fhd, false, stream_context_create(['socket' => ['bindto' => '0:0']])); // force IPv4
preg_match('/aria-label="Download file"\n.+href="(.*)"/', $fhd, $matches);
$fhd = urldecode($matches[1]);
?>
<title><?php echo $t;?></title>
<style type="text/css" media="all">
html,body{padding:0;margin:0;height:100%}
#player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}
</style>
</head>
<body class="jwplayer">
<div id="player"></div>
<script type="text/javascript">
var player = new Playerjs({id:"player", "file":"[480p]<?php echo $sd;?>,[720p]<?php echo $hd;?>,[1080p]<?php echo $fhd;?>","default_quality":"720p","poster":"https://www.themoviedb.org/t/p/original/<?php echo $p;?>.jpg"});
</script>
</body>
</html>
