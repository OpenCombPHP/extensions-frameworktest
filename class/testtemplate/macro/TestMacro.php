<?php
namespace org\opencomb\frameworktest\testtemplate\macro;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestMacro extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:testMacro' => array(
				'template' => 'test-template/macro/TestMacro.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sCycle="{@ }";
		$sEval="{? }";
		$sPath="{/*.}";
		$sPlatPath="{/ }";
		$sPrint="{= }";
		$this->viewTestMacro->variables()->set('sCycle',$sCycle);
		$this->viewTestMacro->variables()->set('sEval',$sEval);
		$this->viewTestMacro->variables()->set('sPath',$sPath);
		$this->viewTestMacro->variables()->set('sPlatPath',$sPlatPath);
		$this->viewTestMacro->variables()->set('sPrint',$sPrint);
	}
}

