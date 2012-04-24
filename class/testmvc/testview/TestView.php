<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestView extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testMVC' => array(
					'template' => 'test-mvc/testview/TestView.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		
	}
}

