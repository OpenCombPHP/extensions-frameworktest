<?php 
namespace org\opencomb\frameworktest\testDB\testquery;

use org\opencomb\platform\ext\Extension;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\jecat\framework\db\DB;
use org\jecat\framework\db\sql\Restriction;
use org\jecat\framework\db\sql\Criteria;
use org\jecat\framework\db\sql\Table;
use org\jecat\framework\db\sql\Select;
use org\jecat\framework\db\sql\StatementState;

class TestSelectWhere extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view:testQuery' => array(
					'template' => 'testDB/testquery/TestSelectWhere.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$sSql1 = $this->setupSelect();
// 		$sSql2 = $this->setupWhere();
// 		$sSql3 = $sSql1.$sSql2;
// 		echo $sSql1;
// 		echo $sSql2;
		$aDB = DB::singleton();
		$aRecordset = $aDB->query($sSql1);
		$arr = array();
		foreach($aRecordset as $v)
		{
			$arr[]=$v;
		}
		var_dump($arr);
		
	}
	
	public function setupSelect() {
		$sTableName = "frameworktest_userinfo";
		$aSelect = new Select($sTableName);
		$aSelect->setCriteria($this->setupWhere());
		$a = new StatementState();
		return $aSelect->makeStatement($a);
	}
	
	public function setupRestriction() {
		$sClmName="sex";
		$value="男";
		$aRestriction = new Restriction();
		return $aRestriction->eq($sClmName, $value);
		
	}
	
	public function setupWhere() {
		$aState = new StatementState();
		$aCriteria = new Criteria();
		return $aCriteria->setWhere($this->setupRestriction());	
		
	}
}
