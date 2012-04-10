<?php 
namespace org\opencomb\frameworktest\testDB\testquery;

use org\opencomb\platform\ext\Extension;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\jecat\framework\db\DB;

class TestQuery extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testQuery' => array(
					'template' => 'testDB/testquery/TestQuery.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
	}
}
