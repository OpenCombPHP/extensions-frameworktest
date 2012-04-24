<?php 
namespace org\opencomb\frameworktest\testmvc\testviewwindow ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestMenuWidget extends ControlPanel
{
	public function createBeanConfig()
	{	
		$arrBean = array(
			'view:viewNode' => array(
					'template' => 'test-mvc/testviewwindow/TestMenuWidget.html' ,
					'class' => 'view' ,
			),										
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$this->viewViewNode->xpath();
	}
	
}

