<?php if (!defined('UC_SYSOP')) die("Direct access denied.<html><head><meta http-equiv='refresh' content='0;url=/'></head><body style='background:#2F4F4F no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;'></body></html>");
?><!DOCTYPE html><html lang="ru"><head><link rel="preconnect" href="$DEFAULTBASEURL"/><link rel="dns-prefetch" href="$DEFAULTBASEURL"/>
<meta charset="utf-8"><meta name="description" content="$SITENAME"><link rel="canonical" href="$DEFAULTBASEURL/index.php"/>
<title><?=$title?></title><?header("Cache-Control: public, max-age=604800, immutable");?><link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon"type="image/x-icon" href="data:image/x-icon"><link rel="stylesheet" href="/themes/HDGray/HDGray.css"/><?=get_head();?><?
if($keywords) echo "<meta name='keywords' content='$keywords'>";if($description) echo "<meta name='description' content='$description'>";?>
<div id="myprofile" style="display:none;position:fixed;margin-top:0;margin-left:450px;border:2px solid #bdbdbd;-moz-border-radius:6px;border-radius:6px;-webkit-border-radius:6px;align:center;text-align:center;background:#008080;box-shadow:1px 1px 5px #5d5d5d;-moz-box-shadow:1px 1px 5px #5d5d5d;-webkit-box-shadow:1px 1px 5px #5d5d5d;">
<?$usernames = iconv('cp1251', 'UTF-8', $CURUSER["username"]);$iduser = $CURUSER["id"];$uped = mksize($CURUSER['uploaded']);$downed = mksize($CURUSER['downloaded']);
if ($CURUSER["downloaded"] > 0){$ratio = $CURUSER['uploaded'] / $CURUSER['downloaded'];$ratio = number_format($ratio, 3);}
elseif($CURUSER["uploaded"] > 0) $ratio = "<img src='pic/captcha_init.gif' alt='Inf.' title='Inf.'/>";
else $ratio = "<img src='pic/captcha_init.gif' alt='Inf.' title='Inf.'/>";
if ($CURUSER['donor'] == "yes") $medaldon = "<img src='pic/star.gif' alt='Донор' title='Донор'/>";
if ($CURUSER['warned'] == "yes") $warn = "<img src='pic/warned.gif' alt='Предупрежден' title='Предупрежден'/>";
$activeseed = $CURUSER["seeder"];$activeleech = $CURUSER["leecher"];
switch ($CURUSER['class']){case '0':$maxtorrents = "1";break;case '1':$maxtorrents = "5";break;case '2':$maxtorrents = "10";break;
case '3':$maxtorrents = "15";break;case '4':$maxtorrents = "25";break;case '5':$maxtorrents = '50';break;case '6':$maxtorrents = 'inf.';break;
case '7':$maxtorrents = 'inf.';break;case '8':$maxtorrents = 'inf.';break;case '9':$maxtorrents = 'inf.';break;case '10':$maxtorrents = 'inf.';
break;case '11':$maxtorrents = 'inf.';}$maxtorrentss = $maxtorrents;$activeleech = $activeleech." / ".$maxtorrentss;$bonuss = $CURUSER["bonus"];
if(get_user_class() >= UC_MODERATOR){$usrclass = "&nbsp;<a href='sclass'><img src='pic/warning.gif' title='Сменить временно КЛАСС' alt='Сменить временно КЛАСС' border='0'/></a>&nbsp;";}
echo "<table cellpadding='0' style='background:none;color:white;' cellspacing='0' valign='top' border='0' width='400px' height='200px' style='border:0;'><tr style='border:0;'><td align='left' width='80%' style='background:none;color:white;border:0;valign:top;'><div style='padding:5px' style='border:0;' valign='top'>".$tracker_lang['welcome_back']."<a href='user_".$CURUSER["id"]."'><b>".get_user_class_color($CURUSER["class"], $usernames)."</b></a>$usrclass$medaldon$warn";
if(get_user_class() >= UC_SYSOP){echo "&nbsp;&nbsp;<a href='staffbox' title='Почта Администрации'\><font color='#D3D3D3'><b>Админ-Бокс</b></font></a>";}
echo "<hr></div></td><td align='right' width='20%' style='border:0;'><div style='padding:5px;border:0;'><a href='javascript://' onclick=\"$('#myprofile').fadeOut('fast');\"><img src='pic/close.png'/></a></div></td></tr>
<tr style='border:0;'><td align='left' width='60%' style='padding-left:4px;padding-bottom:2px;text-align:left;border:0;'>
<div style='padding-left:2px' style='border:0;'><font color='#D3D3D3'><b>ЛС:</b></font>&nbsp;&nbsp;<a href='message' title='ЛС'><img height='16px' style='border:none' alt='ЛС' title='ЛС' src='pic/pn_inbox.gif'/></a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='friends' title='Друзья'><font color='#D3D3D3'><b>Друзья</b></font></a>&nbsp;<img style='border:none;' alt='Друзья' title='Друзья' src='pic/buddylist.gif'/>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='group' title='Релиз-группы'><font color='#D3D3D3'><b>Группы</b></font></a><br>
<br><font color='#D3D3D3'><b>Рейтинг:</b></font>&nbsp;<font color='#FFFFFF'>$ratio</font><br><br><font color='#D3D3D3'><b>Раздал:</b></font>&nbsp;
<font color='#FFFFFF'>$uped</font>&nbsp;&nbsp;<font color='#D3D3D3'><b>Скачал:</b></font>&nbsp;<font color='#FFFFFF'>$downed</font><br><br>
<font color='#D3D3D3'><b>Релизы:</b></font>&nbsp;<font color='#FFFFFF'><span class='smallfont'>$activeseed</span></font><font size='4' color='green' alt='Раздаю' title='Раздаю'>&#9650;</font><font size='4' color='red' alt='Качаю' title='Качаю'>&#9660;</font><font color='#FFFFFF'><span class='smallfont'>$activeleech</span></font><br>
<br><font color='#D3D3D3'><b>Мой Бонус:</b></font>&nbsp;<a href='mybonus' class='online' title='Мой Бонус'><font color='#FFFFFF'>$bonuss</font></a>&nbsp;<img style='border:none;' src='pic/gold.gif'/><br><br>
<a href='usercp' title='Редактировать Профиль'><font color='#D3D3D3'><b>Редактировать Профиль</b></font></a>&nbsp;&nbsp;||&nbsp;&nbsp;
<a href='myrelease' title='Мои Релизы'><font color='#D3D3D3'><b>Мои Релизы</b></font></a><br><br>
<a href='bookmarks' title='Мои Закладки Релизов'><font color='#D3D3D3'><b>Закладки Релизов</b></font></a>&nbsp;||&nbsp;<a href='bookmarks' title='Мои Закладки Multiportal'><font color='#D3D3D3'><b>Закладки Multiportal</b></font></a><br><br></div></td><td align='right' width='40%' style='border:0;'><div class='screenshot'><a href='user_".$CURUSER['id']."'>";
if($CURUSER["avatar"]){echo "<img style='border-radius:5px;border:0;width:100px;' alt='Посмотреть мой профиль' title='Посмотреть мой профиль' align='center' src='".$CURUSER["avatar"]."'/>";}
else{echo "<img style='border-radius:5px;border:0;width:100px;' align='center' alt='Посмотреть мой профиль' title='Посмотреть мой профиль' src='pic/default_avatar.gif'/>";}
echo "</a></div></td></tr></table>";?></div><script src="js/ajax.js"></script><?$datum = getdate();$datum[hours] = sprintf("%02.0f", $datum[hours]);$datum[minutes] = sprintf("%02.0f", $datum[minutes]);
$datum[seconds] = sprintf("%02.0f", $datum[seconds]);$check_mes = "<div id='getNewMes' align='left' style='width:200px;'><font size='-2'>Загрузка...</font></div>";?></head>
<body width="100%"><table style="background:none;cellspacing:0;cellpadding:0;width:100%;">
<tr><td style="background:none;width:100%;border:0;"><table width="100%" class="clear" align="center" border="0" cellspacing="0" cellpadding="0" style="background:transparent;"><tr>
<td class="logo_cellpic"><a href="<?=$DEFAULTBASEURL?>"><img style='margin-left:0px;border:0;' alt="У нас вы найдете только качественные рипы HD-контента" title="У нас вы найдете только качественные рипы HD-контента" src='/themes/HDGray/images/logo_vesna.jpg'/></a></td>
<td class="logo_cellpic"><center><div class="header6"><div class="banka"><a href="UHD" title="UHD 4K релизы"><img src="pic/UHDBanka.jpg" width="468" height="60" border="0" title="UHD 4K релизы" alt="UHD 4K релизы"/></a>
<?if($CURUSER['override_class'] != 255 && $CURUSER){print("<br><br><table align='center' width='98%' cellpadding='0' cellspacing='0' border='0'><center><td style='padding:10px;background:green'><center><b><a href=restoreclass><font color=white>".$tracker_lang['lower_class']."</font></a></b></center></td></center></table>");}
if (get_user_class() >= UC_SYSOP){if($my_siteoff){print("<br><br><table align='center' width='98%' cellpadding='0' cellspacing='0' border='0'><center><td style='padding:10px;background:blue'><center><a href=siteonoff><font color=white>Сайт сейчас отключен !!! Доступ открыт ".$my_siteopenfor.".<br>Для включения сайта и(или) смены класса доступа, кликните здесь!</font></a></center></td></center></table>");}}?>
</div></div></center></td></tr></table></td></tr><tr><td style="background:none;width:100%;text-align:center;border:0;">
<table align="center" style="background:none;cellspacing:0;cellpadding:0;width:98%;"><tr><td style="border-radius:15px;border:none;" class='a'>
<table style="background:none;width:100%;border:0;"><tr><td class="zaliwka" style="color:white;colspan:14;height:30px;font-weight:bold;font-size:14px;border:0;border-radius:5px;">
<table align="center" style="background:none;cellspacing:0;cellpadding:0;width:98%;"><tr>
<td style="background:none;width:100%;text-align:center;font-size:12px;border:0;"><a class="but" title="Home" href="/">Home</a>&nbsp;•&nbsp;<a class="but" href="browse" title="Browse">Browse</a><?if(get_user_class() >= UC_UPLOADER){?>&nbsp;•&nbsp;<a class="but" title="Upload" href="upload">Upload</a><?}?>&nbsp;•&nbsp;<a class="but" title="Requests" href="zakaz.php">Requests</a>&nbsp;•&nbsp;<a class="but" title="Privat Chat" href="chat">Chat</a>&nbsp;•&nbsp;<a class="but" title="Forum" href="forum.php">Forum</a>&nbsp;•&nbsp;<a class="but" title="Rules" href="rules">Rules</a>&nbsp;•&nbsp;<a class="but" title="FAQ" href="faq">FAQ</a>&nbsp;•&nbsp;<a class="but" title="Staff" href="team">Staff</a>&nbsp;•&nbsp;<a class="but" title="Users" href="users">Users</a></td>
<?if(get_user_class() >= UC_SYSOP){?>
<td style="background:none;border:0;"><a alt="AdminPanel" href="admin.php"><img style='margin-top:0;margin-right:10px;' align='right' border='0' src="pic/adcp.png" alt="AdminPanel"/></a></td><?}?>
<td style="background:none;border:0;"><a href="javascript://" onclick="$('#myprofile').fadeIn('fast');" title='Profile' alt='Profile'><img style='margin-top:0;margin-right:10px;' align='right' border='0' src="pic/profs.png" alt="Profile"/></a></td>
<td style="background:none;border:0;"><a alt="Logout" href="logout"><img style='margin-top:0;margin-right:10px;' align='right' border='0' src="pic/logout.png" alt="Logout"/></a></td>
<td style="background:none;border:0;"><a alt="Русский" href="rus"><img style='margin-top:0;margin-right:10px;' align='right' border='0' src="pic/russia.png" alt="RUS"/></a></td>
<td style="background:none;border:0;"><a alt="Украинский" href="ukr"><img style='margin-top:0;margin-right:10px;' align='right' border='0' src="pic/ukr.gif" alt="UA"/></a></td>
<td style="background:none;border:0;"><a alt="English" href="usa"><img style='margin-top:0;margin-right:10px;' align='right' border='0' src="pic/usa.png" alt="ENG"/></a></td>
<td style="background:none;border:0;"><a href="grss" title="RSS"><img style='border:none;margin-top:0;margin-right:10px;' align='right' alt="RSS" title="RSS" src="pic/rssf.png"/></a></td>
<td style="background:none;border:0;"><a href="https://t.me" target="_blank"><img style='margin-top:0;margin-right:0px;' align='right' border='0' alt="Telegram" title="Telegram" src="pic/tlgr.png"/></a>
</td><td style="background:none;width:100%;text-align:right;border:0;float:right;"><form name="srch" method="get" action="browse"><div style="padding-left: 13px;"><div class="inputs">
<div align="center" style="position:relative;"><script src="js/suggest0.js"></script>
<input id="suggestinput0" type="text" style="padding:0px 0px;background-image:none;width:117px ! important;" class="inputs" onblur="if(this.value=='') this.value='torrent search...';" name="search" value="torrent search..." onfocus="if(this.value=='torrent search...') this.value='';"/>
<div style='float:center;' id="suggest0"></div></div></div></div></form></td>
</tr><tr><td align="center" style="background:none;width:100%;float:center;border:0;"></td></tr></table></td></tr></table></td></tr>
<tr><td style="background:none;width:100%;text-align:center;border:0;"><table style="background:none;cellspacing:0;cellpadding:0;width:100%;float:center;"><tr>
<td style="background:#f7f7f7;border-radius:10px;border:none;"><table style="background:none;width:100%;float:center;border:0;"><tr>
<td style="width:98%;text-align:center;border:0;border-radius:10px;background:#ececec;">
<table align="center" style='background:none;border:0;width:100%;cellpadding:4;cellspacing:0;' class="a">
<tr><td align="left" width="560px" style='background:none;border:2px;margin-left:15px;cellspacing:0;'>
<?$usernames = iconv('cp1251', 'UTF-8', $CURUSER["username"]);
///////////////////////////////////////
if($CURUSER["newmess"] == 0){$messagaimg = "<a href='message' title='ЛС'><img height='16px' style='border:none;' alt='ЛС' title='ЛС' src='pic/pn_inbox.gif'/></a>";
$messaga = "";}elseif($CURUSER["newmess"] == 1){
$messaga = "<td class='bottom' align='left'><table align='left' width='200px' cellpadding='0' cellspacing='0' border='0'><td align='left' style='padding:10px;background:darkred;'><center><a href='message'><font color='white'><b>".$CURUSER["newmess"]." новое сообщение!</b></font></a></center></td></table></td>";
$messagaimg = "<a href='message' title='ЛС'><img height='16px' style='border:none' alt='ЛС' title='ЛС' src='pic/pn_inboxnew.gif'/></a>";
}else{$messaga = "<td class='bottom' align='left'><table align='left' width='200px' cellpadding='0' cellspacing='0' border='0'><td align='left' style='padding:10px;background:darkred;'><center><a href='message'><font color='white'><b>".$CURUSER["newmess"]." новых сообщений!</b></font></a></center></td></table></td>";
$messagaimg = "<a href='message' title='ЛС'><img height='16px' style='border:none;' alt='ЛС' title='ЛС' src='pic/pn_inboxnew.gif'/></a>";}
/////////////////////////////
print "<span class='smallfont'>".$tracker_lang['welcome_back']."<a class='users' href='user_".$CURUSER['id']."' onClick='user_".$CURUSER['id']."'><b>".get_user_class_color($CURUSER['class'], $usernames)."</b></a><b>!</b> ".$medaldon.$warn."</span>&nbsp;•&nbsp;<b>".$tracker_lang['bookmarks'].":</b>&nbsp;(<a href='bookmarks' title='".$tracker_lang['bookmarks']." Релизов'>Релизов</a>&nbsp;/&nbsp;<a href='bookmarks_mp' title='".$tracker_lang['bookmarks']." Multiportal'>Multiportal</a>)&nbsp;•&nbsp;<a href='bonuscode' title='Бонусы от System'>Бонусы от System</a><br>
<font color=1900D1>Рейтинг:</font> ".$ratio."&nbsp;•&nbsp;<font color=green>Раздал:</font>&nbsp;<font color='black'>".$uped."</font>&nbsp;•&nbsp;<font color='darkred'>Скачал:</font> <font color='black'>".$downed."</font>&nbsp;•&nbsp;<font color='darkblue'>Бонус:</font> <a href='mybonus' class='online'><font color='black'>".$CURUSER["bonus"]."</font></a>
&nbsp;•&nbsp;<font color='#1900D1'>Торренты:&nbsp;<font color='green'><span class='smallfont'>".$activeseed."</span></font><font size='4' color='green' alt='Раздаю' title='Раздаю'>&#9650;</font><font size='4' color='red' alt='Качаю' title='Качаю'>&#9660;</font><font color='red'><span class='smallfont'>".$activeleech."</span></font>&nbsp;".$messagaimg."&nbsp;<a href='friends' title='Друзья'><img style='border:none' alt='Друзья' title='Друзья' src='pic/frnds.png'/></a>";?>
</td><?global $CacheBlock, $freleechBlock_Refresh;$_cache2 = 'freleech.cache';if(!$CacheBlock->Check($_cache2, $freleechBlock_Refresh?0:360000)){
$res = mysql_query("SELECT freeleech.value FROM freeleech WHERE name = 'freeleech'") or die(mysql_error());$row = mysql_fetch_array($res);$content.= "";switch ($row['value']){case 'no':$frels = "";break;
case 'gold':$frels = "<td class='bottom' align='center' style='background:none;margin-left:0px;padding:0px;border:0px;'><a href='faq#17'><img align='center' src='pic/freedownload.gif' style='border:0pt none;' alt='Сейчас действует Золотой Фрилич' title='Сейчас действует Золотой Фрилич'/></a><b align='left' style='padding:0px;border:0px;'><font color='#d08700'>Золотой Фрилич</font><br><font color='#999966'>Только АПЛОАД !</font></b></td>";break;
case 'brill':$frels = "<td class='bottom' align='center' style='background:none;padding:0px;border:0px;'><a href='faq#17'><img align='center' src='pic/brill.gif' style='border:0pt none;' alt='Сейчас действует Бриллиантовый Фрилич' title='Сейчас действует Бриллиантовый Фрилич'/></a><b align='left' style='padding:0px;border:0px;'><font color='blue'>Бриллиантовый Фрилич</font><br><font color='#999966'>Двойной АПЛОАД !</font></b></td>";break;}
$frelss = $frels;$content.="$frelss";$CacheBlock->Write($_cache2, $content);}else{echo($CacheBlock->Read($_cache2));}?>
<?=$messaga?><td class="bottom" align="center" style='background:none;width:150px;padding:0px;border:0px;'><span class="smallfont"><b>Current time:</b> <span id="clock">Загрузка...</span><br>
<script>function refrClock(){var d=new Date();var s=d.getSeconds();var m=d.getMinutes();var h=d.getHours();var day=d.getDay();var date=d.getDate();var month=d.getMonth();var year=d.getFullYear();var am_pm;if (s<10) {s="0" + s}if (m<10) {m="0" + m}if (h>12){h-=12;am_pm = "<b>PM</b>"}else {am_pm="<b>AM</b>"}if (h<10) {h="0" + h}document.getElementById("clock").innerHTML=h + ":" + m + ":" + s + " " + am_pm;setTimeout("refrClock()",1000);}refrClock();
</script></span></td></tr></table></td></tr><tr><td align="center" style="background:none;width:100%;float:center;border:0;"></td></tr></table></td></tr></table></td></tr>
<tr><td style="width:100%;border:none;"><table class="mainouter" style="width:100%;border:0;margin-top:3px;cellspacing:0;cellpadding:5;"><td valign="top" width="160px">
<?show_blocks("l");?></td><td align="center" width="100%" valign="top" class="outer" style="padding-bottom:5px"><?show_blocks('b');show_blocks('c');?>
