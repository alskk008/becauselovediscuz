<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('extgroups');?><?php include template('common/header'); $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?><div style="width:140px">
<ul class="mbn">
<li class="hm"><?php echo profile_node_star($_G['group'], '', '', 0); ?></li>
<?php if($group) { ?>
<li class="hm mtn"><?php echo profile_node_upgradeprogress($group, '', '', 0); ?></li>
<li class="hm">
距離下一級還需<p class="xi1"><?php echo $upgradecredit;?> 積分</p>
</li>
<?php } if($_G['member']['adminid'] > 0) { ?>
<li class="hm mtn">管理級別: <?php if($_G['member']['adminid'] == 1) { ?>管理員
<?php } elseif($_G['member']['adminid'] == 2) { ?>超級版主
<?php } elseif($_G['member']['adminid'] == 3) { ?>版主
<?php } ?>
</li>
<?php } ?>
</ul>
<?php if($extgroupids) { ?>
<ul class="btda ptn mbn pbn extg">
<li><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $_G['member']['groupid'];?>"><?php echo $_G['group']['grouptitle'];?></a></li><?php if(is_array($extgroupids)) foreach($extgroupids as $extgid) { ?><li><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $extgid;?>"><?php echo $_G['cache']['usergroups'][$extgid]['grouptitle'];?></a></li>
<?php } ?>
</ul>
<?php } if($_G['setting']['buyusergroupexists']) { ?>
<div onclick="location.href='home.php?mod=spacecp&ac=usergroup&do=list'" class="xi2 ptn pbn btda" align="right"><label>購買用戶組&raquo;</label></div>
<?php } ?>
</div><?php include template('common/footer'); ?>