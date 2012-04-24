<?php
namespace org\opencomb\frameworktest\testtemplate\node;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

/**
 * @wiki /模板引擎/测试标签
 *
 * {|
 *  !标签
 *  !功能
 *  |---
 *  |<break>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |break终止循环
 *  |<break />
 *  |显示"第一次循环"
 *  |显示"第一次循环"
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试标签/测试程序:name[1]
 *
 *  通过break标签编译器的代码演示如何编写一个标签编译器
 */

class BreakCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:breakCase' => array(
				'template' => 'test-template/node/BreakCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$arrA=array(0=>'第一次循环',1=>'第二次循环',2=>'第三次循环',3=>'第四次循环');
		$sText="Break功能测试：";
		$this->viewBreakCase->variables()->set('arrA',$arrA);
		$this->viewBreakCase->variables()->set('sText',$sText);
			
	}
}

