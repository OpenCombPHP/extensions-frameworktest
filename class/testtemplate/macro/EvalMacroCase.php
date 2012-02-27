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
 *  |{@ }
 *  |每次只输出一个{@}宏中的内容，按顺序
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |{? }功能
 *  |{? var_dump(array()}
 *  |显示数组类型
 *  |显示数组类型
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试宏/自定义标签:name[1]
 *
 *  通过{@}标签编译器的代码演示如何编写一个标签编译器
 */

class EvalMacroCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:evalMacroCase' => array(
				'template' => 'test-template/macro/EvalMacroCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$arrA=array(0=>'第一次循环',1=>'第二次循环',2=>'第三次循环',3=>'第四次循环');
		$arrB=array(1,2,3);
		$sA="字符串";
		$sText="{? }宏功能测试：";
		$this->viewEvalMacroCase->variables()->set('arrA',$arrA);
		$this->viewEvalMacroCase->variables()->set('arrB',$arrB);
		$this->viewEvalMacroCase->variables()->set('sA',$sA);
		$this->viewEvalMacroCase->variables()->set('sText',$sText);
			
	}
}
