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
 *  |本用例为hasAndBelongsToMany型关系,有fromkeys，tobridgekeys，frombridgekeys，tokeys，bridge等属性
 *  |如果说有三个表，作者，桥接，作品三个表。fromkeys为作者的aid并与tobridgekeys的aid进行关联，当然这里，桥接表的frombridgekeys与作品的bid进行关联
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试createBean创建model的功能,原型为hasAndBelongsToMany
 *  |createbean创建model，{=$theModel}显示model
 *  |显示出所有的作者
 *  |可以实现
 *  |hasAndBelongsToMany关系为多对多,
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

class ContrModelHasAnd extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:contrlModelHasAnd'=>array(
				'template'=>'test-mvc/testmodel/ContrModelHasAnd.html',
				'class'=>'view',
				'model'=>'author',
			),
			'model:author' => array (
					'class' => 'model', 
					'orm' => array (
							'table' => 'author', 
							'hasAndBelongsToMany:book' => array (
									'fromkeys' => array ('aid' ), 
									'tobridgekeys' => array ('aid' ), 
									'frombridgekeys' => 'bid', 
									'tokeys' => 'bid', 
									'table' => 'book', 
									'bridge' => 'bridge', 
									)
							)
			),
		);
	}
	
	public function process()
	{
		$this->modelAuthor->setData('aid',66);
		$this->modelAuthor->save();
	}	
}
?>