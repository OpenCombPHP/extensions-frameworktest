<?php 
namespace org\opencomb\frameworktest\testDB ;

use org\opencomb\platform\ext\Extension;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

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
