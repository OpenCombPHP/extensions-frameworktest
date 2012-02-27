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
 *  !功能
 *  |---
 *  |本用例是完成作者信息的更新操作
 *  |model的save方法其实是两个方法的集合，一个是insert一个update，当进行save的时候，系统会判断是使用update或者是insert.
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试模型的update功能,
 *  |当点击作者名字的时候，进入编辑画面对作者进行编辑
 *  |作者信息的编辑成功
 *  |可以实现
 *  |
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

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
		
		
		if ($this->viewBeLongsToSaveUpdate->isSubmit ( $this->params ))
		{
			$this->viewBeLongsToSaveUpdate->loadWidgets( $this->params );
			$nAid = $this->viewBeLongsToSaveUpdate->widget('aid')->Value();
			$sSex = $this->viewBeLongsToSaveUpdate->widget('sex')->value();
			$sJiguan = $this->viewBeLongsToSaveUpdate->widget('jiguan')->value();
			$aProtoType = Prototype::create("frameworktest_authorinfo");
			$aModel = new Model($aProtoType,false);
			$aModel->load(array($nAid),array('aid'));
			$aModel->setData('sex',$sSex);
			$aModel->setData('jiguan',$sJiguan);
			$aModel->save();
		}
	}
}
?>