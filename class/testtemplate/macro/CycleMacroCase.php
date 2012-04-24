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
 *  |{@ }
 *  |每次只输出一个{@}宏中的内容，按顺序
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |{@}功能
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

class CycleMacroCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:cycleMacroCase' => array(
				'template' => 'test-template/macro/CycleMacroCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$arrA=array(0=>'第一次循环',1=>'第二次循环',2=>'第三次循环',3=>'第四次循环');
		$arrB=array(1,2,3);
		$sText="{@ }宏功能测试：";
		$this->viewCycleMacroCase->variables()->set('arrA',$arrA);
		$this->viewCycleMacroCase->variables()->set('arrB',$arrB);
		$this->viewCycleMacroCase->variables()->set('sText',$sText);
			
	}
}

