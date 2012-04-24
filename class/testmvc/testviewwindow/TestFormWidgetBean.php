<?php 
namespace org\opencomb\frameworktest\testmvc\testviewwindow ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestFormWidgetBean extends ControlPanel
{
	
	/**
	 * @example /MVC模式/视图窗体(控件)/表单控件
	 *
	 *
	 */
	
	public function createBeanConfig()
	{	
		$arrBean = array(
			'view:testFormWidgetBean' => array(
					'template' => 'test-mvc/testviewwindow/TestFormWidgetBean.html' ,
					//表单视图
					'class' => 'form' ,
					'widgets'=>array(
							array(
									//'value' => '', //控件的value可以是任意类型，
									//'valueString' => '', //控件的value为String类型
									//'formName' => 'test_text', //可以指定formName，如果不写，则默认id作为name
									'readOnly' => false, //控件为只读
									'disabled' => false, //控件为可用
									//校验器
									'verifiers' => array(
											array(
												'verifier:number' => array(
													'int' => "int",//整数验证
												),
											)	
									),
									/*
									'verifier:number' => array(
										'int' => "int",//整数验证
									),
									*/
									//控件id，默认情况为控件的name
									'id'=>'test_text',
									//控件所属的类
									'class'=>'text',
									//控件类别
									'type'=>'text',
									//控件标题
									'title'=>'text',
							),
					),
					
			),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		if($this->viewTestFormWidgetBean->isSubmit($this->params))
		{	
			$this->viewTestFormWidgetBean->loadWidgets( $this->params );
			echo $this->viewTestFormWidgetBean->widget('test_text')->value();
			if (! $this->viewTestFormWidgetBean->verifyWidgets ())
			{
				return;
			}
		}
	}
}

