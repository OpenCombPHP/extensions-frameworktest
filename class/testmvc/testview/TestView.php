<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

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
