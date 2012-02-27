<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\verifier\Length;
use org\jecat\framework\mvc\view\DataExchanger;

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
 *  |本用例通过createBean来创建model，显示所有的作者
 *  |
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试createBean创建model的功能，并通过view的与定义变量theModel在模版上显示
 *  |createbean创建model，{=$theModel}显示model
 *  |显示出所有的作者
 *  |可以实现
 *  |
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
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
			'model:author'=>array(
				'class'=>'model',
				'list'=>'ture',
				'orm'=>array(
					'limit'=>20,
					'table'=>'author',
				)
			),
		);
	}
	
	public function process()
	{
		$this->modelAuthor->load();
	}	
}
?>