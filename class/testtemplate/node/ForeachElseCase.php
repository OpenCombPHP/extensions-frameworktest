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
 *  |<foreac:else>
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
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过foreachelse标签编译器的代码演示如何编写一个标签编译器
 */

class ForeachElseCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:foreachElseCase' => array(
				'template' => 'test-template/node/ForeachElseCase.html' ,
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

