<?php 
namespace org\opencomb\frameworktest\testmvc ;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

class TestMVC extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testMVC' => array(
					'template' => 'test-mvc/TestMVC.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$arrAdvertisement=array();
		$this->viewTestMVC->variables()->set('arrAdvertisement',$arrAdvertisement);
	}
}
