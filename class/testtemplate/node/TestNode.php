<?php
namespace org\opencomb\frameworktest\testtemplate\node;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\opencomb\advertisement\Advertisement;

class TestNode extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:testNode' => array(
				'template' => 'test-template/node/TestNode.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	

	}
}
