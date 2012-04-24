<?php
namespace org\opencomb\frameworktest\testtemplate\node;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

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

