<?php
namespace org\opencomb\frameworktest\testmvc\testcontroller ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestControllerChildAuthorInfo extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'title'=>'子控制器作者信息',
			'view:TestControllerChildAuthorInfo' => array(
					'template' => 'test-mvc/testcontroller/TestControllerChildAuthorInfo.html' ,
					'class' => 'view',
					'model'=>'authorinfo', 
					),
			'model:authorinfo'=>array(
					'class'=>'model',
					'list'=>true,
					'orm'=>array(
						'limit'=>20,
						'table'=>'authorinfo',	
					)
			)
		);

		
		return $arrBean;
	}
	
	public function process()
	{
		$this->modelAuthorinfo->load();
	}	
}
