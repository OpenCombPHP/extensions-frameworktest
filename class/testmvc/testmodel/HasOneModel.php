<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\mvc\model\db\Model;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

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
		/**
		 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/新建(原型)
		 * @forwiki /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/模型的创建
		 * 以下为原型创建Model的方式
		 * 原型创建Model有别于Bean的方式在于，必须先创建原型，而Bean则是把原型创建交给了系统自动完成.
		 *
		 */
		
		/**
		 * @example /MVC模式/数据库模型/数据表关联/hasOne2(原型)
		 *	原型方式创建hasOne关系
		 *
		 */
		
		if ($this->viewHasOne->isSubmit ( $this->params ))
		{
			$nAid = $this->params['aid'];
			$aProtoType = Prototype::create("frameworktest_author");//创建原型
			$aProtoType->hasOne("frameworktest_authorinfo","aid","aid");//建立hasOne关系
			$aModel = new Model($aProtoType,false);//原型的方式创建model
			$aModel->load(array($nAid),array('aid'));
			$arrHasOne=array($aModel->data('author'),$aModel->data('frameworktest_authorinfo.sex'),$aModel->data('frameworktest_authorinfo.jiguan'));
			$this->viewHasOne->variables()->set('hasOne',$arrHasOne);
		}
	}
}
