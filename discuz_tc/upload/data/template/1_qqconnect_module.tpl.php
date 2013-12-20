<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); function tpl_global_login_extra() {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF

<div class="fastlg_fm y" style="margin-right: 10px; padding-right: 10px">
<p><a href="{$_G['connect']['login_url']}&statfrom=login_simple"><img src="{$__IMGDIR}/qq_login.gif" class="vm" alt="QQ登錄" /></a></p>
<p class="hm xg1" style="padding-top: 2px;">只需一步，快速開始</p>
</div>

EOF;
?><?php return $return;?><?php }

function tpl_global_usernav_extra1() {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF


EOF;
 if(CURMODULE != 'connect') { if($_G['connectguest']) { 
$return .= <<<EOF

<span class="pipe">|</span><a href="member.php?mod=connect" target="_blank" title="體驗本站更多功能">完善帳號信息</a><span class="pipe">|</span><a href="member.php?mod=connect&amp;ac=bind" target="_blank" title="使用QQ帳號快速登錄本站">綁定已有帳號</a>

EOF;
 } else { 
$return .= <<<EOF

<span class="pipe">|</span><a href="connect.php?mod=config" target="_blank"><img src="{$__IMGDIR}/qq_bind_small.gif" class="qq_bind" align="absmiddle" alt="QQ綁定" /></a>

EOF;
 } } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_global_footer($loadJs) {?><?php
$return = <<<EOF


EOF;
 if($loadJs['qsharejs']) { 
$return .= <<<EOF

<script src="{$loadJs['qsharejs']['jsurl']}" type="text/javascript"></script><script type="text/javascript">_share_tencent_weibo(null, {$loadJs['qsharejs']['func']}("t_f", null, "td"), "{$_G['siteurl']}", "{$loadJs['qsharejs']['appkey']}", "{$loadJs['qsharejs']['sitename']}");</script>

EOF;
 } if($loadJs['feedjs']) { 
$return .= <<<EOF

<script type="text/javascript">_attachEvent(window, 'load', function () { appendscript('{$loadJs['feedjs']['jsurl']}', '', 1, 'utf-8') }, document);</script>

EOF;
 } if($loadJs['cookieloginjs']) { 
$return .= <<<EOF

<script type="text/javascript">var cookieLogin = Ajax("TEXT");cookieLogin.get("{$loadJs['cookieloginjs']['jsurl']}", function() {});</script>

EOF;
 } if($loadJs['guestloginjs']) { 
$return .= <<<EOF

<script type="text/javascript">_attachEvent(window, 'load', function () { appendscript('{$loadJs['guestloginjs']['jsurl']}', '', 1, 'utf-8') }, document);</script>

EOF;
 } if($loadJs['syncpostjs']) { 
$return .= <<<EOF

<script type="text/javascript">_attachEvent(window, 'load', function () { appendscript('{$loadJs['syncpostjs']['jsurl']}', '', 1, 'utf-8') }, document);</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }
function tpl_login_bar() {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF


EOF;
 if(!$_G['connectguest']) { 
$return .= <<<EOF

<a href="{$_G['connect']['login_url']}&statfrom=login" target="_top" rel="nofollow"><img src="{$__IMGDIR}/qq_login.gif" class="vm" /></a>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_index_status_extra() {
global $_G;?><?php
$return = <<<EOF

<iframe id="connectlike" allowtransparency="true" scrolling="no" border="0" width="280" height="25" frameborder="0"></iframe>
<script type="text/javascript">_attachEvent(window, 'load', function () { $('connectlike').src = 'api/connect/like.php';}, document);</script>

EOF;
?><?php return $return;?><?php }

function tpl_sync_method($allowconnectfeed, $allowconnectt, $cssextra = '') {
global $_G;?><?php
$return = <<<EOF


EOF;
 if($allowconnectt) { 
$return .= <<<EOF

<script type="text/javascript">
//var _allow_qq = 
EOF;
 if($allowconnectfeed) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _allow_t = 
EOF;
 if($allowconnectt) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
//var _syn_qq = 
EOF;
 if(intval($_G['cookie']['connect_not_sync_feed'])) { 
$return .= <<<EOF
false
EOF;
 } else { if($_G['member']['conisbind'] && $_G['member']['conispublishfeed']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } } 
$return .= <<<EOF
;
var _syn_t = 
EOF;
 if(intval($_G['cookie']['connect_not_sync_t'])) { 
$return .= <<<EOF
false
EOF;
 } else { if($_G['member']['conisbind'] && $_G['member']['conispublisht']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } } 
$return .= <<<EOF
;
var _is_oauth_user = 
EOF;
 if($_G['member']['conisbind']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _is_feed_auth = 
EOF;
 if(($_G['member']['conuinsecret'] || $_G['member']['conuintoken']) && $_G['member']['is_feed']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _is_token_outofdate = 
EOF;
 if($_G['member']['conuinsecret'] || $_G['member']['conuintoken']) { 
$return .= <<<EOF
false
EOF;
 } else { 
$return .= <<<EOF
true
EOF;
 } 
$return .= <<<EOF
;
function connect_post_init() {
//			if (_allow_qq && _syn_qq) {
//				if (_is_feed_auth && !_is_token_outofdate) {
//					$('connectPost_synQQ').className = 'syn_qq_check';
//					$('connectPost_synQQ').title = '已設置同步至QQ空間';
//					$('connect_publish_feed').value = 1;
//				} else {
//					$('connectPost_synQQ').className = 'syn_qq';
//					$('connectPost_synQQ').title = '未設置同步至QQ空間';
//					$('connect_publish_feed').value = 0;
//				}
//			}

if (_allow_t && _syn_t) {
if (_is_feed_auth && !_is_token_outofdate) {
$('connectPost_synT').className = 'syn_tqq_check';
$('connectPost_synT').title = '已設置同步至騰訊微博';
$('connect_publish_t').value = 1;
} else {
$('connectPost_synT').className = 'syn_tqq';
$('connectPost_synT').title = '未設置同步至騰訊微博';
$('connect_publish_t').value = 0;
}
}

//			if (_allow_qq) {
//				$('connectPost_synQQ').onclick = function () {
//					connect_syn_option_toggle(this);
//				}
//			}
if (_allow_t) {
$('connectPost_synT').onclick = function () {
connect_syn_option_toggle(this);
}
}
if (getcookie('connect_synpost_tip')) {
connect_post_tip();
}
}
function connect_syn_option_toggle(opt) {
if (_is_feed_auth && !_is_token_outofdate) {
if ($(opt.getAttribute('rel')).value == 1) {
opt.className = opt.className.replace('_check', '');
opt.title = opt.title.replace('已', '未');
$(opt.getAttribute('rel')).value = 0;
} else {
$(opt.getAttribute('rel')).value = 1;
opt.className += '_check';
opt.title = opt.title.replace('未', '已');
}
} else {
var _auth_text = '馬上完善授權，您將可以發表主題時同步到QQ空間和騰訊微博，第一時間和大家分享您在論壇中的新鮮事兒。';
if (_is_token_outofdate) {
_auth_text = '為了您的賬號安全，請使用QQ帳號重新登錄，將為您升級帳號安全機制<br/><br/>點擊<a href="{$_G['connect']['login_url']}"><img src="static/image/common/qq_login.gif" class="vm" alt="QQ登錄" /></a>頁面將發生跳轉，請確保您已保存好帖子數據';
var _button = '我知道了';
showDialog(_auth_text, 'notice', null, null, 0, null, null, _button);
return;
} else if (!_is_oauth_user) {
_auth_text = '馬上綁定QQ賬號，您將可以發表主題時同步到QQ空間和騰訊微博，第一時間和大家分享您在論壇中的新鮮事兒。';
}
showDialog(_auth_text, 'notice', '授權提示', 'connect_goto_setting()', 0, null, null, '修改授權');
}
}
function connect_post_tip() {
if ($('fastpostform')) {
return;
}
if (_is_token_outofdate) {
if ($('synnotice')) {
$('synnotice').style.display = 'none';
}
return;
}
var r = document.getElementById('rstnotice');
var c = document.createElement('div');
c.setAttribute('id', 'synnotice');
c.setAttribute('class', 'ntc_l bbs');
if(BROWSER.ie) {
c.id = 'synnotice';
c.className = 'ntc_l bbs';
}
c.style.display = 'block';
r.parentNode.insertBefore(c, r.nextSibling);
c.innerHTML = '<a href="javascript:void(0);" title="關閉同步發帖提示" class="d y" onclick="connect_syn_tip_hide();">close</a>此主題將同步到騰訊微博，您的聽眾能夠看到您發表的主題。&nbsp;&nbsp;<a class="xi2" href="javascript:void(0);" onclick="connect_syn_cancel();" title="取消發表主題時同步到騰訊微博，將來您可以到「設置-QQ綁定」頁面重新設置。"><strong>暫不同步</strong></a>';
}
function connect_syn_tip_hide() {
setcookie('connect_synpost_tip', '', '-1');
$('synnotice').style.display = 'none';
}
function connect_syn_cancel() {
ajaxget('{$_G['siteurl']}connect.php?mod=config&op=synconfig', '');
//			$('connectPost_synQQ').className = 'syn_qq';
//			$('connectPost_synQQ').title = '未設置同步至QQ空間';
//			$('connect_publish_feed').value = 0;
$('connectPost_synT').className = 'syn_tqq';
$('connectPost_synT').title = '未設置同步至騰訊微博';
$('connect_publish_t').value = 0;
$('synnotice').style.display = 'none';
}
function connect_goto_setting() {
var _url = "{$_G['siteurl']}home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp";
hideMenu('fwin_dialog', 'dialog')
var _newWindow = window.open(_url, 'newWindow');
_newWindow.focus();
}
_attachEvent(window, 'load', function(){
connect_post_init();
});
</script>

EOF;
 if($allowconnectt) { 
$return .= <<<EOF

<a title="未設置同步至騰訊微博" class="syn_tqq" href="javascript:void(0);" id="connectPost_synT" rel="connect_publish_t">騰訊微博</a>
<input type="hidden" name="connect_publish_t" id="connect_publish_t" value="0" />

EOF;
 } } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_infloat_sync_method($allowconnectfeed, $allowconnectt) {
global $_G;?><?php
$return = <<<EOF


EOF;
 if($allowconnectt) { 
$return .= <<<EOF

<a title="未設置同步至騰訊微博" class="syn_tqq" href="javascript:void(0);" id="connectPost_synT_infloat" rel="connect_publish_t_infloat">騰訊微博</a>
<input type="hidden" name="connect_publish_t" id="connect_publish_t_infloat" value="0" />
<script type="text/javascript" reload="1">
//var _allow_qq_infloat = 
EOF;
 if($allowconnectfeed) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _allow_t_infloat = 
EOF;
 if($allowconnectt) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
//var _syn_qq_infloat = 
EOF;
 if(intval($_G['cookie']['connect_not_sync_feed'])) { 
$return .= <<<EOF
false
EOF;
 } else { if($_G['member']['conisbind'] && $_G['member']['conispublishfeed']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } } 
$return .= <<<EOF
;
var _syn_t_infloat = 
EOF;
 if(intval($_G['cookie']['connect_not_sync_t'])) { 
$return .= <<<EOF
false
EOF;
 } else { if($_G['member']['conisbind'] && $_G['member']['conispublisht']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } } 
$return .= <<<EOF
;
var _is_oauth_user_infloat = 
EOF;
 if($_G['member']['conisbind']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _is_feed_auth_infloat = 
EOF;
 if(($_G['member']['conuinsecret'] || $_G['member']['conuintoken']) && $_G['member']['is_feed']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _is_token_outofdate = 
EOF;
 if($_G['member']['conuinsecret'] || $_G['member']['conuintoken']) { 
$return .= <<<EOF
false
EOF;
 } else { 
$return .= <<<EOF
true
EOF;
 } 
$return .= <<<EOF
;
function connect_post_init_infloat() {
//			if (_allow_qq_infloat && _syn_qq_infloat) {
//				if (_is_feed_auth_infloat && !_is_token_outofdate) {
//					$('connectPost_synQQ_infloat').className = 'syn_qq_check';
//					$('connectPost_synQQ_infloat').title = '已設置同步至QQ空間';
//					$('connect_publish_feed_infloat').value = 1;
//				} else {
//					$('connectPost_synQQ_infloat').className = 'syn_qq';
//					$('connectPost_synQQ_infloat').title = '未設置同步至QQ空間';
//					$('connect_publish_feed_infloat').value = 0;
//				}
//			}

if (_allow_t_infloat && _syn_t_infloat) {
if (_is_feed_auth_infloat && !_is_token_outofdate) {
$('connectPost_synT_infloat').className = 'syn_tqq_check';
$('connectPost_synT_infloat').title = '已設置同步至騰訊微博';
$('connect_publish_t_infloat').value = 1;
} else {
$('connectPost_synT_infloat').className = 'syn_tqq';
$('connectPost_synT_infloat').title = '未設置同步至騰訊微博';
$('connect_publish_t_infloat').value = 0;
}
}

//			if (_allow_qq_infloat) {
//				$('connectPost_synQQ_infloat').onclick = function () {
//					connect_syn_option_toggle_infloat(this);
//				}
//			}
if (_allow_t_infloat) {
$('connectPost_synT_infloat').onclick = function () {
connect_syn_option_toggle_infloat(this);
}
}
if (getcookie('connect_synpost_tip')) {
connect_post_tip_infloat();
}
}
function connect_syn_option_toggle_infloat(opt) {
if (_is_feed_auth_infloat && !_is_token_outofdate) {
if ($(opt.getAttribute('rel')).value == 1) {
opt.className = opt.className.replace('_check', '');
opt.title = opt.title.replace('已', '未');
$(opt.getAttribute('rel')).value = 0;
} else {
$(opt.getAttribute('rel')).value = 1;
opt.className += '_check';
opt.title = opt.title.replace('未', '已');
}
} else {
var _auth_text = '馬上完善授權，您將可以發表主題時同步到QQ空間和騰訊微博，第一時間和大家分享您在論壇中的新鮮事兒。';
if (_is_token_outofdate) {
_auth_text = '為了您的賬號安全，請使用QQ帳號重新登錄，將為您升級帳號安全機制<br/><br/>點擊<a href="{$_G['connect']['login_url']}"><img src="static/image/common/qq_login.gif" class="vm" alt="QQ登錄" /></a>頁面將發生跳轉，請確保您已保存好帖子數據';
var _button = '我知道了';
showDialog(_auth_text, 'notice', null, null, 0, null, null, _button);
return;
} else if (!_is_oauth_user_infloat) {
_auth_text = '馬上綁定QQ賬號，您將可以發表主題時同步到QQ空間和騰訊微博，第一時間和大家分享您在論壇中的新鮮事兒。';
}
showDialog(_auth_text, 'notice', '授權提示', 'connect_goto_setting_infloat()', 0, null, null, '修改授權');
}
}
function connect_post_tip_infloat() {
if ($('fastpostform')) {
return;
}
var r = document.getElementById('rstnotice');
var c = document.createElement('div');
c.setAttribute('id', 'synnotice');
c.setAttribute('class', 'ntc_l bbs');
if(BROWSER.ie) {
c.id = 'synnotice';
c.className = 'ntc_l bbs';
}
c.style.display = 'block';
r.parentNode.insertBefore(c, r.nextSibling);
c.innerHTML = '<a href="javascript:void(0);" title="關閉同步發帖提示" class="d y" onclick="connect_syn_tip_hide_infloat();">close</a>此主題將同步到騰訊微博，您的聽眾能夠看到您發表的主題。&nbsp;&nbsp;<a class="xi2" href="javascript:void(0);" onclick="connect_syn_cancel_infloat();" title="取消發表主題時同步到騰訊微博，將來您可以到「設置-QQ綁定」頁面重新設置。"><strong>暫不同步</strong></a>';
}
function connect_syn_tip_hide_infloat() {
setcookie('connect_synpost_tip', '', '-1');
$('synnotice').style.display = 'none';
}
function connect_syn_cancel_infloat() {
ajaxget('{$_G['siteurl']}connect.php?mod=config&op=synconfig', '');
//$('connectPost_synQQ_infloat').className = 'syn_qq';
//$('connectPost_synQQ_infloat').title = '未設置同步至QQ空間';
//$('connect_publish_feed_infloat').value = 0;
$('connectPost_synT_infloat').className = 'syn_tqq';
$('connectPost_synT_infloat').title = '未設置同步至騰訊微博';
$('connect_publish_t_infloat').value = 0;
$('synnotice').style.display = 'none';
}
function connect_goto_setting_infloat() {
var _url = "{$_G['siteurl']}home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp";
hideMenu('fwin_dialog', 'dialog')
var _newWindow = window.open(_url, 'newWindow');
_newWindow.focus();
}
connect_post_init_infloat();
</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_viewthread_share_method($jsurl) {
global $_G;
if (!$_G['setting']['connect']['allow']) return;
$connect_thread_subject = addslashes(strip_tags($_G['thread']['subject']));?><?php
$__IMGDIR = IMGDIR;$__FORMHASH = FORMHASH;$return = <<<EOF


EOF;
 if($_G['member']['conisbind'] && ($_G['member']['conuinsecret'] || $_G['member']['conuintoken'])) { 
$return .= <<<EOF

<a href="{$_G['connect']['qq_share_url']}" id="k_share_to_qq" title="QQ好友和群" target="_blank"><i><img src="{$__IMGDIR}/qq_share.png" alt="QQ好友和群" />QQ好友和群</i></a>
<a href="javascript:void(0);" ref="{$_G['connect']['weibo_share_url']}" id="k_weiboshare" title="騰訊微博"><i><img src="{$__IMGDIR}/weibo.png" alt="騰訊微博" />騰訊微博</i></a>
<a href="javascript:void(0);" ref="{$_G['connect']['pengyou_share_url']}" id="k_pengyoushare" title="QQ空間"><i><img src="{$__IMGDIR}/qzone.gif" alt="QQ空間" />QQ空間</i></a>
<script type="text/javascript">
var _is_oauth_user = 
EOF;
 if($_G['member']['conuinsecret'] || $_G['member']['conuintoken']) { 
$return .= <<<EOF
true
EOF;
 } else { 
$return .= <<<EOF
false
EOF;
 } 
$return .= <<<EOF
;
var _is_share_token_outofdate = 
EOF;
 if($_G['member']['conuinsecret'] || $_G['member']['conuintoken']) { 
$return .= <<<EOF
false
EOF;
 } else { 
$return .= <<<EOF
true
EOF;
 } 
$return .= <<<EOF
;
var _is_feed_auth = true;
var _share_buttons = ['k_weiboshare', 'k_pengyoushare'];
function connect_share_init() {
for (var i = 0; i < _share_buttons.length; i++) {
$(_share_buttons[i]).onclick = function () {
connect_share_form(this);
return false;
}
}
}
function connect_share_form(obj) {
if (_is_oauth_user && _is_feed_auth) {
var _url = obj.getAttribute('ref');
showWindow(obj.id, _url, 'get', 1);
} else {
if (_is_share_token_outofdate) {
var _text = '為了您的賬號安全，請使用QQ帳號重新登錄，將為您升級帳號安全機制<br/><br/>點擊<a href="{$_G['connect']['login_url']}"><img src="static/image/common/qq_login.gif" class="vm" alt="QQ登錄" /></a>頁面將發生跳轉';
var _button = '我知道了';
showDialog(_text, 'notice', null, null, 0, null, null, _button);
} else if (!_is_oauth_user) {
var _text = '很抱歉，由於分享功能升級，您需要使用QQ帳號重新登錄本站，即可馬上體驗全新的分享到QQ空間、騰訊微博和騰訊朋友功能。<br /><span style="font-size: 12px;">提示：點擊<a href="member.php?mod=logging&amp;action=logout&amp;formhash={$__FORMHASH}" class="xi2">這裡退出</a>後，重新使用QQ賬號登錄。</span>';
var _button = '我知道了';
showDialog(_text, 'notice', null, 'connect_goto_setting()', 0, null, null, _button);
} else if (!_is_feed_auth) {
var _title = '授權提示';
var _text = '獨樂樂不如眾樂樂，馬上完善授權，您將可以把本站精彩內容分享到QQ空間、騰訊微博和騰訊朋友，跟大家分享每個精彩瞬間。';
var _button = '修改授權';
showDialog(_text, 'notice', _title, 'connect_goto_setting()', 0, null, null, _button);
}
}
}
function connect_goto_setting() {
if (_is_oauth_user) {
var _url = "{$_G['siteurl']}home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp";
hideMenu('fwin_dialog', 'dialog');
var _newWindow = window.open(_url, 'newWindow');
_newWindow.focus();
} else {
hideMenu('fwin_dialog', 'dialog');
}
}
_attachEvent(window, 'load', function(){
connect_share_init();
});
</script>

EOF;
 } else { 
$return .= <<<EOF

<a href="{$_G['connect']['qq_share_url']}" id="k_share_to_qq" title="QQ好友和群" target="_blank"><i><img src="{$__IMGDIR}/qq_share.png" alt="QQ好友和群" />QQ好友和群</i></a>
<a href="javascript:void(0);" id="k_qqshare" onclick="postToQzone();" title="QQ空間"><i><img src="{$__IMGDIR}/qzone.gif" alt="QQ空間" />QQ空間</i></a>
<a href="javascript:void(0)" onclick="postToWb();" id="k_weiboshare" title="騰訊微博"><i><img src="{$__IMGDIR}/weibo.png" alt="騰訊微博" />騰訊微博</i></a>
<a href="javascript:void(0);" onclick="postToPengyou();" id="k_pengyoushare" title="騰訊朋友"><i><img src="{$__IMGDIR}/pengyou.png" alt="騰訊朋友" />騰訊朋友</i></a>
<script type="text/javascript">
function postToWb(){
var _t = encodeURI(document.title);
var _url = encodeURIComponent(document.location);
var _appkey = encodeURI("{$_G['connect']['weibo_appkey']}");
var _pic = "{$_G['connect']['share_images']}";
var _site = encodeURIComponent("{$_G['setting']['bbname']}");
var _from = 'discuz';
var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t+'&from='+_from;
window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
}
function postToPengyou(){
var _url = encodeURIComponent(document.location.href);
var _site = encodeURIComponent("{$_G['setting']['bbname']}");
var _title = encodeURIComponent("{$connect_thread_subject}");
var _pics = "{$_G['connect']['share_images']}";
var _from = 'discuz';
var _u = '{$_G['connect']['qzone_public_share_url']}?to=pengyou&url='+_url+'&site='+_site+'&title='+_title+'&pics='+_pics+'&from='+_from;
window.open(_u);
}
</script>

EOF;
 } 
$return .= <<<EOF
	

EOF;
 if($jsurl) { 
$return .= <<<EOF

<script type="text/javascript">_attachEvent(window, 'load', function () { appendscript('{$jsurl}', '', 1, 'utf-8') }, document);</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_viewthread_bottom($jsurl) {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF

<script type="text/javascript">
var connect_qzone_share_url = '{$_G['connect']['qzone_share_url']}';
var connect_weibo_share_url = '{$_G['connect']['weibo_share_url']}';
var connect_thread_info = {
thread_url: '{$_G['siteurl']}{$GLOBALS['canonical']}',
thread_id: '{$_G['tid']}',
post_id: '{$_G['connect']['first_post']['pid']}',
forum_id: '{$_G['fid']}',
author_id: '{$_G['connect']['first_post']['authorid']}',
author: '{$_G['connect']['first_post']['author']}'
};

connect_autoshare = '{$_GET['connect_autoshare']}';
connect_isbind = '{$_G['member']['conisbind']}';
if(connect_autoshare == 1 && connect_isbind) {
_attachEvent(window, 'load', function(){
connect_share(connect_weibo_share_url, connect_openid);
});
}
</script>

EOF;
 if($_G['member']['conisbind']) { 
$return .= <<<EOF

<div id="connect_share_unbind" style="display: none;">
<div class="c hm">
<div style="font-size:14px; margin:10px 0;">綁定QQ帳號，輕鬆分享到QQ空間與騰訊微博</div>
<div><a href="connect.php?mod=config&amp;connect_autoshare=1" target="_blank"><img src="{$__IMGDIR}/qq_bind.gif" align="absmiddle" style="margin-top:5px;" /></a></div>
</div>
<input type="hidden" id="connect_thread_title" name="connect_thread_title" value="{$_G['forum_thread']['subject']}" />
</div>

EOF;
 } if($jsurl) { 
$return .= <<<EOF

<script type="text/javascript">_attachEvent(window, 'load', function () { appendscript('{$jsurl}', '', 1, 'utf-8') }, document);</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_sync_post_viewthread_bottom($jsurl) {?><?php
$return = <<<EOF

<div style="display:none;"><iframe src='{$jsurl}' style="display:none;"></div>

EOF;
?><?php return $return;?><?php }

function tpl_register_input() {
global $_G;

$connect_app_id = $_G['qc']['connect_app_id'];
$connect_openid = $_G['qc']['connect_openid'];?><?php
$return = <<<EOF


EOF;
 if($connect_app_id && $connect_openid) { 
$return .= <<<EOF

<div class="rfm">
<table>
<tr>
<th></th>
<td>
<label  for="use_qzone_avatar_qqshow"><input type="checkbox" name="use_qzone_avatar_qqshow" id="use_qzone_avatar_qqshow" class="pc" value="1" checked="checked" tabindex="1" />使用QQ頭像和QQ秀</label>
</td>
</tr>
</table>
</div>

EOF;
 } 
$return .= <<<EOF

<input type="hidden" id="auth_hash" name="auth_hash" value="{$_G['qc']['connect_auth_hash']}" />
<input type="hidden" id="is_notify" name="is_notify" value="{$_G['qc']['connect_is_notify']}" />
<input type="hidden" id="is_feed" name="is_feed" value="{$_G['qc']['connect_is_feed']}" />

EOF;
?><?php return $return;?><?php }

function tpl_register_bottom() {
global $_G;

$loginhash = 'L'.random(4);
$change_qq_url = $_G['connect']['discuz_change_qq_url'];
$qq_nick = $_G['qc']['qq_nick'];
$connect_app_id = $_G['qc']['connect_app_id'];
$connect_openid = $_G['qc']['connect_openid'];
$connect_tab_1 = $_GET['ac'] != 'bind' && $_G['setting']['regconnect'] ? ' class="a"' : '';
$connect_tab_2 = $_GET['ac'] == 'bind' ? ' class="a"' : '';?><?php
$js2 = <<<EOF
	

EOF;
 if($_GET['ac'] == 'bind' || $_G['setting']['regconnect']) { 
$js2 .= <<<EOF

<div id="loggingbox" class="loggingbox">
<div class="loging_tit cl">
<div class="z avt" style="display:block;"><img src="{$_G['connect']['avatar_url']}/{$connect_app_id}/{$connect_openid}" width="48" height="48" /></div>
<div class="z">
<p class="welcome mbn cl" style="clear:both; width:100%; "><strong>Hi</strong>,<strong>{$_G['member']['username']}</strong>, <span class="xg2">歡迎使用QQ帳號登錄  {$_G['setting']['bbname']}</span></p>
<ul class="tb cl z">
<li id="connect_tab_1"{$connect_tab_1}><a id="loginlist" href="javascript:;" onclick="connect_switch(1);this.blur();" tabindex="900">創建新帳號</a></li>
<li id="connect_tab_2"{$connect_tab_2}><a id="loginlist2" href="javascript:;" onclick="connect_switch(2);this.blur();" tabindex="900">已有本站帳號</a></li>
</ul>
</div>
</div>
</div>

EOF;
 } 
$js2 .= <<<EOF


EOF;
?><?php $js2 = str_replace(array("'", "\r", "\n"), array("\'", '', ''), $js2);?><?php
$__FORMHASH = FORMHASH;$__IMGDIR = IMGDIR;$return = <<<EOF

<div class="b1lr">
<form method="post" autocomplete="off" name="login" id="loginform_{$loginhash}" class="cl"
EOF;
 if($_G['setting']['regconnect']) { 
$return .= <<<EOF
 style="display:none"
EOF;
 } 
$return .= <<<EOF
 onsubmit="ajaxpost('loginform_{$loginhash}', 'returnmessage4', 'returnmessage4', 'onerror');return false;" action="member.php?mod=connect&amp;action=login&amp;loginsubmit=yes
EOF;
 if(!empty($_GET['handlekey'])) { 
$return .= <<<EOF
&amp;handlekey={$_GET['handlekey']}
EOF;
 } 
$return .= <<<EOF
&amp;loginhash={$loginhash}">
<div class="c cl bm_c">
<input type="hidden" name="formhash" value="{$__FORMHASH}" />
<input type="hidden" name="referer" value="{$_G['qc']['dreferer']}" />
<input type="hidden" id="auth_hash" name="auth_hash" value="{$_G['qc']['connect_auth_hash']}" />
<input type="hidden" id="is_notify" name="is_notify" value="{$_G['qc']['connect_is_notify']}" />
<input type="hidden" id="is_feed" name="is_feed" value="{$_G['qc']['connect_is_feed']}" />

EOF;
 if($_G['qc']['uinlimit']) { 
$return .= <<<EOF

<!--<div class="bm xi1 xw1"><div class="bm_c"><img src="{$__IMGDIR}/connect_qq.gif" alt="QQ" class="vm" />&nbsp;您的QQ帳號在本站註冊的帳號數量達到上限，請綁定已有帳號，或<a href="{$change_qq_url}">更換其他QQ賬號</a></div></div>-->
<div class="rfm">
<table>
<tr>
<th><img src="{$__IMGDIR}/connect_qq.gif" alt="QQ" class="mtn" /></th>
<td>
您的QQ帳號在本站註冊的帳號數量達到上限，請綁定已有帳號，或<a href="{$change_qq_url}">更換其他QQ賬號</a>
</td>
</tr>
</table>
</div>

EOF;
 } 
$return .= <<<EOF

<div class="rfm">
<table>
<tr>
<th>

EOF;
 if($_G['setting']['autoidselect']) { 
$return .= <<<EOF

<label for="username">帳號:</label>

EOF;
 } else { 
$return .= <<<EOF

<span class="login_slct">
<select name="loginfield" style="float: left;" width="45" id="loginfield_{$loginhash}">
<option value="username">用戶名</option>
<option value="uid">UID</option>
<option value="email">Email</option>
</select>
</span>

EOF;
 } 
$return .= <<<EOF

</th>
<td><input type="text" name="username" id="username_{$loginhash}" autocomplete="off" size="36" class="txt" tabindex="1" value="{$username}" /></td>
</tr>
</table>
</div>

<div class="rfm">
<table>
<tr>
<th><label for="password3_{$loginhash}">密碼:</label></th>
<td><input type="password" id="password3_{$loginhash}" name="password" size="36" class="txt" tabindex="1" /></td>
</tr>
</table>
</div>

<div class="rfm">
<table>
<tr>
<th>安全提問:</th>
<td><select id="loginquestionid_{$loginhash}" width="213" name="questionid" onchange="if($('loginquestionid_{$loginhash}').value > 0) $('loginanswer_row_{$loginhash}').style.display=''; else $('loginanswer_row_{$loginhash}').style.display='none'">
<option value="0">安全提問(未設置請忽略)</option>
<option value="1">母親的名字</option>
<option value="2">爺爺的名字</option>
<option value="3">父親出生的城市</option>
<option value="4">您其中一位老師的名字</option>
<option value="5">您個人計算機的型號</option>
<option value="6">您最喜歡的餐館名稱</option>
<option value="7">駕駛執照最後四位數字</option>
</select></td>
</tr>
</table>
</div>

<div class="rfm" id="loginanswer_row_{$loginhash}" style="display:none">
<table>
<tr>
<th>答案:</th>
<td><input type="text" name="answer" id="loginanswer_{$loginhash}" autocomplete="off" size="36" class="txt" tabindex="1" /></td>
</tr>
</table>
</div>

<div class="rfm">
<table>
<tr>
<th></th>
<td>
<p><label for="use_qqshow_bind"><input type="checkbox" name="use_qqshow" id="use_qqshow_bind" class="pc" value="1" checked="checked" tabindex="1" /> <span title="QQ秀將展示在論壇帖子左側和個人空間首頁">使用QQ秀形象</span></label></p>
</td>
</tr>
</table>
</div>
</div>
<div class="rfm mbw bw0">
<table>
<tr>
<th>&nbsp;</th>
<td><button class="pn pnc" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>綁定帳號</strong></button></td>
</tr>
</table>
</div>
</form>
</div>
<style type="text/css">
.loggingbox { width: 760px; margin: 40px auto 0; }
.loging_tit { border-bottom: 1px solid #CCC; _overflow:hidden; }
.ie_all .loging_tit { height:66px;}
.loggingbox .fm_box { border-bottom:0; padding: 20px 0; }
.loggingbox .welcome { font-size:14px; width:100%; line-height:30px;}
.loggingbox .welcome span { font-size:12px; }
.loggingbox .avt img { margin: 0 5px 5px 0; padding:0; border:0; width:60px; height:60px; }
.loggingbox .tb{ border-bottom: 0; margin-top: 0; padding-left: 0px; }
.loggingbox .tb a { background:#F6F6F6; padding:0 20px; }
.loggingbox .tb .a a { background:#FFF; }
</style>
<script type="text/javascript">

EOF;
 if($_G['setting']['regconnect']) { 
$return .= <<<EOF

$('reginfo_a').parentNode.className = '';
$('{$_G['setting']['reginput']['password']}').parentNode.parentNode.parentNode.parentNode.parentNode.style.display = 'none';
$('{$_G['setting']['reginput']['username']}').outerHTML += '{$js1}';
$('{$_G['setting']['reginput']['password']}').required = 0;
$('{$_G['setting']['reginput']['password2']}').parentNode.parentNode.parentNode.parentNode.parentNode.style.display = 'none';
$('{$_G['setting']['reginput']['password2']}').required = 0;
$('main_hnav').outerHTML = '{$js2}';
function connect_switch(op) {
$('returnmessage4').className='';
$('returnmessage4').innerHTML='';
if(op == 1) {
$('loginform_{$loginhash}').style.display='none';$('registerform').style.display='block';
$('connect_tab_1').className = 'a';
$('connect_tab_2').className = '';
//$('connect_login_register_tip').style.display = '';
//$('connect_login_bind_tip').style.display = 'none';

} else {
$('loginform_{$loginhash}').style.display='block';$('registerform').style.display='none';
$('connect_tab_2').className = 'a';
$('connect_tab_1').className = '';
//$('connect_login_register_tip').style.display = 'none';
//$('connect_login_bind_tip').style.display = '';
}
}
function connect_use_available(value) {
$('{$_G['setting']['reginput']['username']}').value = value;
checkusername(value);
}

EOF;
 if($_G['qc']['uinlimit']) { 
$return .= <<<EOF

$('registerformsubmit').disabled = true;

EOF;
 } if($_GET['action'] != 'activation') { 
$return .= <<<EOF

$('registerformsubmit').innerHTML = '<span>完成，繼續瀏覽</span>';

EOF;
 } } else { 
$return .= <<<EOF

$('layer_reginfo_t').innerHTML = '綁定已有帳號';

EOF;
 } if($_GET['action'] != 'activation') { if(!$_G['setting']['autoidselect']) { 
$return .= <<<EOF

simulateSelect('loginfield_{$loginhash}');

EOF;
 } } if($_G['setting']['regconnect'] && $_GET['ac'] != 'bind') { 
$return .= <<<EOF

function connect_get_user_info() {
var x = new Ajax();
x.get('connect.php?mod=user&op=get&hash={$__FORMHASH}&inajax=1&_r='+Math.random(), function(s){
var nick = s;
if(nick) {
document.getElementById('{$_G['setting']['reginput']['username']}').value = nick;
}
});
}
window.load=connect_get_user_info();

EOF;
 } 
$return .= <<<EOF

</script>

EOF;
?><?php return $return;?><?php }

function tpl_spacecp_profile_bottom() {
global $_G;?><?php
$__FORMHASH = FORMHASH;$return = <<<EOF

<script type="text/javascript">
function connect_handle_get_weibosign(response, ajax) {
// 返回值形如: errCode=XX&result=XX
if (typeof(response) == "string" && response.indexOf("&") > 0) {

var errCode = response.substring(0, response.indexOf("&"));
errCode = errCode.substring(errCode.indexOf("=") + 1);

var result = response.substring(response.indexOf("&") + 1);
result = result.substring(result.indexOf("=") + 1);

response = {"errCode" : errCode, "result" : result};
} else {
return false;
}

if (response.errCode == '0') {
seditor_insertunit('sightml', response.result);
} else {
// 請求失敗
showDialog('網絡繁忙，暫時無法使用騰訊微博簽名檔功能');
}
}

function connect_get_weibosign() {
var sign_url = '{$_G['siteurl']}connect.php?mod=config&op=weibosign&hash={$__FORMHASH}&_r='+Math.random();
var get_weibosign_ajax = Ajax("HTML", null);
get_weibosign_ajax.get(sign_url, connect_handle_get_weibosign);
}

if($('sightmlsml')) {
var a = document.createElement('a');
a.href = 'javascript:void(0);';
a.style.background = 'url(' + STATICURL + 'image/common/weibo.png) no-repeat 0 2px';
a.onmouseover = function () { showTip(this); };
a.onclick = connect_get_weibosign;
a.setAttribute('tip', '插入騰訊微博做為論壇簽名，可第一時間將您的微博最新信息展示給本站的會員和遊客');
$('sightmlsml').parentNode.appendChild(a);
}
</script>

EOF;
?><?php return $return;?><?php }?>