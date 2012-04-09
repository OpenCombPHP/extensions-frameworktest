<?php
namespace org\opencomb\frameworktest;

use org\opencomb\platform\mvc\view\widget\Menu;
use org\jecat\framework\lang\aop\AOP;
use org\opencomb\platform\ext\Extension;
use org\jecat\framework\bean\BeanFactory;



use org\opencomb\frameworktest\aspect;
use org\jecat\framework\ui\xhtml\weave\Patch;
use org\jecat\framework\ui\xhtml\weave\WeaveManager;

class FrameworkTest extends Extension
{
	/**
	 * 载入扩展
	 */
	public function load() {
		// 注册菜单build事件的处理函数
		Menu::registerBuildHandle(
				'org\\opencomb\\coresystem\\mvc\\controller\\ControlPanelFrame'
				, 'frameView'
				, 'mainMenu'
				, array(__CLASS__,'buildControlPanelMenu')
		) ;
	}
	
	static public function buildControlPanelMenu(array & $arrConfig)
	{
		// 合并配置数组，增加菜单
		$arrConfig['item:development']['item:test']=array(
			'title' => '测试中心',
			'link' => '?c=org.opencomb.frameworktest.TestIndex',
			'query' => array(
				'c=org.opencomb.frameworktest.TestIndex',
				'c=org.opencomb.frameworktest.fs.TestFSIterator',
			)
		);
		
	}
}

?>