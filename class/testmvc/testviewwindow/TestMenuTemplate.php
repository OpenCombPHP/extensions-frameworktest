<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestMenuTemplate extends ControlPanel
{
	public function createBeanConfig()
	{	
		$arrBean = array(
			'view:ViewNode' => array(
					'template' => 'test-mvc/testview/TestMenuTemplate.html' ,
					'class' => 'view' ,
			),										
		);
		return $arrBean;
	}
	
	public function process()
	{	
	}
	
}

