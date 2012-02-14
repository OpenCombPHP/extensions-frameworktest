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
 *  |<dowhile>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试先执行do
 *  |<dowhile '$i>5' >{=$i++}</dowhile>
 *  |显示"0"
 *  |显示"0"
 *  |$i初始值为0
 *  |---
 *  |测试dowhile循环
 *  |<dowhile '$i<5' >{=$i++}</dowhile>
 *  |显示"01234"
 *  |显示"01234"
 *  |$i初始值为0
 *  |---
 *  |测试dowhile单行函数的使用
 *  |<dowhile '$i<5' />{=$i++}<dowhile:end/>
 *  |显示"5"
 *  |显示"5"
 *  |$i值为4
 *  |---
 *  |}
 */
/**
 * @example /模板引擎/标签/自定义标签:name[1]
 *
 *  
 */

class DoWhileCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:doWhileCase' => array(
				'template' => 'DoWhileCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="DoWhile功能测试：";
	}
}
