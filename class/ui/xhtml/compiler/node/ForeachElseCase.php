<?php
namespace org\opencomb\frameworktest\ui\xhtml\compiler\node;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\opencomb\advertisement\Advertisement;
/**
 * @wiki /模板引擎/标签
 *
 * {|
 *  !标签
 *  !功能
 *  |---
 *  |<foreach>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试for为空数组时,<foreach:else/>的功能
 *  |<foreach ><foreach:else/></foreach>
 *  |显示"数组内无元素"
 *  |显示"数组内无元素"
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/标签/自定义标签:name[1]
 *
 *  通过if标签编译器的代码演示如何编写一个标签编译器
 */

class ForeachElseCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:foreachElseCase' => array(
				'template' => 'ForeachElseCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$arrB=array();
		$sText="ForeachElse功能测试：";
		$this->viewForeachElseCase->variables()->set('arrB',$arrB);
		$this->viewForeachElseCase->variables()->set('sText',$sText);
			
	}
}
