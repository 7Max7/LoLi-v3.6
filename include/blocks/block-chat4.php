<?php if(!defined('BLOCK_FILE')){Header("Location: ../index.php");exit;}global $CURUSER, $smilies;
$blocktitle = ".:: Чатик".(get_user_class() >= UC_MODERATOR ? " :: <font class='small'><a class='altlink' href='javascript: CleanChat();'><b>Очистить чат</b></a></font>" : "")." ::.";
echo "<div id='cleaningchat'></div>";
$content .= "<table cellspacing='0' style='border:0;background:none;' cellpadding='0' height='300px' width='100%'><tr style='border:0;'><td style='border:0;'>
<div id='shoutbox' style='overflow:auto;height:300px;width:100%;border:0;'></div>";
if($CURUSER["schoutboxpos"] == 'yes'){
$content .= "<form action='shoutbox4.php' method='post' name='shoutform' onsubmit='return sendShout(this)'><input type='hidden' name='sent' value='yes'>
<input autocomplete='off' type='text' OnSelect='FieldName(this, this.name)' OnClick='FieldName(this, this.name)' OnKeyUp='FieldName(this, this.name)' title='Лимит 500 символов' name='shout' style='width:50%' MAXLENGTH='500'><input type='submit' title='Отправить сообщение в чат' value='Сказать' /><input type='reset' title='Очистить поле ввода' value='Стереть' /><input type='button' title='Открыть окно всех смайлов' value='Все смайлы' onclick='javascript:winop()' /><br><br>";?><script>
var SelField=document.shoutform.shoutform,TxtFeld=document.shoutform.shoutform,clientPC=navigator.userAgent.toLowerCase(),clientVer=parseInt(navigator.appVersion),is_ie=-1!=clientPC.indexOf("msie")&&-1==clientPC.indexOf("opera"),is_nav=-1!=clientPC.indexOf("mozilla")&&-1==clientPC.indexOf("spoofer")&&-1==clientPC.indexOf("compatible")&&-1==clientPC.indexOf("opera")&&-1==clientPC.indexOf("webtv")&&-1==clientPC.indexOf("hotjava"),is_moz=0,is_win=-1!=clientPC.indexOf("win")||-1!=clientPC.indexOf("16bit"),is_mac=-1!=clientPC.indexOf("mac");function StoreCaret(e){e.createTextRange&&(e.caretPos=document.selection.createRange().duplicate())}function FieldName(text,which){if(text.createTextRange&&(text.caretPos=document.selection.createRange().duplicate()),""!=which){var Field=eval("document.shoutform."+which);SelField=Field,TxtFeld=Field}}function AddSelectedText(e,t){if(SelField.createTextRange&&SelField.caretPos&&"\n"==t){var i=SelField.caretPos;i.text=" "==i.text.charAt(i.text.length-1)?e+t+" ":e+t,SelField.focus()}else SelField.caretPos?SelField.caretPos.text=e+SelField.caretPos.text+t:(SelField.value+=e+t,SelField.focus())}function InsertCode(e,t,i,n){if("name"==e)AddSelectedText("[b]"+t+"[/b]","\n");else if("url"==e||"mail"==e){if("url"==e)var l=prompt(t,"http://");if("mail"==e)l=prompt(t,"");if(!l)return alert(n);if(4<=clientVer&&is_ie&&is_win)if(o=document.selection.createRange().text)AddSelectedText("["+e+"="+l+"]","[/"+e+"]");else AddSelectedText("["+e+"="+l+"]"+prompt(i,i)+"[/"+e+"]","\n");else mozWrap(TxtFeld,"["+e+"="+l+"]","[/"+e+"]")}else if("color"==e||"font"==e||"size"==e)4<=clientVer&&is_ie&&is_win?AddSelectedText("["+e+"="+t+"]","[/"+e+"]"):TxtFeld.selectionEnd&&0<TxtFeld.selectionEnd-TxtFeld.selectionStart&&mozWrap(TxtFeld,"["+e+"="+t+"]","[/"+e+"]");else if("li"==e||"hr"==e)4<=clientVer&&is_ie&&is_win?AddSelectedText("["+e+"]",""):mozWrap(TxtFeld,"["+e+"]","");else if(4<=clientVer&&is_ie&&is_win){var o=!1;(o=document.selection.createRange().text)&&"quote"==e?AddSelectedText("["+e+"]"+o+"[/"+e+"]","\n"):AddSelectedText("["+e+"]","[/"+e+"]")}else mozWrap(TxtFeld,"["+e+"]","[/"+e+"]")}function mozWrap(e,t,i){var n=e.textLength,l=e.selectionStart,o=e.selectionEnd;1!=o&&2!=o||(o=n);var c=e.value.substring(0,l),a=e.value.substring(l,o),r=e.value.substring(o,n);e.value=c+t+a+i+r,e.focus()}language=1,richtung=1;var DOM=document.getElementById?1:0,opera=window.opera&&DOM?1:0,IE=!opera&&document.all?1:0,NN6=!DOM||IE||opera?0:1,ablauf=new Date,jahr=ablauf.getTime()+31536e6;ablauf.setTime(jahr);var richtung=1,isChat=!1;function keks(e,t){document.cookie=e+"="+t+"; expires="+ablauf.toGMTString()}function changeNoTranslit(e){NoHtml=!!document.trans.No_translit_HTML.checked,NoBBCode=!!document.trans.No_translit_BBCode.checked,keks("NoHtml",NoHtml),keks("NoScript",NoScript),keks("NoStyle",NoStyle),keks("NoBBCode",NoBBCode)}function changeRichtung(e){keks("TransRichtung",richtung=e),setFocus()}function setFocus(){TxtFeld.focus()}function repl(e,t,i){for(var n=e,l=0,o=0;0<=(l=n.indexOf(t,o))&&(e=e.substring(0,l)+i+e.substring(l+t.length,e.length),n=n.substring(0,l)+i+n.substring(l+t.length,n.length),!((o=l+i.length)>=n.length)););return e}NoHtml=!0,NoScript=!0,NoStyle=!0,NoBBCode=!0,NoBefehl=!1,setZustand();
</script><?$content .= "<div class='editorbutton' OnClick=\"InsertCode('b')\"><img class='bold' src='pic/trans.gif' title='Жирный текст'/></div><div class='editorbutton' OnClick=\"InsertCode('i')\"><img class='kosoy' src='pic/trans.gif' title='Наклонный текст'/></div><div class='editorbutton' OnClick=\"InsertCode('u')\"><img class='podcherknuto' src='pic/trans.gif' title='Подчеркнутый текст'/></div><div class='editorbutton' OnClick=\"InsertCode('s')\"><img class='zacherknuto' src='pic/trans.gif' title='Перечеркнутый текст'/></div></div>";
$count=0;while($count++<30 && list($code, $url) = each($smilies)){
$s.="<img onclick=\"parent.document.shoutform.shout.focus();parent.document.shoutform.shout.value=parent.document.shoutform.shout.value+' ".str_replace("'","\'",$code)." ';return false;\" style='font-weight:italic;' border='0' src='pic/smilies1/".$url."'/>";}
unset($smilies);$content .= "&nbsp;&nbsp;&nbsp;&nbsp;".$s."</form>";}$content .= "</td></tr></table>";?> 
<div id="loading-layer" style="display:none;font-family:Lucida Sans Unicode;font-size:11px;width:200px;height:50px; background:#EDFCEF;padding:10px;text-align:center;border:0;"></div><script>
var ChatUpd="1";function winop(){windop=window.open("moresmiles.php?form=shoutform&text=shout","mywin","height=500,width=600,resizable=no,scrollbars=yes")}function sendShout(e){if(Shout=e.shout.value,""==Shout.replace(/ /g,""))return alert("Вы должны вести сообщение!"),!1;sb_Clear();var t=new tbdev_ajax;t.onShow("");return t.requestFile="shoutbox4.php",t.setVar("do","shout"),t.setVar("shout",encodeURIComponent(Shout)),t.method="GET",t.element="shoutbox",t.sendAJAX(""),setTimeout("scrolling();",700),setTimeout("updatechatnow();",100),!1}function getShouts(){setTimeout("getShouts2();",1200)}function getShouts2(){var e=new tbdev_ajax;e.onShow=function(){};return e.requestFile="shoutbox4.php",e.method="GET",e.element="shoutbox",e.sendAJAX(""),setTimeout("scrolling();",300),setTimeout("getShouts2();",1e4),!1}function sb_Clear(){document.forms.shoutform.shout.value=""}function deleteShout(e){if(confirm("Вы точно хотите удалить это сообщение?")){var t=new tbdev_ajax;t.onShow=function(){};t.requestFile="shoutbox4.php",t.setVar("do","delete"),t.setVar("id",e),t.method="GET",t.element="shoutbox",t.sendAJAX(""),setTimeout("updatechatnow();",100)}}function CleanChat(){var e=new tbdev_ajax;e.onShow("");e.requestFile="clean.php",e.method="POST",e.element="cleaningchat",e.sendAJAX(""),setTimeout("updatechatnow();",100),setTimeout("CleanChat2();",4e3)}function CleanChat2(){$("#cleaningchat").empty()}getShouts();
</script>