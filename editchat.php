<?php require_once("include/bittorrent.php");dbconn(true);gzip();if($CURUSER && get_user_class() >= UC_MODERATOR){
$action = (string) $_GET['action'];if(!$action){$action = (string) $_POST['action'];if(!$action){?><script>setTimeout(function(){window.close()}, 500);</script><?}}
if($action == "editchat"){?><html lang="ru"><head><title>Отредактировать сообщение Приват-чата</title><style>
nav{display:block}ul{list-style:none}.container{margin:10px auto;width:480px;text-align:center}.container.nav{display:inline-block;text-align:center}.nav{padding:4px;background:rgba(0,0,0,0.04);border-radius:23px;-webkit-box-shadow:inset 0 1px rgba(0,0,0,0.08),0 -1px rgba(0,0,0,0.3),0 1px rgba(255,255,255,0.12);box-shadow:inset 0 1px rgba(0,0,0,0.08),0 -1px rgba(0,0,0,0.3),0 1px rgba(255,255,255,0.12)}.nav-list{padding:0 6px;height:34px;background:#f4f5f7;border-radius:18px;background-image:-webkit-linear-gradient(top,white,#e1e2eb);background-image:-moz-linear-gradient(top,white,#e1e2eb);background-image:-o-linear-gradient(top,white,#e1e2eb);background-image:linear-gradient(to bottom,white,#e1e2eb);-webkit-box-shadow:inset 0 0 0 1px rgba(255,255,255,0.3),0 1px 1px rgba(0,0,0,0.2);box-shadow:inset 0 0 0 1px rgba(255,255,255,0.3),0 1px 1px rgba(0,0,0,0.2)}.nav-list>li{float:left;height:17px;margin:8px 0}.nav-list>li+li{border-left:1px dotted #989ca8}.nav-link{float:left;position:relative;margin-top:-8px;padding:0 14px;line-height:34px;font-size:10px;font-weight:700;color:#555;text-decoration:none;text-shadow:0 1px #fff}.nav-link:hover{color:#333;text-decoration:underline}div#menu{height:40px;left:50%;margin-left:-300px;position:relative;top:0;width:600px}input.common{border:1px solid #CECECE;background-color:#F2F2F2}input.valid{border:1px solid #B3D577;background-color:#E0F5BD}input.error{border:1px solid #DB8180;background-color:#F7C7C7}input.important{border:1px solid #DCCB61;background-color:#F8EEB9}.bmark{text-align:center;white-space:nowrap}.bookmarked{background:#FF9}body{font-family:"tahoma";font-size:8pt;color:#306A82;background:#e5e5e5 repeat-y top;width:100%;margin:0 5px}td.null{background:#FAFAFA;color:#000;border:0;font-family:tahoma;font-size:11px;padding:0}#frame{width:100%;margin:0;padding:0;vertical-align:middle;border:0;height:15px}#cright{width:auto;padding:0;text-align:left;float:right}#cleft{width:60%;color:#afafaf;font-family:tahoma;font-size:11px;font-weight:700;margin:0;margin-top:3px;padding:2px;letter-spacing:0;text-align:left;float:left}.spoiler_head{color:#2A2A2A;font-weight:700;border:1px solid #C3CBD1;border-left:3px solid #C3CBD1;padding:3px;background:#E9E9E6;cursor:pointer}.spoiler_body{border:1px solid #C3CBD1;border-left:3px solid #C3CBD1;border-top:none;padding:3px;background:#F5F5F5}.layer{overflow:auto;height:450px;padding:5px}.spoiler-wrap{width:95%;margin:6px auto;clear:both;background:#E9E9E6;border:solid #C3CBD1;border-width:1px 1px 1px 2px;background-color:#f6f6f6}.clickable{cursor:pointer}.folded{background:transparent url(images/icon_plus.gif) no-repeat left center;padding-left:14px}.unfolded{background:transparent url(images/icon_minus.gif) no-repeat left center;padding-left:14px}.linked-image{margin:0;padding:0;border:0}.resized-linked-image{margin:1px 0 0;padding:0;background-color:#000;border:0;color:#FFF;font-size:10px;width:auto;-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px}.resized-linked-image-zoom{width:200px;height:30px;background-color:#FFF;padding-top:6px;padding-left:5px;top:0;left:0;position:absolute;display:none}#highlighted{background-color:#FAFAFA}#highlighted tr:hover{background-color:#f1f1f1}#tooltip{background-color:#E9EFF5;border:2px solid #6AA6CC;color:#0E3A63;font:menu;margin:0;padding:3px 5px;position:absolute}.header6{float:right;padding:2px 2px 0 0}.header6 .banka{background:url(images/header_banka.png) no-repeat 0 0;width:468px;height:60px;padding:7px 66px 34px 7px}.header6 .banka img{width:468px;height:60px}.header6 a.buy_adv{display:block;background:url(images/header_banka.png) no-repeat 0 -106px;width:161px;height:28px;margin:-10px 50px 0 0;line-height:22px;text-align:center;font-family:Tahoma;font-size:11px;font-weight:700;color:#53c5f6;text-shadow:1px 1px 0 #294b58;text-decoration:none}.header6 a:hover.buy_adv{opacity:.8;-moz-opacity:.8;filter:alpha(opacity=80)}.error{color:#900;background-color:#FFF0F0;padding:7px;border:1px dashed #900;margin:5px}.error b{color:#900;background:inherit}.success{color:#000;background:#F5FBE1;padding:7px;margin:5px;border:1px dashed #7BA813}.success b{color:#7BA813;background:inherit}.editor{margin:0 0 1px;width:485px;height:21px;border:1px #D1D8EC solid}.editorinput{background:#FAFAFA;color:#000;border:1px #D1D8EC solid;font-size:11px;font-family:Verdana,Helvetica;text-decoration:none}.editorbutton{float:left;cursor:pointer;padding:2px 1px 0 5px}code{background:none;color:#00F;font-size:11px;font-family:Verdana,Helvetica}.code{color:#00B;font-size:11px;font-family:Verdana,Helvetica}a.copyright:link,a.copyright:visited,a.copyright:active{text-decoration:none;color:#FFF;border-top:dashed 1px #5087AD;padding:0}td.pager{background-color:#EFEFEF;border:0;padding:2px}td.pagebr{background-color:#EFEFEF;border:0;padding:0}td.highlight{background-color:#EFEFEF;border-bottom:1px dotted #3782B7;padding:2px}hr{height:0;border:solid #cacaca 0;border-top-width:1px}table{border-collapse:collapse;background-color:#efefef}table.main{background-color:#F4F5F9}table.mainouter{background-color:#e5e5e5;border:0;margin-top:-12px}table.bottom{color:#F4F5F9;background:transparent}table.main2{background-color:#F4F5F9;border:0}table.blok{background-color:#F4F5F9}h1{font-size:12pt;text-align:center}h2{background:#4ca1e4;border-radius:5px;border:0;color:#fff;font-size:10pt;height:18px;letter-spacing:1px;margin-bottom:0;margin-top:5px;text-align:center;text-shadow:1px 1px 1px #565656}.topnav{background-image:url(images/topnav.gif);background-position:top;padding:5px}h3{font-size:10pt;margin-bottom:5px;text-align:center}p{font-size:8pt}p.sub{margin-bottom:4pt}td{font-size:8pt;border:1px solid #E5E5E5}td.block{font-size:8pt;border:0;background-color:#1692C5}.block-title{text-shadow:0 1px 1px #175c77;color:#daeff7}td.right_menu{border:0}td.commenttable{background-color:#FFFEF2}td.embedded{border:none;text-align:left}td.bottom{border:none}td.heading{font-weight:700;border-left:0;background-color:#F5F5F5}td.heading_r{border-right:0}table.heading_b{border-bottom:0}td.text{padding:10pt;text-align:left}td.comment{padding:10pt;font-size:8pt;text-align:left}td.rowhead{font-weight:700;text-align:right;vertical-align:top}td.title{font-size:14pt}td.navigation{font-weight:700;font-size:10pt;border:none}form{margin-top:0;margin-bottom:0}.sublink{font-style:italic;font-size:7pt;font-weight:400}a:link,a:visited{text-decoration:none;color:#5b5b5b;font-weight:700;background-color:transparent!important}a:hover{color:#1582b0}a.index{font-weight:700}a.biglink{font-weight:700;font-size:12pt}a.online:link,a.online:visited{font-weight:400;text-decoration:none}a.menu:link,a.menu:visited{font-weight:400}a.menu:active{border-left:2px solid #dbe3e8;text-shadow:none}a.menu:hover{color:#117892;text-shadow:1px 1px 1px #dbe3e8;border-right:2px solid #c6d9e6;background-color:#f8f8f8!important;margin-right:6px}a.menu{display:block;padding-bottom:2px;margin-left:4px;font-weight:700}a.altlink_white:link,a.altlink_white:visited{font-weight:700;color:#666}a.altlink_white:hover{text-decoration:underline}.important{font-weight:700;font-size:8pt}div.popup{position:absolute;top:0;left:0;width:170px;height:85px;border:1px solid #000;display:none;background-color:ffffff}.red{color:#e00}.yellow{color:#970}.green{color:#000}input,select,textarea{margin-top:3px;margin-bottom:0;font-family:"tahoma";font-size:8pt}.small{font-size:7pt}.big{font-size:10pt}li{margin-top:6pt;margin-bottom:6pt}ul{margin-left:16pt;margin-top:0;margin-bottom:0}.menutitle{font-weight:700;text-align:center;color:#7E110E;margin:2px;background-color:#FFC58C}input.button{border:solid #FFC58C 1px;background-color:#FFC58C}div#ajaxerror{background:#FDD url(images/err.gif) no-repeat 5px 50%;padding:5px 5px 5px 24px;text-align:left;font-family:Verdana,Arial,Helvetica,sans-serif;color:#333;font-size:11px}a.button27{position:relative;display:inline-block;width:4em;height:2em;line-height:2em;vertical-align:middle;text-align:center;text-decoration:none;color:#000;outline:none;border-radius:5px;box-shadow:0 0 0 1px #ddd inset,0 1px 1px #fff}a.button27:hover{background:#dcdcdc linear-gradient(#fff,#dcdcdc);box-shadow:0 0 0 1px #aaa inset,0 1px 1px #aaa}a.button27:active{background:none;box-shadow:0 0 0 1px #bbb inset,0 1px 3px rgba(0,0,0,.5) inset,0 1px 2px #fff}a.button26{position:relative;display:inline-block;width:5em;height:2em;line-height:2em;vertical-align:middle;text-align:center;text-decoration:none;color:#000;outline:none;border-radius:5px;box-shadow:0 0 0 1px #ddd inset,0 1px 1px #fff}a.button26:hover{background:#dcdcdc linear-gradient(#fff,#dcdcdc);box-shadow:0 0 0 1px #aaa inset,0 1px 1px #aaa}a.button26:active{background:none;box-shadow:0 0 0 1px #bbb inset,0 1px 3px rgba(0,0,0,.5) inset,0 1px 2px #fff}a.button25{position:relative;display:inline-block;width:6em;height:2em;line-height:2em;vertical-align:middle;text-align:center;text-decoration:none;color:#000;outline:none;border-radius:5px;box-shadow:0 0 0 1px #ddd inset,0 1px 1px #fff}a.button25:hover{background:#dcdcdc linear-gradient(#fff,#dcdcdc);box-shadow:0 0 0 1px #aaa inset,0 1px 1px #aaa}a.button25:active{background:none;box-shadow:0 0 0 1px #bbb inset,0 1px 3px rgba(0,0,0,.5) inset,0 1px 2px #fff}a.button24{position:relative;display:inline-block;width:6em;height:2em;line-height:2em;vertical-align:middle;text-align:center;text-decoration:none;color:#000;outline:none;border-radius:5px;box-shadow:0 0 0 1px #ddd inset,0 1px 1px #fff}a.button24:hover{background:#dcdcdc linear-gradient(#fff,#dcdcdc);box-shadow:0 0 0 1px #aaa inset,0 1px 1px #aaa}a.button24:active{background:none;box-shadow:0 0 0 1px #bbb inset,0 1px 3px rgba(0,0,0,.5) inset,0 1px 2px #fff}a.but:link{color:#696969;background-color:transparent}a.but:visited{color:#696969;background-color:transparent}a.but:hover{color:#FFF;background-color:transparent}a.but:active{color:red;background-color:transparent}.vhr{margin-left:3px}td.rpan{background:#e5e5e5 url(images/rpan_bg.png) no-repeat;border:none;width:157px}td.comment_head{background:#d1d1d1;border:1px solid silver;font-weight:700;padding:0 7px 4px}a.reliz-lnk{color:#ecf6fa!important;font-weight:700;text-decoration:none}a.reliz-lnk-red{color:red!important;font-weight:700;text-decoration:none}.t-date{font-size:11px;font-family:tahoma;font-color:#424242}.rread-more{font-color:#1582b0!important;font-size:11px;font-family:tahoma}div.navigation{padding:.8em;border-bottom:1px solid #000}div.navigation a{font-size:13px;font-weight:700;margin-right:.5em;text-decoration:none}td.page_bottom:{border-bottom:1px solid #3782B7!important}a.lnk-m{text-shadow:0 1px 2px #fff}a.lnk-m:hover{border-bottom:1px dotted}.inputs{background:transparent url(images/srchbg.png) no-repeat 0 0;border:0 none;color:#5A5A5A;font-family:Tahoma,Verdana;font-size:8pt;height:22px;padding-left:19px;width:120px;display:block}.bg1{background-color:#E5E5E5}.bg2{background-color:#fff}.quote-title{color:#306A82!important;text-shadow:0 1px 1px #fff}.gallerycontainer{position:relative}.thumbnail img{border:1px solid #fff;margin:0 5px 5px 0}.thumbnail:hover{background-color:transparent}.thumbnail:hover img{border:1px solid blue}.thumbnail span{position:absolute;background-color:#ffffe0;padding:5px;left:-1000px;border:1px dashed gray;visibility:hidden;color:#000;text-decoration:none}.thumbnail span img{border-width:0;padding:2px}.thumbnail:hover span{visibility:visible;top:0;left:165px;z-index:50}.stepcarousel{position:relative;overflow:scroll;width:100%;height:95px}.stepcarousel .belt{position:absolute;left:0;top:0}.stepcarousel .panel{float:left;overflow:hidden;margin-right:8px;margin-top:0;width:119px;text-align:center}.stepcarousel .panel a{text-decoration:none!important;line-height:14px;color:#000}.stepcarousel .panel a:hover,.stepcarousel .panel a:hover h4{color:#e42828}.stepcarousel .panel img{display:block;margin-bottom:5px;margin-left:5px}.stepcarousel .panel span{font-size:10px;line-height:3px;color:#91a6b4;font-weight:strong}.highslide-html-content{position:absolute;display:none}.highslide-display-block{display:block}.highslide-display-none{display:none}.highslide-loading{display:block;color:#fff;font-size:9px;font-weight:700;text-decoration:none;padding:3px;border:1px solid #fff;background-color:#000}table.pm{font-size:11px;text-align:center}table.pm td.pm_head{background:#F5F5F5;padding:2px 2px 3px;border-right:0}table.pm td{border:1px solid #EEE;padding:2px 2px 3px;border-right:0}table.pm td:last-child{border-right:1px solid #EEE}td.a{background-color:#ececec;padding:6px;font-family:Verdana,Helvetica,sans-serif;font-size:8pt;border-style:solid;border-width:1px}td.b{background-color:#f7f7f7;padding:6px;font-family:Verdana,Helvetica,sans-serif;font-size:8pt;border-style:solid;border-width:1px}td.c{background-color:#90EE90;padding:6px;font-family:Verdana,Helvetica,sans-serif;font-size:8pt;border-style:solid;border-width:1px}a img{border:none}td.null{background:#FAFAFA;color:#000;border:0;font-family:tahoma;font-size:11px;padding:0}input.button4{position:relative;display:inline-block;font-family:Arial,Helvetica,FreeSans,"Liberation Sans","Nimbus Sans L",sans-serif;font-size:1.5em;font-weight:700;color:#f5f5f5;text-shadow:0 -1px rgba(0,0,0,.1);text-decoration:none;user-select:none;padding:.3em 1em;outline:none;border:none;border-radius:3px;background:#0c9c0d linear-gradient(#82d18d,#0c9c0d);box-shadow:inset #72de26 0 -1px 1px,inset 0 1px 1px #98ff98,#3caa3c 0 0 0 1px,rgba(0,0,0,.3) 0 2px 5px;-webkit-animation:pulsate 1.2s linear infinite;animation:pulsate 1.2s linear infinite}input.button4:hover{-webkit-animation-play-state:paused;animation-play-state:paused;cursor:pointer}input.button4:active{top:1px;color:#fff;text-shadow:0 -1px rgba(0,0,0,.3),0 0 5px #ffd,0 0 8px #fff;box-shadow:0 -1px 3px rgba(0,0,0,.3),0 1px 1px #fff,inset 0 1px 2px rgba(0,0,0,.8),inset 0 -1px 0 rgba(0,0,0,.05)}@-webkit-keyframes pulsate{50%{color:#fff;text-shadow:0 -1px rgba(0,0,0,.3),0 0 5px #ffd,0 0 8px #fff}}@keyframes pulsate{50%{color:#fff;text-shadow:0 -1px rgba(0,0,0,.3),0 0 5px #ffd,0 0 8px #fff}}a.button25{position:relative;display:inline-block;width:10em;height:2.5em;line-height:2.5em;vertical-align:middle;text-align:center;text-decoration:none;text-shadow:0 -1px 1px #777;color:#fff;outline:none;border:2px solid #F64C2B;border-radius:5px;box-shadow:0 0 0 60px rgba(0,0,0,0) inset,.1em .1em .2em #800;background:linear-gradient(#FB9575,#F45A38 48%,#EA1502 52%,#F02F17)}a.button25:active{top:.1em;left:.1em;box-shadow:0 0 0 60px rgba(0,0,0,.05) inset}a.button6{position:relative;font-weight:700;color:#fff;text-decoration:none;text-shadow:0 -1px 1px #c50;user-select:none;padding:.8em 2em;outline:none;border-radius:1px;background:linear-gradient(to left,rgba(0,0,0,.3),rgba(0,0,0,.0) 50%,rgba(0,0,0,.3)),linear-gradient(#d77d31,#fe8417,#d77d31);background-size:100% 100%,auto;background-position:50% 50%;box-shadow:inset #ebab00 0 -1px 1px,inset 0 1px 1px #ffbf00,#c72 0 0 0 1px,#000 0 10px 15px -10px;transition:.2s}a.button6:hover{background-size:140% 100%,auto}a.button6:active{top:1px;color:#ffdead;box-shadow:inset #ebab00 0 -1px 1px,inset 0 1px 1px #ffbf00,#c72 0 0 0 1px,0 10px 10px -9px #000}a.button10{display:inline-block;color:#000;font-size:125%;font-weight:700;text-decoration:none;user-select:none;padding:.25em .5em;outline:none;border:1px solid #faac11;border-radius:7px;background:#ffd403 linear-gradient(#ffd403,#f89d17);box-shadow:inset 0 -2px 1px rgba(0,0,0,0),inset 0 1px 2px rgba(0,0,0,0),inset 0 0 0 60px rgba(255,255,0,0);transition:box-shadow .2s,border-color .2s}a.button10:hover{box-shadow:inset 0 -1px 1px rgba(0,0,0,0),inset 0 1px 2px rgba(0,0,0,0),inset 0 0 0 60px rgba(255,255,0,.5)}a.button10:active{padding:calc(.25em+1px);border-color:rgba(177,159,0,1);box-shadow:inset 0 -1px 1px rgba(0,0,0,.1),inset 0 1px 2px rgba(0,0,0,.3),inset 0 0 0 60px rgba(255,255,0,.45)}a.button13{display:inline-block;width:15em;font-size:80%;color:rgba(255,255,255,.9);text-shadow:#2e7ebd 0 1px 2px;text-decoration:none;text-align:center;line-height:1.1;white-space:pre-line;padding:.7em 0;border:1px solid;border-color:#60a3d8 #2970a9 #2970a9 #60a3d8;border-radius:6px;outline:none;background:#60a3d8 linear-gradient(#89bbe2,#60a3d8 50%,#378bce);box-shadow:inset rgba(255,255,255,.5) 1px 1px}a.button13:first-line{font-size:170%;font-weight:700}a.button13:hover{color:#fff;background-image:linear-gradient(#9dc7e7,#74afdd 50%,#378bce)}a.button13:active{color:#fff;border-color:#2970a9;background-image:linear-gradient(#5796c8,#6aa2ce);box-shadow:none}#closemyprofile{cursor:pointer;text-decoration:none;position:absolute;top:4px;right:5px}div.closemyprofile{width:15px;height:15px;background-position:0 0}div.closemyprofile:hover{background-position:-16px 0;width:15px;height:15px}.screenshot img{margin:6px;padding:5px;-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;-moz-box-shadow:0 0 5px #6A6A6A;box-shadow:0 0 5px #6A6A6A;-webkit-box-shadow:0 0 5px #6A6A6A}table.tabs{background-color:transporent;border-collapse:collapse;border:0 none}table.tabs td{border:0 none;font:bold 11px Arial;color:#57533C;white-space:nowrap}table.tabs td a,table.tabs td a:visited{font-weight:700;color:#57533C;text-decoration:none}table.tabs td a:hover{color:#000}table.tabs td.active{background-image:url(../../pic/tabs/bg_active.gif);background-color:#000;color:#FFF}table.tabs td.notactive{background-image:url(../../pic/tabs/bg.gif);color:#57533C}table.tabs td.space{width:100%;background-image:none;text-align:right}table.ustats{border-collapse:separate;border:1px solid #000}table.ustats td{white-space:nowrap}table.ustats td.head{background-color:#000;border:1px solid #000;font-weight:700;font-size:7pt;color:#FFF}table.ustats td.cell{border:0 none;border-bottom:1px solid #DDD}table.ustats td.hhcell{background-color:#EEEEF8;border-top:1px solid #6FDF1B;border-bottom:1px solid #6FDF1B;border-left:0 none;border-right:0 none;color:#000}table.ustats td.hvcell{background-color:#EEEEF8;border-top:0 none;border-bottom:1px solid #DDD;border-left:1px solid #6FDF1B;border-right:1px solid #6FDF1B}table.ustats td.hccell{background-color:#6FDF1B;border-top:1px solid #F8C71E;border-bottom:1px solid #F8C71E;border-left:1px solid #F8C71E;border-right:1px solid #F8C71E;color:#000}table.ustats td.hhcell a,table.ustats td.hhcell a:visited,table.ustats td.hccell a,table.ustats td.hccell a:visited{font-weight:700;color:#000;text-decoration:none}table.ustats td.hhcell a:hover,table.ustats td.hccell a:hover{color:red}table.ustats td.foot{background-color:#F5F4EA;border:1px solid #F5F4EA;text-align:right;color:#000}table.ustats td.foot a,table.ustats td.foot a:visited{font-weight:400;color:#000;text-decoration:underline}table.ustats td.foot a:hover{color:red}img.main-arrowup{background:url(images/main_sprites.png);width:12px;height:12px}img.main-arrowdown{background:url(images/main_sprites.png) -12px 0;width:12px;height:12px}img.main-addbookmark{background:url(images/main_sprites.png) -24px 0;width:16px;height:16px}img.main-delbookmark{background:url(images/main_sprites.png) -40px 0;width:16px;height:16px}img.main-completed{background:url(images/main_sprites.png) -56px 0;width:16px;height:16px}img.main-bookmark{background:url(images/main_sprites.png) -72px 0;width:16px;height:16px}img.main-comments{background:url(images/main_sprites.png) -88px 0;width:16px;height:15px}img.main-inbox,img.main-inboxnew,img.main-sentbox,img.main-viewnfo{width:16px;height:16px}img.main-inbox{background:url(images/main_sprites.png) -104px 0}img.main-inboxnew{background:url(images/main_sprites.png) -120px 0}img.main-sentbox{background:url(images/main_sprites.png) -136px 0}img.main-viewnfo{background:url(images/main_sprites.png) -152px 0}img.main-buddylist{background:url(images/main_sprites.png) -168px 0;width:14px;height:14px}img.main-rss{background:url(images/main_sprites.png) -182px 0;width:14px;height:14px}img.main-magglass{background:url(images/main_sprites.png) -196px 0;width:11px;height:11px}img.main-multipage{background:url(images/main_sprites.png) -207px 0;width:8px;height:10px}img.main-warned2{background:url(images/main_sprites.png) -215px 0;width:13px;height:11px}img.main-warned{background:url(images/main_sprites.png) -228px 0;width:13px;height:11px}img.main-disabled{background:url(images/main_sprites.png) -241px 0;width:11px;height:11px}img.main-donor{background:url(images/main_sprites.png) -252px 0;width:11px;height:11px}img.main-warnedbig{background:url(images/main_sprites.png) -263px 0;width:16px;height:16px}img.main-disabledbig{background:url(images/main_sprites.png) -279px 0;width:16px;height:16px}img.main-donorbig{background:url(images/main_sprites.png) -295px 0;width:16px;height:16px}img.main-bluray{background:url(images/main_sprites.png) -311px 0;width:30px;height:15px!important}img.main-top{background:url(images/main_sprites.png) -341px 0;width:15px;height:13px}img.main-button_pm{background:url(images/main_sprites.png) -356px 0;width:25px;height:15px}img.main-new{background:url(images/main_sprites.png) -381px 0;width:27px;height:11px}img.main-updated{background:url(images/main_sprites.png) -408px 0;width:46px;height:11px}img.main-bar_left{background:url(images/main_sprites.png) -454px 0;width:2px;height:9px}img.main-bar_right{background:url(images/main_sprites.png) -456px 0;width:2px;height:9px}#tablelegend{width:48.5%;float:left;text-align:right}#searchtips{width:48.5%;float:right;text-align:left}#searchtips span{font-family:monospace;font-weight:700}.torrenttable tfoot,span.dvd5-sized,span.zero-month{color:grey}.torrenttable tfoot ol{list-style:none;margin:0;padding:0}.torrenttable tfoot li{margin:2px 0;line-height:16px}.torrenttable img,.torrenttable tfoot td,h1 img,img{border:none}.voted{color:#999}.thanks{color:#36AA3D}.static{color:#5D3126}div.scrollup{position:fixed;color:#fff;background-color:#286090;right:20px;bottom:0;padding:4px 10px;font-size:20px;border-top-left-radius:4px;border-top-right-radius:4px;cursor:pointer;display:none;text-align:center}div.scrollup:hover{background-color:#000}td.myhighlight{background-color:#EFEEE6;border:1px solid #D9D7C4;padding:0}.fas{margin-right:.3em;margin-left:.3em;-moz-osx-font-smoothing:grayscale;-webkit-font-smoothing:antialiased;display:inline-block;font-style:normal;font-variant:normal;text-rendering:auto;line-height:1;font-family:Font Awesome 5 Pro;font-weight:900}.fa-tag:before{content:"\F02B"}.tooltipss{font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-style:normal;line-height:1.428571429;line-break:auto;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;font-size:12px}.badge-extra{display:inline-block;min-width:10px;padding:3px 7px;font-size:10px;font-weight:400;line-height:1;vertical-align:middle;text-align:center;background-color:transparent;border-radius:2px;margin-left:2px;white-space:nowrap;border:1px solid #E0FFFF;border-radius:6px;background:rgba(76,79,80,.14)}.text-bold{font-weight:700}.badge-extra{float:left}.badges-extras{display:inline-block;min-width:10px;padding:3px 7px;font-size:10px;font-weight:400;line-height:1;vertical-align:middle;text-align:center;background-color:transparent;border-radius:2px;margin-left:2px;white-space:nowrap;border:1px solid #E0FFFF;border-radius:6px;background:rgba(76,79,80,.14)}.texts-bolds{font-weight:700}.badges-extras{float:center}details summary{background-color:#DCDCDC;margin-left:5px;width:500px;height:avto;padding:4px;cursor:pointer;color:#696969;font-weight:700;border-radius:5px;border:1px solid #C0C0C0}details div.spoiler{background-color:#ececec;border:1px solid #C0C0C0;border-radius:5px;padding:10px;width:avto;}details[open] div.spoiler{animation:slide .5s}@keyframes slide{0%{opacity:0;transform:translate(0,-20px)}100%{opacity:1;transform:translate(0,0)}}details.desc> summary::after{margin-left:5px;content:attr(data-close)}details.desc[open]>summary::after{content:attr(data-open);margin-left:5px}img.audio{background:url(images/cats_line.png);width:68px;height:68px}img.musvid{background:url(images/cats_line.png) -68px 0;width:68px;height:68px}img.anime{background:url(images/cats_line.png) -136px 0;width:68px;height:68px}img.movie{background:url(images/cats_line.png) -204px 0;width:68px;height:68px}img.tvshow{background:url(images/cats_line.png) -272px 0;width:68px;height:68px}img.docum{background:url(images/cats_line.png) -340px 0;width:68px;height:68px}img.sport{background:url(images/cats_line.png) -408px 0;width:68px;height:68px}img.demo{background:url(images/cats_line.png) -476px 0;width:68px;height:68px}img.lossless{background:url(images/incats_line.png);width:68px;height:68px}img.dsd{background:url(images/incats_line.png) -68px 0;width:68px;height:68px}img.dts{background:url(images/incats_line.png) -136px 0;width:68px;height:68px}img.sdp{background:url(images/incats_line.png) -204px 0;width:68px;height:68px}img.tvi{background:url(images/incats_line.png) -272px 0;width:68px;height:68px}img.tvp{background:url(images/incats_line.png) -340px 0;width:68px;height:68px}img.remux{background:url(images/incats_line.png) -408px 0;width:68px;height:68px}img.hddisc{background:url(images/incats_line.png) -476px 0;width:68px;height:68px}img.uhdtv4k{background:url(images/incats_line.png) -544px 0;width:68px;height:68px}img.uhd4kweb{background:url(images/incats_line.png) -612px 0;width:68px;height:68px}img.uhdrip{background:url(images/incats_line.png) -680px 0;width:68px;height:68px}img.uhdremux{background:url(images/incats_line.png) -748px 0;width:68px;height:68px}img.uhddisc{background:url(images/incats_line.png) -816px 0;width:68px;height:68px}img.uhd8kweb{background:url(images/incats_line.png) -884px 0;width:68px;height:68px}img.uhd8kmaster{background:url(images/incats_line.png) -952px 0;width:68px;height:68px}img.uhd16{background:url(images/incats_line.png) -1020px 0;width:68px;height:68px}img.exclusive{background:url(images/incats_line.png) -1088px 0;width:68px;height:68px}img.itunes{background:url(images/voice_web_trd_bookm.png);width:30px;height:30px}img.amazon{background:url(images/voice_web_trd_bookm.png) -30px 0;width:30px;height:30px}img.netflix{background:url(images/voice_web_trd_bookm.png) -60px 0;width:30px;height:30px}img.web{background:url(images/voice_web_trd_bookm.png) -90px 0;width:30px;height:30px}img.ukraine{background:url(images/voice_web_trd_bookm.png) -120px 0;width:30px;height:30px}img.rus{background:url(images/voice_web_trd_bookm.png) -150px 0;width:30px;height:30px}img.eng{background:url(images/voice_web_trd_bookm.png) -180px 0;width:30px;height:30px}img.france{background:url(images/voice_web_trd_bookm.png) -210px 0;width:30px;height:30px}img.german{background:url(images/voice_web_trd_bookm.png) -240px 0;width:30px;height:30px}img.japane{background:url(images/voice_web_trd_bookm.png) -270px 0;width:30px;height:30px}img.china{background:url(images/voice_web_trd_bookm.png) -300px 0;width:30px;height:30px}img.korean{background:url(images/voice_web_trd_bookm.png) -330px 0;width:30px;height:30px}img.anaglyph{background:url(images/voice_web_trd_bookm.png) -360px 0;width:93px;height:30px}img.sidebyside{background:url(images/voice_web_trd_bookm.png) -452px 0;width:98px;height:30px}img.overunder{background:url(images/voice_web_trd_bookm.png) -549px 0;width:99px;height:30px}img.dvadtryd{background:url(images/voice_web_trd_bookm.png) -647px 0;width:72px;height:30px}img.adms{background:url(images/voice_web_trd_bookm.png) -719px 0;width:30px;height:30px}img.mods{background:url(images/voice_web_trd_bookm.png) -749px 0;width:30px;height:30px}img.upls{background:url(images/voice_web_trd_bookm.png) -779px 0;width:30px;height:30px}img.vips{background:url(images/voice_web_trd_bookm.png) -809px 0;width:30px;height:30px}img.uhds{background:url(images/voice_web_trd_bookm.png) -842px 0;width:30px;height:30px}img.tvps{background:url(images/voice_web_trd_bookm.png) -873px 0;width:30px;height:30px}img.booksdelbrows{background:url(images/voice_web_trd_bookm.png) -905px 0;width:30px;height:30px}img.booksaddbrows{background:url(images/voice_web_trd_bookm.png) -935px 0;width:32px;height:30px}img.frends{background:url(images/knopki.png);width:20px;height:20px}img.logout{background:url(images/knopki.png) -20px 0;width:22px;height:20px}img.profil{background:url(images/knopki.png) -42px 0;width:20px;height:20px}img.admincp{background:url(images/knopki.png) -62px 0;width:20px;height:20px}img.telega{background:url(images/knopki.png) -82px 0;width:18px;height:20px}img.rss{background:url(images/knopki.png) -100px 0;width:20px;height:20px}img.ukrmova{background:url(images/knopki.png) -120px 0;width:22px;height:20px}img.rusmova{background:url(images/knopki.png) -142px 0;width:22px;height:20px}img.engmova{background:url(images/knopki.png) -164px 0;width:22px;height:20px}img.pmpusto{background:url(images/knopki.png) -186px 0;width:16px;height:20px}img.pmhot{background:url(images/knopki.png) -202px 0;width:18px;height:20px}img.downloads{background:url(images/knopki.png) -220px 0;width:20px;height:20px}img.seder{background:url(images/bbcode.png);width:14px;height:16px}img.lecher{background:url(images/bbcode.png) -14px 0;width:12px;height:16px}img.boy{background:url(images/bbcode.png) -26px 0;width:14px;height:16px}img.girl{background:url(images/bbcode.png) -40px 0;width:9px;height:16px}img.transgender{background:url(images/bbcode.png) -49px 0;width:17px;height:16px}img.zamok{background:url(images/bbcode.png) -66px 0;width:14px;height:16px}img.predupr{background:url(images/bbcode.png) -80px 0;width:18px;height:16px}img.editbut{background:url(images/bbcode.png) -98px 0;width:37px;height:16px}img.bold{background:url(images/bbcode.png) -135px 0;width:15px;height:16px}img.kosoy{background:url(images/bbcode.png) -150px 0;width:16px;height:16px}img.podcherknuto{background:url(images/bbcode.png) -166px 0;width:16px;height:16px}img.zacherknuto{background:url(images/bbcode.png) -182px 0;width:16px;height:16px}img.tochka{background:url(images/bbcode.png) -198px 0;width:16px;height:16px}img.liniya{background:url(images/bbcode.png) -214px 0;width:16px;height:16px}img.lefttext{background:url(images/bbcode.png) -230px 0;width:16px;height:16px}img.centertext{background:url(images/bbcode.png) -246px 0;width:16px;height:16px}img.righttext{background:url(images/bbcode.png) -262px 0;width:16px;height:16px}img.poshirine{background:url(images/bbcode.png) -278px 0;width:16px;height:16px}img.codbb{background:url(images/bbcode.png) -294px 0;width:16px;height:16px}img.phpcodebb{background:url(images/bbcode.png) -310px 0;width:17px;height:16px}img.spoilerbb{background:url(images/bbcode.png) -327px 0;width:16px;height:16px}img.urlbb{background:url(images/bbcode.png) -343px 0;width:19px;height:16px}img.emailbb{background:url(images/bbcode.png) -362px 0;width:17px;height:16px}img.imdbbb{background:url(images/bbcode.png) -379px 0;width:33px;height:16px}img.kpbb{background:url(images/bbcode.png) -412px 0;width:16px;height:16px}img.imgbb{background:url(images/bbcode.png) -428px 0;width:18px;height:16px}img.quotebb{background:url(images/bbcode.png) -446px 0;width:16px;height:16px}img.youtubebb{background:url(images/bbcode.png) -462px 0;width:16px;height:16px}img.rutubebb{background:url(images/bbcode.png) -478px 0;width:40px;height:16px}img.rusbb{background:url(images/bbcode.png) -518px 0;width:18px;height:16px}img.engbb{background:url(images/bbcode.png) -536px 0;width:18px;height:16px}img.avtoperevod{background:url(images/bbcode.png) -554px 0;width:17px;height:16px}img.magnez{background:url(images/bbcode.png) -571px 0;width:14px;height:16px}img.snatched{background:url(images/bbcode.png) -585px 0;width:15px;height:16px}img.leto{background:url(images/logo_images.png);width:324px;height:146px}img.vesna{background:url(images/logo_images.png) -324px 0;width:284px;height:146px}img.zima{background:url(images/logo_images.png) -608px 0;width:324px;height:146px}img.elka{background:url(images/logo_images.png) -932px 0;width:325px;height:146px}img.tryde{background:url(images/logo_images.png) -1263px -30px;width:151px;height:113px}img.donat{background:url(images/logo_images.png) -1457px 0;width:148px;height:146px}img.uareliz{background:url(images/logo_images.png) -1605px 96px;width:131px;height:90px}img.itunse{background:url(images/logo_images.png) -1736px 54px;width:149px;height:52px}img.baner{background:url(images/logo_images.png) -1885px 60px;width:468px;height:60px}
</style></head><body style="background:#2F4F4F no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;"><?
$commentid = intval($_GET["id"]);if (!is_valid_id($commentid))stderr2($tracker_lang['error'], "Неверное ID<script>setTimeout(function(){window.close()}, 1000);</script>");
$res = sql_query("SELECT text FROM shoutbox2 WHERE id=$commentid") or sqlerr(__FILE__,__LINE__);
$arr = mysql_fetch_array($res);if(!$arr) stderr2($tracker_lang['error'], $tracker_lang['invalid_id']);
?><table style='background-color:none;width:99%;' border='0' cellspacing='0' cellpadding='0'><tr><td style='border:none;text-align:left;'>
<form name='message' method='post' action='editchat.php'><input type='hidden' name='action' value='takemessage'>
<table style='background-color:none;width:100%;' border='0' cellspacing='0' cellpadding='0'><tr><td><?textbbcode("message","text",htmlspecialchars_uni($arr["text"]));?>
</td></tr><tr><td align='center'><input type='submit' value="Послать!"><?="<a href=\"javascript:window.close();\">";?>
<input type='button' value="Закрыть"></a></td></tr></table><input type='hidden' name='commentid' value='<?=$commentid?>'></form></td></tr></table></body></html><?die;}
if($action == 'takemessage'){$commentid = $_POST["commentid"];$text = $_POST["text"];if($text == "") stderr2($tracker_lang['error'], $tracker_lang['comment_cant_be_empty']);
$text = sqlesc($text);sql_query("UPDATE shoutbox2 SET text=$text WHERE id=$commentid") or sqlerr(__FILE__, __LINE__);?>
<html lang="ru"><body style="background:#2F4F4F no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;">
<div style="display:yes;position:fixed;margin-top:30px;margin-left:30px;border:1px solid #bdbdbd;-moz-border-radius:6px;border-radius:6px;-webkit-border-radius:6px;align:center;text-align:center;background:#e0e0e0;box-shadow:1px 1px 5px #5d5d5d;-moz-box-shadow:1px 1px 5px #5d5d5d;-webkit-box-shadow:1px 1px 5px #5d5d5d;">
<table cellpadding="0" cellspacing="0" border="0" width="900px" height="150px"><tr>
<td align="center"><div style="padding:5px"><center><font color=#A52A2A><b><?=$tracker_lang['success']?></b></font></center></div></td></tr>  
<tr><td align="center" width="100%" style="padding-left:4px;padding-bottom:2px;text-align:center;"><div style="padding-left:2px" align="center"><center>
Сообщение было успешно отредактировано!</center></div></td></tr></table></div><script>setTimeout(function(){window.close()}, 1500);</script></body></html><?die;}
}else{?><html><head><meta http-equiv='refresh' content='0;url=/'></head>
<body style="background:#2F4F4F no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;"></body></html><?}?>