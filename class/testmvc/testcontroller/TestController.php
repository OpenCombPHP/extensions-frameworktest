<?php
namespace org\opencomb\frameworktest\testmvc\testcontroller ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestController extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '测试控制器',
			'view:testController'=>array(
				'template'=>'test-mvc/testcontroller/TestController.html',
				'class'=>'view',
			),
		);
	}
	
	public function process()
	{
	}	
}
