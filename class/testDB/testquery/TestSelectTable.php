<?php 
namespace org\opencomb\frameworktest\testDB\testquery;

use org\opencomb\platform\ext\Extension;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\jecat\framework\db\DB;
use org\jecat\framework\db\sql\Table;
use org\jecat\framework\db\sql\Select;
use org\jecat\framework\db\sql\StatementState;

class TestSelectTable extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testQuery' => array(
					'template' => 'testDB/testquery/TestSelectTable.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$aDB = DB::singleton();
		$aRecordset = $aDB->query($this->selectSingleTable());
		$arr = array();
		foreach($aRecordset as $v)
		{
			$arr[]=$v;
		}
		var_dump($arr);
		
	}
	
	public function selectSingleTable() {
		$sTableName = "frameworktest_userinfo";
		$aSelect = new Select($sTableName);
		$a = new StatementState();
		$s = $aSelect->makeStatement($a);
		return $s;
	}
}
