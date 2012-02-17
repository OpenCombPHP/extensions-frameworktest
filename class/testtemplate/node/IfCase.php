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
 *  |<if>
 *  |判断语句，判断条件为true则执行，判断条件为false则不执行
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试if判断条件为真的操作
 *  |<if true>显示的内容</if>
 *  |显示true
 *  |显示true 
 *  |
 *  |---
 *  |测试if判断条件为假的操作
 *  |<if !false>显示的内容</if>
 *  |显示false
 *  |显示false
 *  |
 *  |---
 *  !标签
 *  !功能
 *  |---
 *  |<else/>
 *  |当if为false时，执行的条件
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试else判断的操作
 *  |<if false><else/>显示的内容</if>
 *  |显示else
 *  |显示else  
 *  |
 *  |---
 *  !标签
 *  !功能
 *  |---
 *  |<elseif >
 *  |再判断的执行语句
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试elseif的功能
 *  |<if fase><elseif true>显示的内容/elseif></if>
 *  |显示elseif
 *  |显示elseif  
 *  |
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[2]
 *
 *  通过if标签编译器的代码演示如何编写一个标签编译器
 */

class IfCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:ifCase' => array(
				'template' => 'test-template/node/IfCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="If功能测试：";
		$bTrue=true;
		$bFalse=false;
		$this->viewIfCase->variables()->set('bTrue',$bTrue);
		$this->viewIfCase->variables()->set('bFalse',$bFalse);
		$this->viewIfCase->variables()->set('sText',$sText);
	}
}
