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

class SelectModel extends ControlPanel
{
	
	/**
	 * @example /MVC模式/数据库模型/模型加载的条件/Bean中条件设置
	 * Bean的模型加载条件的创建方式,对where进行设置
	 * 
	 */
	
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:selectModel'=>array(
				'template'=>'test-mvc/testmodel/SelectModel.html',
				'model'=>'authorInfo',
				'class'=>'form',
			),
			'model:authorInfo'=>array(
				'class'=>'model',
				//listModel,一个model的集合
				'list'=>true,
				'orm'=>array(
					//显示的字段数据
					'colums'=>array('sex','jiguan'),
					//显示数据表中的5行数据
					'limit'=>5,
					//查询按照aid降序
					'orderDesc'=>array('aid'),
					//查询id升序
					'orderAsc'=>array('id'),
					//where是一个集合,eq为相等,sex为字段名,logic为And
					//性别为男，且籍贯为辽宁的过滤条件
					'where'=>array(array('eq','sex','男'),array('logic'),array('eq','jiguan','辽宁')),
					'table'=>'authorinfo',
				)		
			)
		);
	}
	
	/**
	 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/加载
	 * @fowwiki /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/加载
	 * 以下为数据的查询的代码
	 */
	
	public function process()
	{
		//对模型AuthorInfo进行加载
		$this->modelAuthorInfo->load();	
	}
}
?>