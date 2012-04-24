<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class ContrModelHasOne extends ControlPanel
{
	/**
	 * @example /MVC模式/数据库模型/数据表关联/hasOne(Bean)
	 *	Bean方式创建hasOne关系
	 *
	 */
	
	/**
	 * @example MVC模式/视图/绑定模型
	 */
	
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:contrlModelHasOne'=>array(
				'template'=>'test-mvc/testmodel/ContrModelHasOne.html',
				'class'=>'view',
				//绑定模型author
				'model'=>'author',
			),
			'model:author'=>array(
				'class'=>'model',
				'list'=>'true',
				'orm'=>array(
					'table'=>'author',
					'limit'=>20,
					 //建立hasOne关系
					'hasOne:authorinfo'=>array(
					 //起始表字段名
					'fromkeys'=>'aid',
					 //目标表字段名
					'tokeys'=>'aid',
					 //目标表
					'table'=>'authorinfo',)
				)
			),
		);
	}
	
	public function process()
	{
		
		$this->modelAuthor->load();
		$this->modelAuthor->printStruct();
	}	
}
