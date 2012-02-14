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
 *  |<foreach>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试foreach成对写法的功能
 *  |<foreach ></foreach>
 *  |显示"第一次循环 第二次循环"
 *  |显示"第一次循环 第二次循环"
 *  | 
 *  |---
 *  |测试foreach单行写法的功能
 *  |<foreach /><foreach:end/>
 *  |显示"第一次循环 第二次循环"
 *  |显示"第一次循环 第二次循环"
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/标签/自定义标签:name[1]
 *
 *  通过if标签编译器的代码演示如何编写一个标签编译器
 */

class ForeachCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:foreachCase' => array(
				'template' => 'test-template/node/ForeachCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$arrA=array(0=>'第一次循环',1=>'第二次循环');
		$arrC=array('aa'=>'第一次循环','bb'=>'第二次循环');
		$arrB=array();
		$sText="Foreach功能测试：";
		$this->viewForeachCase->variables()->set('arrA',$arrA);
		$this->viewForeachCase->variables()->set('arrB',$arrB);
		$this->viewForeachCase->variables()->set('arrC',$arrC);
		$this->viewForeachCase->variables()->set('sText',$sText);
			
	}
}
