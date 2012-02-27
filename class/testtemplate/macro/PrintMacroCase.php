<?php
namespace org\opencomb\frameworktest\testtemplate\macro;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\opencomb\advertisement\Advertisement;
/**
 * @wiki /模板引擎/测试宏
 *
 * {|
 *  !宏
 *  !功能
 *  |---
 *  |{= }
 *  |输出{= }宏中的内容
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |{= }功能
 *  |{=$nNumber}{=$sA}{=$bBool}{=$arrA}{=$fPrice}
 *  |显示1234字符串1Array2.55
 *  |显示1234字符串1Array2.55
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试宏/自定义标签:name[1]
 *
 *  通过{@}标签编译器的代码演示如何编写一个标签编译器
 */

class PrintMacroCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:printMacroCase' => array(
				'template' => 'test-template/macro/PrintMacroCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$nNumber=1234;
		$sA="字符串";
		$bBool=true;
		$arrA=array(0=>'第一次循环',1=>'第二次循环',2=>'第三次循环',3=>'第四次循环');
		$fPrice=2.55;
		$sText="{= }宏功能测试：";
		$this->viewPrintMacroCase->variables()->set('nNumber',$nNumber);
		$this->viewPrintMacroCase->variables()->set('sA',$sA);
		$this->viewPrintMacroCase->variables()->set('bBool',$bBool);
		//$this->viewPrintMacroCase->variables()->set('aCar',$aCar);
		$this->viewPrintMacroCase->variables()->set('arrA',$arrA);
		$this->viewPrintMacroCase->variables()->set('fPrice',$fPrice);
		$this->viewPrintMacroCase->variables()->set('sText',$sText);
			
	}
}
