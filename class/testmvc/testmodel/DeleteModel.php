<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\mvc\model\db\Model;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

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
		/**
		 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/删除
		 * @forwiki
		 *	以下为数据的删除操作
		 *
		 */
		
		if($this->params->get('aid3'))
		{
			$nAid3=$this->params->get('aid3');
			$aProtoType = Prototype::create("frameworktest_author");
			$aProtoType->hasOne("frameworktest_authorinfo","aid","aid");
			$aModel = new Model($aProtoType);
			//查找要删除的数据行
			$aModel->load(array($nAid3),array('aid'));
			//删除数据
			$aModel->delete();
		}
	}
}
