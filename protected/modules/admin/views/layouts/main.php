<?php /* @var $this Controller */ ?>
<?php $baseUrl = Yii::app()->request->baseUrl; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?> - 管理中心</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/main.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/static/css/form.css" />
    
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo $baseUrl; ?>/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo $baseUrl; ?>/wlwmanifest.xml" />
    <link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo $baseUrl; ?>/rss.php" />
	<script src="<?php echo $baseUrl; ?>/static/js/common_tpl.js" type="text/javascript"></script>
</head>

    <body><?php define('ROLE', 'admin');?>
<div class="center">
<table id=header cellspacing=0 cellpadding=0 width="988" border=0>
  <tbody>
  <tr>
    <td width="9" id="headerleft"></td>
    <td width="125"  class="logo" align="left"><a href="./" title="返回管理首页">emlog</a></td>
    <td class="vesion" width="20"><?php //echo Option::EMLOG_VERSION; ?></td>
    <td  class="home" align="left"><a href="../" target="_blank" title="在新窗口浏站点">
    <?php 
    	/*$blog_name = Option::get('blogname');
    	if (empty($blog_name)) {
    		$blog_name = '查看站点';
    	}
    	echo subString($blog_name, 0, 60);*/
    ?>
    </a></td>
    <td align=right nowrap class="headtext">
    <?php if (ROLE == 'admin'):?>
	你好，<a href="./blogger.php"><?php //echo $user_cache[UID]['name'] ?>
	<img src="<?php //echo empty($user_cache[UID]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[UID]['avatar'] ?>" 
	align="top" height="20" width="20" style="border:1px #FFFFFF solid;" />
	</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="configure.php"><img src="./views/images/setting.gif" align="absmiddle" border="0"> 设置</a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<a href="template.php" ><img src="./views/images/skin.gif" align="absmiddle" border="0"> 换模板</a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php else:?>
	<a href="blogger.php"><img src="./views/images/setting.gif" align="absmiddle" border="0"> 设置</a>&nbsp;&nbsp;|&nbsp;&nbsp;
	<?php endif;?>
	<a href="./?action=logout">退出</a>
	</td>
    <td width="9" id="headerright" ></td>
	</tbody>
</table>
<table cellspacing=0 cellpadding=0 width="100%" border=0>
<tbody >
  <tr>
    <td valign=top align=left width="114">
    <div id=sidebartop></div>
	<table cellspacing=0 cellpadding=0 width="100%" border=0>
        <tbody>
        <tr>
          <td valign=top align=left width="114">
              <div id="sidebar">
              <?php $this->widget('zii.widgets.CMenu',array(
                  'activeCssClass' => 'active',
                  'activateParents' => true,
			'items'=>array(
                array('label'=>'日志管理', 'items'=>array(
                    array('label'=>'写日志', 'url'=>array('/admin/blog/write')),
                    array('label'=>'草稿', 'url'=>array('/admin/blog/listDraft')),
                    array('label'=>'日志', 'url'=>array('/admin/blog')),
                    array('label'=>'标签', 'url'=>array('/admin/tag')),
                    array('label'=>'分类', 'url'=>array('/admin/category')),
                    array('label'=>'评论', 'url'=>array('/admin/comment')),
                    array('label'=>'引用', 'url'=>array('/admin/trackback')),
                )),
                array('label'=>'站点管理', 'items'=>array(
                    array('label'=>'Widgets', 'url'=>array('/admin/widget')),
                    array('label'=>'页面', 'url'=>array('/admin/blog/listPage')),
                    array('label'=>'用户', 'url'=>array('/admin/user')),
                    array('label'=>'数据', 'url'=>array('/admin/data')),
                )),
			),
		)); ?>
            
			</div>
			</td>
		  </tr>
		</tbody>
	</table>
	
	<div id="sidebarBottom"></div>
</td>
<td id=container valign=top align=left>
<?php echo $content; //doAction('adm_main_top'); ?>
<script>
$("#blog_mg").css('display', $.cookie('em_blog_mg') ? $.cookie('em_blog_mg') : '');
$("#log_mg").css('display', $.cookie('em_log_mg') ? $.cookie('em_log_mg') : '');
$("#extend_mg").css('display', $.cookie('em_extend_mg') ? $.cookie('em_extend_mg') : '');
</script>
    
</body>
</html>
