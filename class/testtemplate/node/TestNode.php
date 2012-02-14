<?php
namespace org\opencomb\frameworktest\testtemplate\node;

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
 * @example /模板引擎/标签/自定义标签:name[1]
 *
 *  通过if标签编译器的代码演示如何编写一个标签编译器
 */

class TestNode extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:breakCase' => array(
				'template' => 'test-template/node/TestNode.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	

	}
}
