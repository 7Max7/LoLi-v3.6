<?php require_once("include/bittorrent.php");dbconn(true);gzip();if($CURUSER){parked();viped();
if (@ini_get('output_handler') == 'ob_gzhandler' AND @ob_get_length() !== false){
@ob_end_clean();header('Content-Encoding:');}$id = (int) $_GET["id"];
if($CURUSER['warned'] == 'yes' or $CURUSER['banned']  == 'yes'){stderr2("<center>Ошибка!</center>", "<center>Вы лишены права скачивать торренты!</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");} 
if(!is_numeric($id)) stderr2($tracker_lang['error'],"<center>".$tracker_lang['invalid_id']."</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");
if($CURUSER["class"] < UC_1080i){$gigs = $CURUSER["downloaded"] / (1024*1024*1024);
$ratio = (($CURUSER["downloaded"] > 10) ? ($CURUSER["uploaded"] / $CURUSER["downloaded"]) : 0);
if($ratio < 0.5 || $gigs < 11) $wait = 48;elseif($ratio < 0.65 || $gigs < 20) $wait = 24;elseif($ratio < 0.8 || $gigs < 30) $wait = 12;
elseif($ratio < 0.95 || $gigs < 40) $wait = 6;else $wait = 0;}
///////////////////////////////////////////////////////
$antivor = sql_query("SELECT COUNT(torrent) FROM snatched WHERE userid = ".sqlesc($CURUSER["id"])." AND finished = 'no'") or sqlerr(__FILE__, __LINE__);
$antivors = mysql_fetch_array($antivor);$count = $antivors[0];
if(get_user_class() == UC_USER && $count >= 1){stderr2("<center>Ошибка!</center>", "<center>У вас есть <b>$count</b> незавершенных скачек релизов. Личер может докачивать 1 текущий торрент!</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");}
elseif(get_user_class() == UC_720p && $count >= 5){stderr2("<center>Ошибка!</center>", "<center>У вас есть <b>$count</b> незавершенных скачек релизов. Качать можно одновременно до 5 торрентов !</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");}
elseif(get_user_class() == UC_1080i && $count >= 15){stderr2("<center>Ошибка!</center>", "<center>У вас есть <b>$count</b> незавершенных скачек релизов. Качать можно одновременно до 15 торрентов !</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");}
elseif(get_user_class() == UC_1080p && $count >= 25){stderr2("<center>Ошибка!</center>", "<center>У вас есть <b>$count</b> незавершенных скачек релизов. Качать можно одновременно до 25 торрентов !</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");}
elseif(get_user_class() == UC_UHD && $count >= 50){stderr2("<center>Ошибка!</center>", "<center>У вас есть <b>$count</b> незавершенных скачек релизов. Качать можно одновременно до 50 торрентов !</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");}
elseif(get_user_class() == UC_VIPS && $count >= 100){stderr2("<center>Ошибка!</center>", "<center>У вас есть <b>$count</b> незавершенных скачек релизов. Качать можно одновременно до 100 торрентов !</center><html><head><meta http-equiv=refresh content='3;url=/'></head></html>");}
///////////////////////////////////////////////////////
$res = sql_query("SELECT added, multitracker, owner, banned FROM torrents WHERE id = ".sqlesc($id)) or sqlerr(__FILE__, __LINE__);$row = mysql_fetch_assoc($res);
if(!$row) stderr2($tracker_lang['error'], $tracker_lang['invalid_id']);$fn = "torrents/$id.torrent";
if (!is_file($fn) || !is_readable($fn)) stderr2($tracker_lang['error'], $tracker_lang['unable_to_read_torrent']);
if($row['banned'] == 'yes' && $row['owner'] != $CURUSER['id'] && get_user_class() < UC_MODERATOR) stderr2($tracker_lang['error'], 'Упс, а торрентик-то забанен!');
if($wait){$elapsed = floor((gmtime() - strtotime($row["added"])) / 3600);if($elapsed < $wait){$color = dechex(floor(127*($wait - $elapsed)/48 + 128)*65536);
stderr2($tracker_lang['error'], "&nbsp;&nbsp;<nobr><font size=\"1\" color=\"red\">Поднимите рейтинг! Вы можете скачать этот релиз только через</font>
&nbsp;<a href=\"faq#20\"><font color=\"$color\">".number_format($wait - $elapsed)." h</font></a></nobr><br>");}}
sql_query("UPDATE torrents SET hits = hits + 1 WHERE id = ".sqlesc($id));
if(strlen($CURUSER['passkey']) != 32){$CURUSER['passkey'] = md5($CURUSER['username'].get_date_time().$CURUSER['passhash']);
sql_query("UPDATE users SET passkey=".sqlesc($CURUSER[passkey])." WHERE id=".sqlesc($CURUSER[id]));}
$dict = bdecode(file_get_contents($fn));
if(!empty($dict['announce-list'])){
$dict['announce-list'][][0] = $announce_urls[0]."?passkey=$CURUSER[passkey]";
$dict['announce'] = $announce_urls[0]."?passkey=$CURUSER[passkey]";
}else{$dict['announce'] = $announce_urls[0]."?passkey=$CURUSER[passkey]";}
$dict['comment']="$DEFAULTBASEURL/details_$id"; //torrent comment
$dict['value']['source']="$DEFAULTBASEURL/details_$id"; //torrent comment
header ("Expires: Tue, 1 Jan 1980 00:00:00 GMT");
header ("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header ("Cache-Control: no-store, no-cache, must-revalidate");
header ("Cache-Control: post-check=0, pre-check=0", false);
header ("Pragma: no-cache");
header ("X-Powered-by: LoLi");
header ("Accept-Ranges: bytes");
header ("Connection: close");
header ("Content-Transfer-Encoding: binary");
header ("Content-Disposition: attachment; filename=\"$SITENAME"."_$id.torrent\"");
header ("Content-Type: application/x-bittorrent");
ob_implicit_flush(true);
print(BEncode($dict));
$cache = new Memcache();$cache->connect('81.91.178.177', 11211);$cache->delete('user_cache_'.$CURUSER['id']);
}else{?><html><head><meta http-equiv='refresh' content='0;url=/'></head>
<body style="background:#2F4F4F no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;"></body></html><?}?>