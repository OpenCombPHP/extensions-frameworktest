<?php 
namespace org\opencomb\frameworktest\testtemplate ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

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
		$arrAdvertisement=array();
		$this->viewTesttemplate->variables()->set('arrAdvertisement',$arrAdvertisement);
	}
}

