<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\mvc\model\db\Model;

/**
 * @wiki /MVC模式/模型/测试模型
 *
 * {|
 *  !用例说明
 *  !模型创建方式
 *  |---
 *  |hasAndBelongsToMany本用例通过作者的唯一表示aid来查看作者的所有作品，一个作品呢又会有多个作者。
 *  |通过对原型的创建，来直接创建model
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |原型的多对多的关系的创建否成功，是否可以建立model
 *  |1.建立一对一的原型模式，2.用原型创建model
 *  |1，2都可以实现
 *  |1，2都可以实现
 *  |
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

class HasAndBelongsToMany extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:HasAnd'=>array(
				'template'=>'test-mvc/testmodel/HasAndBelongsToMany.html',
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
		
		if($this->params->get('aid2'))
		{
			$nAid2 = $this->params['aid2'];
			$aPrototype =  Prototype::create ( "frameworktest_author");
			$aPrototype->hasAndBelongsToMany("frameworktest_book","frameworktest_bridge","aid","aid","bid","bid");
			$aModel = new Model($aPrototype);
			$aModel->load(array($nAid2),array('aid'));
			$arrComment=array();
			
			 foreach($aModel->child('frameworktest_book')->childIterator() as $aBookModel)
			 {
			 	$aBookModel->data('bid');
			 	$sBoonkName=$aBookModel->data('bookname');
				$aPrototype1 = $aBookModel->prototype()->hasOne("frameworktest_bookcomment","bid","bid");
				$aModel1 = new Model($aPrototype1);
				$aModel1->load(array($aBookModel->bid),array('bid'));
				$nCid=$aModel1->data('cid');
				$sUserName=$aModel1->data('username');
				$sComment=$aModel1->data('comment');
				$arrComment[$aBookModel->data('bid')]=array('bookname'=>$sBoonkName,'cid'=>$nCid,'username'=>$sUserName,'comment'=>$sComment);
			}
			$this->viewHasAnd->variables()->set('comment',$arrComment);
			
		}
		if ($this->viewHasAnd->isSubmit ( $this->params ))
		{
			$nAid = $this->params['aid'];
			$aPrototype =  Prototype::create ( "frameworktest_author");
			$aPrototype->hasAndBelongsToMany("frameworktest_book","frameworktest_bridge","aid","aid","bid","bid");
			$aModel = new Model($aPrototype);
			$aModel->load(array($nAid),array('aid'));
			
			$aPrototype2 =  Prototype::create ( "frameworktest_author");
			$aModel2 = new Model($aPrototype2);
			$aModel2->load(array($nAid),array('aid'));
			$this->viewHasAnd->variables()->set('author',$aModel->data('author'));
			$this->viewHasAnd->variables()->set('aid',$aModel->data('aid'));
			
			$arrBookModel=array();
			foreach($aModel->child('frameworktest_book')->childIterator() as $aBookModel)
			{	
				$arrBookModel[$aBookModel->data('bid')]=array($aBookModel->data('bookname'),$aBookModel->data('publish'));
				
			}
			$this->viewHasAnd->variables()->set('bookModel',$arrBookModel);
			
		}
		
		if($this->params->get('cid'))
		{
			$nCid = $this->params['cid'];
			$aPrototype =  Prototype::create ( "frameworktest_commentinfo");
			$aModel = new Model($aPrototype);
			$aModel->load(array($nCid),array('cid'));
			$sUserName = $aModel->data('username');
			$nAge = $aModel->data('age');
			$sInfo = $aModel->data('info');
			$arrCommentAuthor=array('username'=>$sUserName,'age'=>$nAge,'info'=>$sInfo);
			$this->viewHasAnd->variables()->set('arrCommentAuthor',$arrCommentAuthor);
		}
	}
}
?>