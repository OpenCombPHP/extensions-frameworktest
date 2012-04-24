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
 *  |<nl/>
 *  |输出一个空格和一个回车
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试标签<nl/>的功能
 *  |<resrc /> <script src="frameworktest:js/testscript.js" ></script><script src="advertisement:js/testscript.js" ></script>
 *  |显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  |显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  | 
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过nl标签编译器的代码演示如何编写一个标签编译器
 */

class NlCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:nlCase' => array(
				'template' => 'test-template/node/NlCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="NlCase功能测试：";
		$this->viewNlCase->variables()->set('sText',$sText);
	}
}

