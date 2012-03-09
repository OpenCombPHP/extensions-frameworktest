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

class SaveInsert extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:beLongsToSaveInsert'=>array(
				'template'=>'test-mvc/testmodel/SaveInsert.html',
				'class'=>'form',
				'widgets'=>array(
						array(
								'id'=>'aid',
								'class'=>'text',
								'title'=>'作者id',
						),
						array(
								'id'=>'name',
								'class'=>'text',
								'title'=>'作者名字',
						),
				)
			),
		);
	}
	
	public function process()
	{
		
		/**
		 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/保存(insert)
		 * @forwiki /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/保存(insert)
		 * 以下为数据的保存insert的实现
		 *
		 */
		if ($this->viewBeLongsToSaveInsert->isSubmit ( $this->params ))
		{
			$sName = $this->params['name'];
			$aProtoType = Prototype::create("frameworktest_author");
			$aProtoType->hasOne("frameworktest_authorinfo",array('aid','author'),array('aid','author'));
			$aModel = new Model($aProtoType,false);
			//插入数据
			$aModel->setData('author',$sName);
			//这里模型没有被加载(load)过
			//保存数据
			$aModel->save();
			
		}
		$aProtoType = Prototype::create("frameworktest_author");
		$aModel = new Model($aProtoType,true);
		$aModel->load();
		$arrAuthor = array();
		foreach($aModel->childIterator() as $aAuthorModel)
		{
			$arrAuthor[$aAuthorModel->data('aid')] = array('aid'=>$aAuthorModel->data('aid'),'author'=>$aAuthorModel->data('author'));
			
		}
		$this->viewBeLongsToSaveInsert->variables()->set('Authors',$arrAuthor);
		
	}
}
?>