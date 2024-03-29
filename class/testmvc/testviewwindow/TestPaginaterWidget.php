<?php 
namespace org\opencomb\frameworktest\testmvc\testviewwindow ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestPaginaterWidget extends ControlPanel
{
	/**
	 * @example /MVC模式/视图窗体(控件)/分页控件
	 * 
	 *
	 */
	
	public function createBeanConfig()
	{	
		$arrBean = array(
			'title'=>'分页控制器',
			'description'=>'分页控制器的使用',
			'keywords'=>'蜂巢系统',
			'view:testPaginater' => array(
					'template' => 'test-mvc/testviewwindow/TestPaginaterWidget.html' ,
					'class' => 'form' ,
					'model'=>'article',
					//分页控件
					'widget:paginator' => array(
						'class' => 'paginator' ,
						'count'=>5, //每页5项
						'nums' =>5, //显示5个页码
					) ,
			),
				
			'model:article'=>array(
					'class'=>'model',
					'list'=>true,
					'orm'=>array(
							'limit'=>20,
							'table'=>'opencms:article',
					)
			)
		);
		return $arrBean;
	}
	
	public function process()
	{	
		$this->modelArticle->load();
	}
}

