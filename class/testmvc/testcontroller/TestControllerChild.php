<?php
namespace org\opencomb\frameworktest\testmvc\testcontroller ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestControllerChild extends ControlPanel
{
	
	/**
	 * @example /MVC模式/控制器/控制器的组合模式
	 * 
	 */
	
	public function createBeanConfig()
	{
		$arrBean = array(
			'title'=>'测试控制器组合',
			'view:oauthSetting' => array(
					'template' => 'test-mvc/testcontroller/TestControllerChild.html' ,
					'class' => 'view' 
					),
			'controllers' => array() 
		);
		//子控制器author
		$arrBean['controllers']['author'] = array(
				//子控制器的类
				'class' => 'org\\opencomb\\frameworktest\\testmvc\\testcontroller\\TestControllerChildAuthor' ,
				//子控制器的params
				'params' => array(),
		);
		//子控制器authorinfo
		$arrBean['controllers']['authorinfo'] = array(
				'class' => 'org\\opencomb\\frameworktest\\testmvc\\testcontroller\\TestControllerChildAuthorInfo' ,
				'params' => array(),
		);
		
		return $arrBean;
	}
	
	public function process()
	{
	}	
}
