<?php /* @var $this Controller */ ?>
<?php $baseUrl = Yii::app()->request->baseUrl; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/static/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/static/css/form.css" />
    
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo $baseUrl; ?>/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo $baseUrl; ?>/wlwmanifest.xml" />
    <link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo $baseUrl; ?>/rss.php" />
	<script src="<?php echo $baseUrl; ?>/static/js/common_tpl.js" type="text/javascript"></script>
</head>

<body>

<div id="wrap">

	<div id="header">
        <h1><a href="<?php echo $baseUrl; ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a></h1>
        <h3>美好的生活需要用心记录<?php //echo $bloginfo; ?></h3>
	</div><!-- header -->
    
    <div id="banner"><img src="<?php echo $baseUrl; ?>/static/images/top/default.jpg<?php //echo Option::get('topimg'); ?>" height="134" width="960" /></div>

	<div id="nav">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'首页', 'url'=>array('/site/index')),
				array('label'=>'碎语', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'管理', 'url'=>array('/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- nav -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
