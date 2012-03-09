<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\mvc\model\db\Model;
use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;


class TestModelMerge extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:hasOne'=>array(
				'template'=>'test-mvc/testmodel/TestModelMerge.html',
				'class'=>'view',
				'model'=>'author',
			),
			
			'models'=>array(
				array(
					'name'=>'authorinfo',
					'class'=>'model',
					'orm'=>array(
						'table'=>'authorinfo',
					)
				),
				array(
					'name'=>'author',
					'class'=>'model',
					'orm'=>array(
							'table'=>'author',
					)
				),
			)
			
			/*
			'model:author'=>array(
					'class'=>'model',
					'orm'=>array(
						'table'=>'author',
					)
				),
			'model:authorinfo'=>array(
					'class'=>'model',
					'orm'=>array(
							'table'=>'authorinfo',
					)
			),
			*/
		);
	}
	
	public function process()
	{
		$this->modelAuthor->load();
		$this->modelAuthor->printStruct();
		$this->modelAuthorinfo->load();
		$this->modelAuthorinfo->printStruct();
	}
}
?>