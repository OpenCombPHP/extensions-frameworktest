<?php 
namespace org\opencomb\frameworktest\testmvc\testviewwindow ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestViewWindow extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testMVC' => array(
					'template' => 'test-mvc/testviewwindow/TestViewWindow.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		
	}
}

