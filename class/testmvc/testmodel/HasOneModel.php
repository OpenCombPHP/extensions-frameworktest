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
 *  !用例说明
 *  !模型创建方式
 *  |---
 *  |本用例通过author表和authorinfo表建立hasOne的关系，当我输入author表的id时，可以自动查找到authorinfo的作者详细内容
 *  |通过对原型的创建，来直接创建model.
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |原型的一对一关系是否成功，是否可以建立model
 *  |1.建立一对一的原型模式，2.用原型创建model
 *  |1，2都可以实现
 *  |1，2都可以实现
 *  |hasOne本用例是作者和作者信息的关系，一对一
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *  
 */

class HasOneModel extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:hasOne'=>array(
				'template'=>'test-mvc/testmodel/HasOneModel.html',
				'class'=>'form',
				'widgets'=>array(
						array(
								'id'=>'aid',
								'class'=>'text',
								'title'=>'作者id',
						),
				)
			),
		);
	}
	
	public function process()
	{
		
		if ($this->viewHasOne->isSubmit ( $this->params ))
		{
			$nAid = $this->params['aid'];
			$aProtoType = Prototype::create("frameworktest_author");
			$aProtoType->hasOne("frameworktest_authorinfo","aid","aid");
			$aModel = new Model($aProtoType,false);
			$aModel->load(array($nAid),array('aid'));
			$arrHasOne=array($aModel->data('author'),$aModel->data('frameworktest_authorinfo.sex'),$aModel->data('frameworktest_authorinfo.jiguan'));
			$this->viewHasOne->variables()->set('hasOne',$arrHasOne);
		}
	}
}
?>