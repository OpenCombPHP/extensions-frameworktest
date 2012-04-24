<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

class CreateView extends ControlPanel
{	
	public function createBeanConfig()
	{	
		$sVar = '这是view的vars属性的显示，相当于variables()->set()';
		$arrBean = array(
			'view:createView1' => array(
					//模板文件
					'template' => 'test-mvc/testview/CreateView1.html' ,
					//视图类型
					'class' => 'view' ,
					//绑定model
					'model'=>'author',
					//数据交互，相当于variables()->set()
					'vars'=>array('sVar'=>$sVar),
					//控件的设置
					'widgets'=>array(
							array(
									'id'=>'advertis_name_text',
									'class'=>'text',
									'title'=>'广告名称',
							),
					),
				),
			'model:author'=>array(
					'calss'=>'model',
					'orm'=>array(
					'table'=>'author',		
					)
			),
			
			'view:createView2' => array(
					'template' => 'test-mvc/testview/CreateView2.html' ,
					'class' => 'view' ,
					'widgets'=>array(
							array(
									'id'=>'advertis_name_text',
									'class'=>'text',
									'title'=>'广告名称',
							),
					),
			),/*
			'view:createView3' => array(
					'template' => 'test-mvc/testview/CreateView3.html' ,
					'class' => 'view' ,
					'widgets'=>array(
							array(
									'id'=>'advertis_name_text',
									'class'=>'text',
									'title'=>'广告名称',
							),
					),
			)
			*/						
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$this->modelAuthor->load();
		
		//$this->params->setValue['title']="theParams";
	}
	
	public function printContro()
	{
		$skey="theController调用成功";
		$skey1="theController调用bu成功";
		$this->viewCreateView1->createMessage(Message::success,"%s",$skey);
		$this->viewCreateView1->createMessage(Message::success,"%s",$skey1);
		$skey3="theController调用view2成功";
		$this->viewCreateView2->createMessage(Message::success,"%s",$skey3);
	}
}

