<?php

class CategoryController extends AdminController
{
	public function actionIndex()
	{
        $model=new BlogCategory();
        /*$criteria=new CDbCriteria(array(
			//'condition'=>'status=' . Post::STATUS_PUBLISHED,
			'order'=>'axis DESC',
		));
		
		$dataProvider=new CActiveDataProvider('BlogCategory', array(
			'pagination'=>array(
				'pageSize'=> 20,
			),
			'criteria'=>$criteria,
		));
*/
		$this->render('index',array(
			//'dataProvider'=>$dataProvider,
            'model'=>$model,
		));
        //$categories = BlogCategory::model()->findAll();
		//$this->render('index');
	}
    
    public function actionTaxis(){
        
    }
    
    public function actionAdd() {
        
    }

    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}