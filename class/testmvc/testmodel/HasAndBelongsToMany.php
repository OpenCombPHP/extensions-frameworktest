<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\mvc\model\db\Model;

class HasAndBelongsToMany extends ControlPanel
{
	/**
	 * @example /MVC模式/视图/表单视图
	 * 
	 */
	
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:HasAnd'=>array(
				'template'=>'test-mvc/testmodel/HasAndBelongsToMany.html',
				//表单视图from
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
		 * @example /MVC模式/数据库模型/数据表原型
		 *  原型创建
		 */
		
		if($this->params->get('aid2'))
		{
			$nAid2 = $this->params['aid2'];
			//创建原型
			$aPrototype =  Prototype::create ( "frameworktest_author");
			//建立hasAhasAndBelongsToMany关系
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
		
		/**
		 * @example /MVC模式/数据库模型/数据表关联/hasAndBelongsToMany(原型)
		 *	原型方式创建hasAndBelongsToMany关系
		 *
		 */
		
		/**
		 * @example /MVC模式/数据库模型/模型列表(ModelList)
		 * @forwiki /MVC模式/数据库模型/模型列表(ModelList)
		 *	ModelList遍历
		 *
		 */
		
		if ($this->viewHasAnd->isSubmit ( $this->params ))
		{
			$nAid = $this->params['aid'];
			$aPrototype =  Prototype::create ( "frameworktest_author");
			//原型方式创建hasAndBelongsToMany关系
			$aPrototype->hasAndBelongsToMany("frameworktest_book","frameworktest_bridge","aid","aid","bid","bid");
			$aModel = new Model($aPrototype);
			$aModel->load(array($nAid),array('aid'));
			
			$aPrototype2 =  Prototype::create ( "frameworktest_author");
			$aModel2 = new Model($aPrototype2);
			$aModel2->load(array($nAid),array('aid'));
			$this->viewHasAnd->variables()->set('author',$aModel->data('author'));
			$this->viewHasAnd->variables()->set('aid',$aModel->data('aid'));
			
			$arrBookModel=array();
			//modelframeworktest_book则是一个modellist，通过迭代器Iterator，遍历出其子model
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
