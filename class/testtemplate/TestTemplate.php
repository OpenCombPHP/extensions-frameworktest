<?php 
namespace org\opencomb\frameworktest\testtemplate ;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

class TestTemplate extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testtemplate' => array(
					'template' => 'test-template/TestTemplate.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		echo "dddddd";
		$arrAdvertisement=array();
		$this->viewTesttemplate->variables()->set('arrAdvertisement',$arrAdvertisement);
	}
}
