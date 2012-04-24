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
 *  |<subtemplate:define>
 *  |java脚本的使用标签
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |功能<subtemplate:define>测试
 *  |定义一个subtemplate:<subtemplate:define name="subTemp" >a</subtemplate:define><subtemplate:call name="subTemp" vars="true"/><subtemplate:call name="subTemp" vars="true"/>
 *  |显示“aa”
 *  |显示“aa”
 *  | 
 *  |---
 *  |测试属标vars为true时的作用
 *  ||定义一个subtemplate:<subtemplate:define name="subTemp" >{数组}</subtemplate:define><subtemplate:call name="subTemp" vars="true"/>
 *  |显示“数组内容”
 *  |显示“数组内容”
 *  |
 *  |---
 *  |测试属标vars为false时的作用
 *  ||定义一个subtemplate:<subtemplate:define name="subTemp" >{数组}</subtemplate:define><subtemplate:call name="subTemp" vars="true"/>
 *  |不显示“数组内容”
 *  |不显示“数组内容””
 *  |
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过subtemplate标签编译器的代码演示如何编写一个标签编译器
 */

class SubTemplateDefineCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:subTemplateDefineCase' => array(
				'template' => 'test-template/node/SubTemplateDefineCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="SubTemplateDefineCase功能测试：";
		$arrA=array(0=>'第一次循环',1=>'第二次循环');
		$this->viewSubTemplateDefineCase->variables()->set('arrA',$arrA);
		$this->viewSubTemplateDefineCase->variables()->set('sText',$sText);
	}
}

