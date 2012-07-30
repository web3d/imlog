<?php

class AdminModule extends CWebModule
{
    private $_assetsUrl;
    
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			if(Yii::app()->user->isGuest)
                Yii::app()->request->redirect(Yii::app()->createurl('/site/login'));
            
			return true;
		}
		else
			return false;
	}
    

  
    public function getAssetsUrl()  
    {  
        if($this->_assetsUrl===null)  
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(
                    Yii::getPathOfAlias('admin.assets'));  
        return $this->_assetsUrl;  
    }  
  
    public function setAssetsUrl($value)  
    {  
        $this->_assetsUrl=$value;  
    }  
}
