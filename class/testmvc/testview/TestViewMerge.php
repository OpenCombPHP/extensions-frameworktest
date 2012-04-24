<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestViewMerge extends ControlPanel
{
	
	/**
	 * @example /MVC模式/视图/视图的组合
	 */
	
	/**
	 * @example /MVC模式/视图/视图的创建
	 * 视图创建的写法1和视图创建的写法2效果是一样的。
	 * 
	 */
	
	public function createBeanConfig()
	{		
		$sVar = '这是view的vars属性的显示，相当于variables()->set()';
		$arrBean = array(
			//视图创建的写法1
			//子视图view:subView1和子视图view:subView2组合成一个视图view:testViewMerge
			'view:testViewMerge' => array(
					'view:subView1'=>array(
							'template' => 'test-mvc/testview/TestViewMergeSubView1.html' ,
							'class' => 'view'
					),
					'view:subView2'=>array(
							'template' => 'test-mvc/testview/TestViewMergeSubView1.html' ,
							'class' => 'view'
					),
					'template' => 'test-mvc/testview/TestViewMerge.html' ,
					//view为form类型
					'class' => 'form',
					//绑定模型
					'model'=> 'author',
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
			//视图创建的写法2
			'views' => array(
					array(
						//name为视图名称
						'name' => 'arrView1',	
						'template' => 'test-mvc/testview/TestViewArrView1.html' ,
						'class' => 'view',
					),
					array(
						'name' => 'arrView2',
						'template' => 'test-mvc/testview/TestViewArrView2.html' ,
						'class' => 'view',
					),
			)
		);
		return $arrBean;
	}
	
	public function process()
	{	
		
	}
}

