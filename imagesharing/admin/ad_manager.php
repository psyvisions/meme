<? require_once("header.php"); if($auth_gid!="1"){	header("Location: logout.php");	exit;}	$link = mysql_connect($db_server, $db_user, $db_password) or die("Could not connect");	mysql_select_db($db_name) or die("Could not select database");	if($_POST['submit']){	$config = $_POST['config'];                while(list($k,$v)=each($config))                {$k=check_input($k);$v=trim(stripslashes($v));									$sql="UPDATE config SET svalue='".$v."' where soption='".$k."'";															mysql_query($sql)or die("Query failed");                }	}		$query = "SELECT * from config";    $result = mysql_query($query) or die("Query failed");	while ($row = mysql_fetch_assoc($result)) { 							$config[$row['soption']]=$row['svalue'];				}		?><div style="width:760px;"><center><h4> <font face="Comic Sans MS" size="4" color="#FF0000">Ad Manager<br />	</font></h4></center><br /><hr /><br /><div style="height:600px;" align="center"><form name="config" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" style="margin-top: 0px; margin-bottom: 0px;"><div class="config-width">	<div class="config1">Home Left Box:</div>	<div class="config2">		<textarea name="config[homeleft]" rows="10" cols="50"><?=$config[homeleft]?></textarea>	</div>	</div><div class="config-width">	<div class="config1">Header Ad :</div>	<div class="config2">		<textarea name="config[header]" rows="10" cols="50"><?=$config[header]?></textarea>	</div></div><div class="config-width">	<div class="config1">Footer Ad :</div>	<div class="config2">		<textarea name="config[footer]" rows="10" cols="50"><?=$config[footer]?></textarea>	</div></div><div class="config-width">	<div class="config1">&nbsp;</div>	<div class="config2">&nbsp;</div></div>	<div class="config-width">	<div class="config1">&nbsp;</div>	<div class="config2"><input type="submit" name="submit" value="Update"></div></div>	</form><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div><?    mysql_free_result($result);	mysql_close($link);?></div></div><br /><? require_once("footer.php"); ?>