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
 *  |<script>和<js>
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
 *  |---
 *  |测试属性ignore的功能
 *  |<script src="/extensions/frameworktest/0.1/public/js/testscriptIgnore.js" ignore="true"></script>
 *  |显示“这是ignore属性为true”
 *  |显示“这是ignore属性为true”
 *  |
 *  |---
 *  |测试属性ignore的功能
 *  |<script src="/extensions/frameworktest/0.1/public/js/testscriptIgnore.js" ignore="false"></script>
 *  |不显示“这是ignore属性为true”
 *  |不显示“这是ignore属性为true”
 *  |
 *  |---
 *  |测试属性<js>的功能
 *  |<js type="{=$sType}">document.write("hello 这是js标签)</js>
 *  |显示hello 这是js标签
 *  |显示hello 这是js标签
 *  |
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过script/js标签编译器的代码演示如何编写一个标签编译器
 */

class ScriptCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:scriptCase' => array(
				'template' => 'test-template/node/ScriptCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="ScriptCase功能测试：";
		$sType="text/javascript";
		$this->viewScriptCase->variables()->set('sType',$sType);
		$this->viewScriptCase->variables()->set('sText',$sText);
	}
}

