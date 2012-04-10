<?php 
namespace org\opencomb\frameworktest\testmvc\testviewwindow ;

use org\jecat\framework\verifier\Length;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

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
