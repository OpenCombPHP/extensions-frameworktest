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

/**
 * @wiki /MVC模式/模型/测试模型
 *
 * {|
 *  !用例说明
 *  !功能
 *  |---
 *  |一种类型可以有很多本书，本用例通国一对多的关系，显示出一个类型的所有书籍的名字和作者
 *  |hasMany可以实现一对多的表关系
 *  |---
 *  !测试目的
 *  !操作过程
 *  !期待值
 *  !实际结果
 *  !说明
 *  |---
 *  |测试createBean创建model的功能
 *  |createbean创建model，现实
 *  |显示出所有的作者
 *  |可以实现
 *  |
 *  |}
 */
/**
 * @example /MVC模式/模型/测试模型/自定义测试:name[1]
 *
 *
 */

class ContrModelHasMany extends ControlPanel
{
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