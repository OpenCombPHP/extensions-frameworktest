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
 *  |<clear/>
 *  |输出一个空格和一个回车
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试标签<clear/>的功能
 *  |<pre>a<clear/>  b</pre>
 *  |a和b在同一行，并且没有空格
 *  |a和b在同一行，没有空格
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过clear标签编译器的代码演示如何编写一个标签编译器
 */

class ClearCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:clearCase' => array(
				'template' => 'test-template/node/ClearCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="ClearCase功能测试：";
		$this->viewClearCase->variables()->set('sText',$sText);
	}
}
