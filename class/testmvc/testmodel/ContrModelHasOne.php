<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\verifier\Length;
use org\jecat\framework\mvc\view\DataExchanger;
use org\jecat\framework\mvc\model\db\Model;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

/**
 * @wiki /MVC模式/模型/测试模型
 *
 * {|
 *  !用例说明
 *  !功能
 *  |---
 *  |本用例是hasOne关系model的createBean创建方式
 *  |
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试createBean创建model的功能
 *  |creaBean创建
 *  |可以创建
 *  |可以创建
 *  |
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

class ContrModelHasOne extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:contrlModelHasOne'=>array(
				'template'=>'test-mvc/testmodel/ContrModelHasOne.html',
				'class'=>'view',
				'model'=>'author',
			),
			'model:author'=>array(
				'class'=>'model',
				'list'=>'true',
				'orm'=>array(
					'table'=>'author',
					'limit'=>20,
					'hasOne:authorinfo'=>array(
					'fromkeys'=>'aid',
					'tokeys'=>'aid',
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
?>