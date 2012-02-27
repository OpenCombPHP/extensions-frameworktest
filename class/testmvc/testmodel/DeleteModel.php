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

/**
 * @wiki /MVC模式/模型/测试模型
 *
 * {|
 *  !实现方式
 *  !功能
 *  |---
 *  |纯原型创建model实现方式，这里有别于用createbean创建的方式。
 *  |model的save方法其实是两个方法的集合，一个是insert一个update，当进行save的时候，系统会判断是使用update或者是insert.
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试模型的delete功能,
 *  |删除作者
 *  |删除作者的同时，作者信息被删除
 *  |可以实现
 *  |
 *  |}
 *  
 *  [^]hasOne的关系就在于，当A表和B表建立hasOne关系之后，删除A表，B表也随之被删除，连个表的主键是一对一关联的[/^]
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

class DeleteModel extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:beLongsToDelete'=>array(
				'template'=>'test-mvc/testmodel/DeleteModel.html',
				'class'=>'form',
				'widgets'=>array(
						array(
								'id'=>'sex',
								'class'=>'text',
								'title'=>'作者id',
						),
						array(
								'id'=>'jiguan',
								'class'=>'text',
								'title'=>'作者名字',
						),
						array(
								'id'=>'aid',
								'class'=>'text',
								'type'=>'hidden',
								'title'=>'作者id',
						),
				)
			),
		);
	}
	
	public function process()
	{
		
		if($this->params->get('aid3'))
		{
			$nAid3=$this->params->get('aid3');
			$aProtoType = Prototype::create("frameworktest_author");
			$aProtoType->hasOne("frameworktest_authorinfo","aid","aid");
			$aModel = new Model($aProtoType);
			$aModel->load(array($nAid3),array('aid'));
			$aModel->delete();
		}
	}
}
?>