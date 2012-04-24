<?php
namespace org\opencomb\frameworktest\testmvc\testdataexchange ;

use org\jecat\framework\mvc\view\DataExchanger;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

/**
 * @example /MVC模式/数据交换和数据校验/数据交换
 * @author qusong
 *
 */

class TestDataExchange extends ControlPanel
{
	public function createBeanConfig()
	{
 		return array(
 			'title'=> '文章内容',
 			'view:testDataExchange'=>array(
				'template'=>'test-mvc/testdataexchange/TestDataExchange.html',
 				'class'=>'form',
 				'model'=>'booktype',
  				'widgets'=>array(
					array(
 						'id' => 'text_booktype',
 						'class' => 'text',
 						'title' => '图书类型',
						//设定数据交换的数据表字段
						'exchange' =>'type',
					),
  					//select类型的数据交换的实战使用,有别于text
 					array(
 						'id' => 'select_booktype',
 						'class' => 'select',
 						'title' => '图书类型列表',
 						'exchange' =>'type', //type会自动匹配options中的值，并选中。
 						'options'=>array(
 							array('文学','文学',false),
 							array('历史','历史',false),
 							array('科学','科学',false),
 						)
 					)
				)
 			),
 			'model:booktype' => array(
				'class' => 'model',
 				//'list'=> 'true',
				'orm' => array(
					'table' => 'booktype',
					'columns' => array('type') ,
				)
			),
 		);
	}
	
	public function process()
	{
		if($this->viewTestDataExchange->isSubmit ( $this->params ))
		{
			$this->viewTestDataExchange->loadWidgets($this->params);
			//设置 WIDGET_TO_MODEL数据交换
			$this->viewTestDataExchange->exchangeData ( DataExchanger::WIDGET_TO_MODEL );
			$this->modelBooktype->save();
		}
		$this->modelBooktype->load(array('科学'),array('type'));
		$this->modelBooktype->printStruct();
		//设置 MODEL_TO_WIDGET数据交换
		$this->viewTestDataExchange->exchangeData ( DataExchanger::MODEL_TO_WIDGET );
	}
}
