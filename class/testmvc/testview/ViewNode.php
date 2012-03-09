<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\jecat\framework\verifier\Length;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;

class ViewNode extends ControlPanel
{
	/*
	 * @example /MVC模式/视图窗体(控件)/菜单控件
	 */
	
	public function createBeanConfig()
	{	
		$sVar = '这是view的vars属性的显示，相当于variables()->set()';
		$arrBean = array(
			'view:viewNode' => array(
					'template' => 'test-mvc/testview/ViewNode.html' ,
					'class' => 'view' ,
					'model'=>'author',
					'vars'=>array('sVar'=>$sVar),
					'widgets'=>array(
							array(
									'id'=>'test_widget',
									'class'=>'text',
									'title'=>'广告名称',
							),
							array(
									//对menu标签进行设置
									'id'=>'testMenu',
									'class'=>'menu',
									'title'=>'广告名称',
									//设置项
									'item:testSub1'=>array(
											'title'=>'testSub1',
											//设置允许子项目
											'menu'=>'1',
											//项目弹出设置，1为弹出，0为列表
											'tearoff'=>1,
											//显示层级
											'showDepths'=>5,
											'link'=>'http://www.baidu.com',
											'item:testSub11'=>array(
													'title'=>'testSub11',
													'menu'=>1,
													'tearoff'=>1,
													'item:test121'=>array(
															'title'=>'testSub121',
															)
													),
											'item:testSub12'=>array(
													'title'=>'testSub12',
													'menu'=>1,
													'tearoff'=>1,
													'item:test122'=>array(
															'title'=>'testSub122',
													)
											),
											),
									'item:testSub2'=>array(
											'title'=>'testSub2',
											'menu'=>'1',
											'tearoff'=>0,
											'showdepths'=>0,
											'link'=>'http://www.baidu.com',
											'item:testSub21'=>array(
													'title'=>'testSub21',
													'menu'=>1,
													'tearoff'=>0,
													'item:test211'=>array(
															'title'=>'testSub211',
													)
											),
											)
							),
					),
				),
			'view:createView2' => array(
					'template' => 'test-mvc/testview/CreateView2.html' ,
					'class' => 'view' ,
					'model'=>'authorinfo',
					'widgets'=>array(
							array(
									'id'=>'advertis_name_text',
									'class'=>'text',
									'title'=>'广告名称',
							),
					),
			),
			'model:authorinfo'=>array(
					'class'=>'model',
					'list'=>'true',
					'orm'=>array(
						'list'=>10,
						'table'=>'authorinfo',
						'where'=>array(array('eq','aid','100')),		
					)
			),
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
			),
			'model:author'=>array(
					'class'=>'model',
					'list'=>'true',
					'orm'=>array(
						'list'=>10,
						'table'=>'author',
					)
					
			),										
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$this->modelAuthor->load();
		$skey2="view:msgqueue";
		$skey3="widget:msgqueue";
		//<msgqueue/>为controller消息队列，包含controller,view和widget的消息队列
		$this->createMessage(Message::success,"controller:msgqueue");
		//<view:msgqueue/>为view消息队列，包含view和widget的消息队列
		$this->viewViewNode->createMessage(Message::success,"%s",$skey2);
		//<widget:msgqueue/>为widget消息队列
		$this->viewViewNode->widget('test_widget')->createMessage(Message::success,"%s",$skey3);
	}
	
}
