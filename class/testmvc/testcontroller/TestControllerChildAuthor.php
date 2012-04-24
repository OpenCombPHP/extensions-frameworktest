<?php
namespace org\opencomb\frameworktest\testmvc\testcontroller ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestControllerChildAuthor extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'title'=>'子控制作者',
			'view:TestControllerChildAuthor' => array(
					'template' => 'test-mvc/testcontroller/TestControllerChildAuthor.html' ,
					'class' => 'view',
					'model'=>'author', 
					),
			'model:author'=>array(
					'class'=>'model',
					'list'=>true,
					'orm'=>array(
						'limit'=>20,
						'table'=>'author',	
					)
			)
		);

		
		return $arrBean;
	}
	
	public function process()
	{
		$this->modelAuthor->load();
	}	
}
