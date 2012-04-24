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
 *  |<code/>
 *  |输出一个空格和一个回车
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试标签<code/>的功能
 *  |<resrc /> <script src="frameworktest:js/testscript.js" ></script><script src="advertisement:js/testscript.js" ></script>
 *  |显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  |显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过code标签编译器的代码演示如何编写一个标签编译器
 */

class CodeCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:codeCase' => array(
				'template' => 'test-template/node/CodeCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="CodeCase功能测试：";
		$this->viewCodeCase->variables()->set('sText',$sText);
	}
}

