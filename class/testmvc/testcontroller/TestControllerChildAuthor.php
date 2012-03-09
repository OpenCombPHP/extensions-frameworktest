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

class TestControllerChildAuthor extends ControlPanel
{
	public function createBeanConfig()
	{
		$arrBean = array(
			'title'=>'子控制作者',
			'view:TestControllerChildAuthor' => array(
					'template' => 'test-mvc/testcontroller/TestControllerChildAuthor.html' ,
					'class' => 'view',
					'model'=>'author', 
					),
			'model:author'=>array(
					'class'=>'model',
					'list'=>true,
					'orm'=>array(
						'limit'=>20,
						'table'=>'author',	
					)
			)
		);

		
		return $arrBean;
	}
	
	public function process()
	{
		$this->modelAuthor->load();
	}	
}
?>