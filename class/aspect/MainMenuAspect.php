<?php
namespace org\opencomb\frameworktest\aspect;

use org\jecat\framework\bean\BeanFactory;
use org\jecat\framework\lang\aop\jointpoint\JointPointMethodDefine;

class MainMenuAspect
{
	/**
	 * @pointcut
	 */
	public function pointcutCreateBeanConfig()
	{
		return array(
			new JointPointMethodDefine('org\\opencomb\\coresystem\\mvc\\controller\\ControlPanelFrame','createBeanConfig') ,
		) ;
	}
	
	/**
	 * @advice around
	 * @for pointcutCreateBeanConfig
	 */
	private function createBeanConfig()
	{
		// 调用原始原始函数
		$arrConfig = aop_call_origin() ;
		$arrConfig['frameview:frameView']['widget:mainMenu']['item:development']['item:test']=array(
																		'title' => '测试中心',
																		'link' => '?c=org.opencomb.frameworktest.TestIndex',
																		'query' => array(
																			'c=org.opencomb.frameworktest.TestIndex',
																			'c=org.opencomb.frameworktest.fs.TestFSIterator',
																		)
																	);
		return $arrConfig ;
	}
}
?>
