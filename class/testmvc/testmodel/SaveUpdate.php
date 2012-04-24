<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\mvc\model\db\Model;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class SaveUpdate extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:beLongsToSaveUpdate'=>array(
				'template'=>'test-mvc/testmodel/SaveUpdate.html',
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
		
		if($this->params->get('aid2'))
		{
			$this->viewBeLongsToSaveUpdate->widget('aid')->setValue($this->params->get('aid2'));
		}
		
		/**
		 * @example /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/保存(update)
		 * @forwiki /MVC模式/数据库模型/模型的基本操作(新建、保存、删除、加载)/保存(update)
		 * 以下为数据的保存update代码
		 *
		 */
		
		if ($this->viewBeLongsToSaveUpdate->isSubmit ( $this->params ))
		{
			$this->viewBeLongsToSaveUpdate->loadWidgets( $this->params );
			$nAid = $this->viewBeLongsToSaveUpdate->widget('aid')->Value();
			$sSex = $this->viewBeLongsToSaveUpdate->widget('sex')->value();
			$sJiguan = $this->viewBeLongsToSaveUpdate->widget('jiguan')->value();
			$aProtoType = Prototype::create("frameworktest_authorinfo");
			$aModel = new Model($aProtoType,false);
			//这里对数据进行了加载
			//制定要更新的数据
			$aModel->load(array($nAid),array('aid'));
			//更新数据
			$aModel->setData('sex',$sSex);
			$aModel->setData('jiguan',$sJiguan);
			//保存数据
			$aModel->save();
		}
	}
}
