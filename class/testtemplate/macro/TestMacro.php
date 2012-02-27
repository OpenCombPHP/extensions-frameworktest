<?php
namespace org\opencomb\frameworktest\testtemplate\macro;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\opencomb\advertisement\Advertisement;

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
