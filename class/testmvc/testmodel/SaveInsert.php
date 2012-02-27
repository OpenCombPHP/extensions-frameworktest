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
 *  |本用例将insert，update，delete三种方法放在一个模版下进行实现，通过输入新建作者，编辑作者，删除作者来实现。
 *  |model的save方法其实是两个方法的集合，一个是insert一个update，当进行save的时候，系统会判断是使用update或者是insert.
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试模型的insert功能,
 *  |向author表插入一个新的作者
 *  |当输入作者名字的时候，可以返回作者名字和作者的id
 *  |可以实现
 *  |
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

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
		
		if ($this->viewBeLongsToSaveInsert->isSubmit ( $this->params ))
		{
			$sName = $this->params['name'];
			$aProtoType = Prototype::create("frameworktest_author");
			$aProtoType->hasOne("frameworktest_authorinfo",array('aid','author'),array('aid','author'));
			$aModel = new Model($aProtoType,false);
			$aModel->setData('author',$sName);
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