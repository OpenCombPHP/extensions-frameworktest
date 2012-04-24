<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestModel extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:hasOne'=>array(
				'template'=>'test-mvc/testmodel/TestModel.html',
				'class'=>'view',
			),
		);
	}
	
	public function process()
	{
		
	}
}
