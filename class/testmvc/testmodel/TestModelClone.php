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


class TestModelClone extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:hasOne'=>array(
				'template'=>'test-mvc/testmodel/TestModelClone.html',
				'class'=>'view',
			),
		);
	}
	
	/**
	 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)模型的克隆
	 * @fowwiki /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)模型的克隆
	 * 以下为模型的克隆的代码
	 */
	
	/**
	 * @example /MVC模式/数据库模型/模型加载的条件/无过滤条件
	 * 不设置加载条件
	 *
	 */
	
	public function process()
	{
		$aProtoType = Prototype::create("frameworktest_author");//创建原型
		$aModel1 = new Model($aProtoType,false);
		//$aModel1->load();
		//模型的克隆
		$aModel2 = clone $aModel1;
		//如果加载条件不进行设置，则会读取整个数据表
		$aModel2->load();
		//被克隆后的模型，互不干扰,$aModel2和$aModel1是两个不同的模型
		$aModel2->printStruct();
		$aModel1->printStruct();
	}
}
?>