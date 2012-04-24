<?php
namespace org\opencomb\frameworktest\testmvc\frame ;

use org\opencomb\coresystem\mvc\controller\FrontFrame;

class TestFrontFrame extends FrontFrame
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
