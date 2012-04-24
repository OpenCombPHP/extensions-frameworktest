<?php
namespace org\opencomb\frameworktest\testtemplate\macro;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

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
 *  |{/ }功能
 *  |{/frameworktest:css/TestCss.css}
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

class PlatFormPathMacroCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:platFormPathMacroCase' => array(
				'template' => 'test-template/macro/PlatFormPathMacroCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		
		$sText="PlatForm{/ }宏功能测试：";
		$this->viewPlatFormPathMacroCase->variables()->set('sText',$sText);
			
	}
}

