<?php include dirname(__FILE__)."/data.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $item['lname']." ".$item['fname'];?></title>
	<link type="text/css" rel="stylesheet" href="css/green.css" />
	<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
	<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="js/cufon.yui.js"></script>
	<script type="text/javascript" src="js/Arial_400-Arial_700-Arial_italic_400-Arial_italic_700.font.js.js"></script>
	<script type="text/javascript" src="js/scrollTo.js"></script>
	<script type="text/javascript" src="js/myriad.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript">Cufon.replace('h1,h2', { fontFamily: 'Arial' });</script>
</head>
<body>
<div id="wrapper">
	<div class="wrapper-top"></div>
	<div class="wrapper-mid">
		<div id="paper">
			<div class="paper-top"></div>
			<div id="paper-mid">
<!-- Begin Personal Information -->
				<div class="entry">
					<img class="portrait" src="<?php echo $item['photo'];?>" alt="<?php echo $item['lname']." ".$item['fname'];?>" />
					<div class="self">
						<h1 class="name"><?php echo $item['lname']." ".$item['fname'];?></h1><br />
						<h2 class="name"><?php echo $item['job'];?></h2><br />
						<ul>
							<li class="bd"><?php echo date("d.m.Y", $item['bdate'])." (".$item['age'].")";?></li>
							<li class="ad"><?php echo $item['address'];?></li>
							<li class="mail"><?php echo $item['email'];?></li>
							<li class="tel"><?php echo $item['phone'];?></li>
							<li class="web"><?php echo $item['website'];?></li>
						</ul>
					</div>
					<!-- Begin Social -->
					<div class="social">
						<ul>
							<li><a class='north' href="javascript:window.print()" title="Печать"><img src="images/icn-print.jpg" alt="" /></a></li>
						</ul>
					</div>
					<!-- End Social -->
				</div><!-- End Personal Information -->
<!-- Begin Languages -->
				<div class="entry">
					<h2>ЯЗЫКИ</h2>
					<ul class="info">
<?php
while(list($key,$lang)=@each($item['languages'])) {
	echo "						<li>".$lang['name']." — ".$lang['description']."</li>\n";
	}
?>
					</ul>
				</div><!-- End Languages -->
<!-- Begin Education -->
				<div class="entry">
					<h2>ОБРАЗОВАНИЕ</h2>
<?php
while(list($key,$edu)=@each($item['education'])) {
	echo "					<div class=\"content\">\n";
	echo "						<h3>".$edu['start']." - ".$edu['end']."</h3>\n";
	echo "						<p>".$edu['universe']."<br />\n";
	echo "						<em>".$edu['facultet'].",<br /> ".$edu['specialize'].",<br /> ".$edu['title']."</em></p>\n";
	echo "					</div>\n";
	}
?>
				</div><!-- End Education -->
<!-- Begin Stage -->
				<div class="entry">
				<h2>Опыт работы</h2>
				<em><p><?php echo dateDiff($item['jobdate'], time(), 2); ?></p></em>
<?php
while(list($key,$stage)=@each($item['stage'])) {
	echo "				<div class=\"content\">\n";
	echo "					<h3>".iconv('UTF-8', 'CP1251', strftime("%B %Y", $stage['start']))." — ".
								iconv('UTF-8', 'CP1251', strftime("%B %Y", $stage['end']))."<br />(".
								dateDiff($stage['start'], $stage['end'], 2).")</h3>\n";
	echo "					<p><strong>".$stage['job']."</strong><br />\n";
	echo "					<em>".$stage['organisation']."(".$stage['location'].", <a href=\"http://".$stage['webcite'].
								"\" target=\"blank\">".$stage['webcite']."</a>) — ".$stage['area']."</em></p>\n";
	echo "					<ul class=\"info\">\n";
	while(list($key2,$descr)=@each($stage['description']))
		echo "						<li>".$descr."</li>\n";
	echo "					</ul>\n";
	echo "				</div>\n";
	}
?>
				</div><!-- End Stage -->
<!-- Begin Skills -->
				<div class="entry">
					<h2>НАВЫКИ</h2>
<?php
while(list($key,$skill)=@each($item['skills'])) {
	echo "					<div class=\"content\">\n";
	echo "						<h3>".$skill['title']."</h3>\n";
	echo "						<ul class=\"skills\">\n";
	while(list($key2,$sitem)=@each($skill['items']))
		echo "							<li>".$sitem."</li>\n";
	echo "						</ul>\n";
	echo "					</div>\n";
	}
?>
				</div><!-- End Skills -->
<!-- Begin Projects -->
				<div class="entry">
					<h2>Проекты</h2>
					<ul class="works">
<?php
while(list($key,$project)=@each($item['projects']))
	if($project['state']=="active")
		echo "						<li><a href=\"http://".$project['url']."\" title=\"".$project['title'].
			"\"><img src=\"".$project['preview']."\" alt=\"\"/></a></li>\n";
?>
					</ul>
				</div><!-- Begin Projects -->
			</div>
			<div class="clear"></div>
			<div class="paper-bottom"></div>
		</div>
	</div>
	<div class="wrapper-bottom"></div>
</div>
<div id="message"><a href="#top" id="top-link">На верх</a></div>
</body>
</html>