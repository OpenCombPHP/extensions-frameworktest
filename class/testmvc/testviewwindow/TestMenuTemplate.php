<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\jecat\framework\verifier\Length;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

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
