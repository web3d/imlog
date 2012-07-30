<?php $baseUrl = Yii::app()->request->baseUrl; ?>
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="login-main">
	<div class="login-top"></div>
	<div class="login-logo"><img src="<?php echo $baseUrl;?>/static/images/login_logo.png" width="294" height="68" /></div>


	<div class="login-input">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

    <div class="login-button">
	<div class="checkbox"><?php echo $form->checkBox($model,'rememberMe'); ?>
        <span><?php echo $form->labelEx($model,'rememberMe'); ?></span></div>
	<div class="button"><?php echo CHtml::submitButton('登 录'); ?></div>
	</div>
	

    <div style=" clear:both;"></div>
	<div class="login-bottom"></div>
	<div class="back"><a href="<?php echo Yii::app()->homeUrl;?>">&laquo;返回首页</a></div>
</div><!-- form -->
<?php $this->endWidget(); ?>