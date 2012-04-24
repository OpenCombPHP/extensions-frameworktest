<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class ViewNode extends ControlPanel
{
	/**
	 * @example //MVC模式/视图窗体(控件)/菜单控件
	 * 
	 * 
	 */
	
	public function createBeanConfig()
	{	
		$sVar = '这是view的vars属性的显示，相当于variables()->set()';
		$arrBean = array(
			'view:ViewNode' => array(
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
							//Menu菜单控件配置
							array(
									'id'=>'testMenu',
									'class'=>'menu',
									'title'=>'广告名称',
									//Item项配置
									'item:testSub1'=>array(
											'title'=>'testSub1', //项目的名称
											'menu'=>1,  //允许有子项
											'tearoff'=>1, //1为弹出显示,0为列表显示
											'showDepths'=>5,
											'link'=>'http://www.baidu.com',
											'item:testSub22'=>array(
													'title'=>'testSub22',
													'menu'=>1,
													'tearoff'=>1,
													'item:test221'=>array(
															'title'=>'testSub221',
															)
													),
											'item:testSub23'=>array(
													'title'=>'testSub23',
													'menu'=>1,
													'tearoff'=>1,
													'item:test231'=>array(
															'title'=>'testSub231',
													)
											),
											),
									'item:testSub2'=>array(
											'title'=>'testSub2',
											)
							),
					),
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
					'calss'=>'model',
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
	}
	
}

