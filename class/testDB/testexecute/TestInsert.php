<?php 
namespace org\opencomb\frameworktest\testDB\testdriver;

use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\db\DB;

class TestInsert extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testDriver' => array(
					'template' => 'testDB/testdriver/TestDriver.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$arr=$this->TestDriverTable();
		var_dump($arr);
	}
	
	public function TestInsert() {
		$aDB = DB::singleton();
		$aRecordset = $aDB->query("select * from frameworktest_userinfo");
		//$arr = $aRecordset->current();
		$arr = array();
		foreach($aRecordset as $v)
		{
			$arr[] = $v; 	
		}
		return $arr;
	}
}

