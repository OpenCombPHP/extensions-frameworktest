<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class ContrModelHasMany extends ControlPanel
{
	/**
	 * @example /MVC模式/数据库模型/数据表关联/hasMany(Bean)
	 *	Bean方式创建hasMany关系
	 *
	 */
	
	public function createBeanConfig()
	{
		return array(
			'title'=> '文章内容',
			'view:contrModelHasMany'=>array(
				'template'=>'test-mvc/testmodel/ContrModelHasMany.html',
				'class'=>'view',
				'model'=>'booktype',
			),
			'model:booktype'=>array(
				'class'=>'model',
				'orm'=>array(
					'table'=>'booktype',
					//建立hasMany关系			
					'hasMany:book'=>array(
					'fromkeys'=>'tid',
					'tokeys'=>'tid',
					'table'=>'book',
					)
				)
			),
		);
	}
	
	public function process()
	{
		
		$this->modelBooktype->load();
		$arrBooks=array();
		foreach($this->modelBooktype->child('book')->childIterator() as $aBook)
		{
			$arrBooks[$aBook->data('bid')]=array('bookname'=>$aBook->data('bookname'),'price'=>$aBook->data('price')
			,'publish'=>$aBook->data('publish'));
		}
		$this->viewContrModelHasMany->variables()->set('arrBooks',$arrBooks) ;
	}	
}
