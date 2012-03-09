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

class TestControllerChildAuthorInfo extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'title'=>'子控制器作者信息',
			'view:TestControllerChildAuthorInfo' => array(
					'template' => 'test-mvc/testcontroller/TestControllerChildAuthorInfo.html' ,
					'class' => 'view',
					'model'=>'authorinfo', 
					),
			'model:authorinfo'=>array(
					'class'=>'model',
					'list'=>true,
					'orm'=>array(
						'limit'=>20,
						'table'=>'authorinfo',	
					)
			)
		);

		
		return $arrBean;
	}
	
	public function process()
	{
		$this->modelAuthorinfo->load();
	}	
}
?>