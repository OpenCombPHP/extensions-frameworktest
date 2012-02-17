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
 *  |<while>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |while判断条件为true时情况
 *  |<while '$i<6' >{=$i++}</while>
 *  |显示"12345"
 *  |显示"12345"
 *  | 
 *  |---
 *  |while判断条件为false时情况
 *  |<while false>while false</while>
 *  |
 *  |
 *  | 
 *  |---
 *  |测试while单行函数的功能
 *  |<while '$j<6' />{=$j++}<while:end/>
 *  |显示"12345"
 *  |显示"12345"
 *  |
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过while标签编译器的代码演示如何编写一个标签编译器
 */

class WhileCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:whileCase' => array(
				'template' => 'test-template/node/WhileCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="while功能测试：";
	}
}
