<?php 
namespace org\opencomb\frameworktest\testDB\testexecute;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestExecute extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testExecute' => array(
					'template' => 'testDB/testexecute/TestExecute.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
	}
}

