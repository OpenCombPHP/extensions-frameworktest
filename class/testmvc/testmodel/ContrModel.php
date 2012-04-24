<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

/**
 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/新建(Bean)
 * @forwiki /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/新建(Bean)
 * 以下为Bean创建Model的方式
 *
 */

class ContrModel extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:contrlModel'=>array(
				'template'=>'test-mvc/testmodel/ContrModel.html',
				'class'=>'view',
				'model'=>'author',
			),
				//Bean创建一个model
			'model:author'=>array(
				'class'=>'model',
				'list'=>'ture', //是否允许是listModle
				'orm'=>array(
					'limit'=>20, //listModle数量
					'table'=>'author', //数据表名称
				)
			),
		);
	}
	
	public function process()
	{
		$this->modelAuthor->load();
	}	
}
