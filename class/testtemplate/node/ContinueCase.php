<?php
namespace org\opencomb\frameworktest\testtemplate\node;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\opencomb\advertisement\Advertisement;
/**
 * @wiki /模板引擎/测试标签
 *
 * {|
 *  !标签
 *  !功能
 *  |---
 *  |<continue>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |Continue退出3层循环继续执行
 *  |<continue '3' /> 
 *  |显示TestIndex.html的内容
 *  |显示TestIndex.html的内容
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过continue标签编译器的代码演示如何编写一个标签编译器
 */

class ContinueCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:continueCase' => array(
				'template' => 'test-template/node/ContinueCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="Continue功能测试：";
		$arrA=array(0=>'第一次循环A',1=>'第二次循环A',2=>'第三次循环A');
		$arrB=array(0=>'第一次循环B',1=>'第二次循环B',2=>'第三次循环B');
		$arrC=array(0=>'第一次循环C',1=>'第二次循环C',2=>'第三次循环C');
		$this->viewContinueCase->variables()->set('arrA',$arrA);
		$this->viewContinueCase->variables()->set('arrB',$arrB);
		$this->viewContinueCase->variables()->set('arrC',$arrC);
		$this->viewContinueCase->variables()->set('sText',$sText);
			
			
	}
}
