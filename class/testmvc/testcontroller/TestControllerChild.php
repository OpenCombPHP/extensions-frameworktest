<?php
namespace org\opencomb\frameworktest\testmvc\testcontroller ;

use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\verifier\Length;
use org\jecat\framework\mvc\view\DataExchanger;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
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
?>