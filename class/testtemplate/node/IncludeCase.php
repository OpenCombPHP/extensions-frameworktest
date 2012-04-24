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
 *  |<include>
 *  |退出当前循环
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |include包含文件的功能
 *  |<include file="frameworktest:TestIndex.html" ></include>
 *  |显示TestIndex.html的内容
 *  |显示TestIndex.html的内容
 *  | 
 *  |true的属性测试以及一个扩展两个目录的测试
 *  |<include file="advertisement:AdvertisementSetting.html" vars='true'></include>
 *  |显示AdvertisementSetting.html的内容
 *  |显示AdvertisementSetting.html的内容
 *  |AdvertisementSetting.html的内容要被显示出来
 *  |}
 */
/**
 * @example /模板引擎/测试标签/自定义标签:name[1]
 *
 *  通过include标签编译器的代码演示如何编写一个标签编译器
 */

class IncludeCase extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'view:includeCase' => array(
				'template' => 'test-template/node/IncludeCase.html' ,
			)
		) ;
		return $arrBean;
	}
	
	public function process()
	{	
		$sText="Include功能测试：";
		$this->viewIncludeCase->variables()->set('sText',$sText);
			
	}
}

