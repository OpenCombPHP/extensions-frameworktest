<?php 
namespace org\opencomb\frameworktest\testmvc ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

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

