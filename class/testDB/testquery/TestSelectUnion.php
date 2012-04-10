<?php 
namespace org\opencomb\frameworktest\testDB\testquery;

use org\opencomb\platform\ext\Extension;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\jecat\framework\db\DB;
use org\jecat\framework\db\sql\Union;
use org\jecat\framework\db\sql\Table;
use org\jecat\framework\db\sql\Select;
use org\jecat\framework\db\sql\StatementState;

class TestSelectUnion extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testQuery' => array(
					'template' => 'testDB/testquery/TestSelectUnion.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
 		$a = new StatementState();
		$sTableNameA = "frameworktest_author";
		$aSelectA = new Select($sTableNameA);
		$aSelectA->addColumn("author");
		$sTableNameB = "frameworktest_book";
		$aSelectB = new Select($sTableNameB);
		$aSelectB->addColumn("bookname");
		$aSelectB -> addColumn("bid");
//		echo $aSelectA->makeStatement($a);
 		$aSelectUnion = new Union();
 		$aU = $aSelectUnion->unionSelect($aSelectA,$aSelectB);
 		var_dump($aU);
		$aDB = DB::singleton();
// 		$aRecordset = $aDB->query("select author from frameworktest_author union select bookname from frameworktest_book");
// 		$aRecordset = $aDB->query($aSelectB->makeStatement($a));
// // 		$arr = array();
// // 		foreach($aRecordset as $v)
// // 		{
// // 			$arr[]=$v;
// // 		}
// // 		var_dump($arr);
		
	}
	
// 	public function selectSingleTable() {
// 		$sTableName = "frameworktest_userinfo";
// 		$aSelect = new Select($sTableName);
// 		$a = new StatementState();
// 		$s = $aSelect->makeStatement($a);
// 		return $s;
// 	}
}
