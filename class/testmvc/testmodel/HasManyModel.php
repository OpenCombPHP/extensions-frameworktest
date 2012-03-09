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

class HasManyModel extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '一对多关系',
			'view:hasMany'=>array(
				'template'=>'test-mvc/testmodel/HasManyModel.html',
				'class'=>'form',
				'widgets'=>array(
						array(
								'id'=>'tid',
								'class'=>'text',
								'title'=>'作品类型',
						),
				)
			),
		);
	}
	
	public function process()
	{
		/**
		 * @example /MVC模式/数据库模型/数据表关联/hasMany(原型)
		 *	原型方式创建hasMany关系
		 *
		 */
		
		/**
		 * @example /MVC模式/数据库模型/模型加载的条件/通过原型获得设置加载条件 
		 *  通过原型直接对加载条件进行设置
		 */
		
		if ($this->viewHasMany->isSubmit ( $this->params ))
		{
			$this->viewHasMany->loadWidgets( $this->params );
			$tid=$this->viewHasMany->widget('tid')->value();
			$aProtoType = ProtoType::create("frameworktest_booktype");
			//建议hasMany关系
			$aProtoType->hasMany("frameworktest_book",'tid','tid');
			$aModel = new Model($aProtoType);
			//加载条件
			/*
			$aWhere = clone $this->$aModel->prototype()->criteria()->where();  //获得Retriction对象
			$aWhere->ge("tid",5); //设置Tid大于等于5
			$aWhere->lt("tid",3); //设置Tid小于等于3
			$aModel->laod($aWhere);
			*/
			$aModel->load(array($tid),array('tid'));
			$arrBooks=array();
			foreach($aModel->child('frameworktest_book')->childIterator() as $aBook)
			{
				$arrBooks[$aBook->data('bid')]=array('bookname'=>$aBook->data('bookname'),'price'=>$aBook->data('price')
						,'publish'=>$aBook->data('publish'));
			}
			$this->viewHasMany->variables()->set('arrBooks',$arrBooks) ;
		}
		
	}
}
?>