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
 *  |<script>
 *  |java脚本的使用标签
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试附属标签<resrc>的功能
 *  |<resrc /> <script src="frameworktest:js/testscript.js" ></script><script src="advertisement:js/testscript.js" ></script>
 *  |显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  |显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  | 
 *  |---
 *  |测试附属标签<resrc>的功能
 *  |<script src="frameworktest:js/testscript.js" ></script><script src="advertisement:js/testscript.js" ></script>
 *  |不显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  |不显示“hello 这是当前扩展,Frameworktest hello 这是非当前扩展，Advertisemen”
 *  |
 *  |---
 *  |测试属性type的功能,当type的value为宏
 *  |<script type="{=$sType}"></script>
 *  |不显示“heloo 这是宏Type”
 *  |不显示“heloo 这是宏Type”
 *  |
 *  |---
 *  |测试属性type的功能
 *  |<script type="text/javascript"></script>
 *  |不显示“heloo 这是正常标签Type”
 *  |不显示“heloo 这是正常标签Type”
 *  |
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过script标签编译器的代码演示如何编写一个标签编译器
 */

class CssCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:cssCase' => array(
				'template' => 'test-template/node/CssCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="CssCase功能测试：";
		$sType="text/javascript";
		$this->viewCssCase->variables()->set('sType',$sType);
		$this->viewCssCase->variables()->set('sText',$sText);
	}
}

