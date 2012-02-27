<?php
namespace org\opencomb\frameworktest\testtemplate\node;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\opencomb\advertisement\Advertisement;

class DoElseCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:doElseCase' => array(
				'template' => 'test-template/node/DoElseCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$arrA=array(0=>'第一次循环',1=>'第二次循环',2=>'第三次循环',3=>'第四次循环');
		$sText="DoElse功能测试：";
		$this->viewDoElseCase->variables()->set('arrA',$arrA);
		$this->viewDoElseCase->variables()->set('sText',$sText);
			
	}
}
