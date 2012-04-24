<?php 
namespace org\opencomb\frameworktest\testDB ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestDB extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testDB' => array(
					'template' => 'testDB/TestDB.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
	}
}

