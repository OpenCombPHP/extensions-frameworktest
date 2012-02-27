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
 *  |<loop>
 *  |循环语句，属性start 可选 int/exp 开始值 例start='2',默认 0,属性end 必须  int/exp 结束值  例end='6',属性step 可选 int/exp 步长 例step='2'   ,默认 1''
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试属性end的功能
 *  |<loop end='5'></loop>
 *  |显示aaaaaa
 *  |显示aaaaaa 
 *  |---
 *  |测试start的功能
 *  |<if start='-1' end='5'></loop>
 *  |显示aaaaaaa
 *  |显示aaaaaaa
 *  |---
 *  |测试step的功能
 *  |<if start='-1' end='5' step='2'></loop>
 *  |显示aaaa
 *  |显示aaaa
 *  |---
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[2]
 *
 *  通过loopelse标签编译器的代码演示如何编写一个标签编译器
 */

class LoopElseCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:loopElseCase' => array(
				'template' => 'test-template/node/LoopElseCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="LoopElse功能测试：";
		$this->viewLoopElseCase->variables()->set('sText',$sText);
	}
}
