<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

/**
 * @example /MVC模式/数据库模型/数据表关联/hasAndBelongsToMany(Bean)
 *	Bean方式创建hasAndBelongsToMany关系
 *
 */

class ContrModelHasAnd extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'title'=> '作者作品',
			'view:contrlModelHasAnd'=>array(
				'template'=>'test-mvc/testmodel/ContrModelHasAnd.html',
				'class'=>'view',
				'model'=>'author',
			),
			'model:author' => array (
					'class' => 'model', 
					'orm' => array (
							//起始表
							'table' => 'author', 
							'hasAndBelongsToMany:book' => array (
									//起始表字段名
									'fromkeys' => array ('aid' ), 
									//指定桥接表字段名
									'tobridgekeys' => array ('aid' ), 
									//起始桥接表字段名
									'frombridgekeys' => 'bid', 
									//指定目标表字段名
									'tokeys' => 'bid', 
									//指定目标表
									'table' => 'book',
									//桥接表 
									'bridge' => 'bridge', 
							)
					)
			),
		);
	}
	
	public function process()
	{
		$this->modelAuthor->load();
		$arrBookInfo=array();
		//获得bookmodel
		foreach($this->modelAuthor->child('book')->childIterator() as $aBookModel)
		{
			
			$arrBookInfo[$aBookModel->data('bid')]=array($aBookModel->data('bookname'),$aBookModel->data('publish'));
		}
		$this->viewContrlModelHasAnd->variables()->set('arrBookInfo',$arrBookInfo);
	}	
}
