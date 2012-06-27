<?php
namespace org\opencomb\frameworktest;

use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\opencomb\platform\ext\Extension;

class FrameworkTest extends Extension
{
	/**
	 * 载入扩展
	 */
	public function load()
	{
		// 注册菜单build事件的处理函数
		ControlPanel::registerMenuHandler(array(__CLASS__,'buildControlPanelMenu')) ;
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
