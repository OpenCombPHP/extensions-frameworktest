<?php
namespace org\opencomb\frameworktest\testmvc\testmodel ;

use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\verifier\Length;
use org\jecat\framework\mvc\view\DataExchanger;
use org\jecat\framework\mvc\model\db\Model;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
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
?>