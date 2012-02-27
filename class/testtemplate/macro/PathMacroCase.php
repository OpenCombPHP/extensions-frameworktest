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
 *  |{/ }
 *  |显示url
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |{/}功能
 *  |<loop start='1' end='5'>{@ 1,2}</loop>
 *  |显示"1 2 1 2 1"
 *  |显示"1 2 1 2 1"
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试宏/自定义标签:name[1]
 *
 *  通过{@}标签编译器的代码演示如何编写一个标签编译器
 */

class PathMacroCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:pathMacroCase' => array(
				'template' => 'test-template/macro/PathMacroCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		
		$sText="{/ }宏功能测试：";
		$this->viewPathMacroCase->variables()->set('sText',$sText);
			
	}
}
