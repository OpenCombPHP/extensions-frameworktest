<?php 
namespace org\opencomb\frameworktest\testmvc\testviewwindow ;

use org\jecat\framework\verifier\Length;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\view\DataExchanger;
use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\auth\IdManager;

class TestFormWidget extends ControlPanel
{
	
	/**
	 * @example /MVC模式/视图窗体(控件)/表单控件
	 *
	 *
	 */
	
	public function createBeanConfig()
	{	
		$arrBean = array(
			'view:testFormWidget' => array(
					'template' => 'test-mvc/testviewwindow/TestFormWidget.html' ,
					//表单视图
					'class' => 'form' ,
					'widgets'=>array(
							array(
									'id'=>'paginator',
									'class' => 'paginator' ,
									'count' =>3,
									'nums'=>6,
							),
							//复选控件
							array(
									'id'=>'test_check',
									'class'=>'checkbox',
									'type'=>'checkbox',
									'title'=>'多选',
							),
							//单选控件
							array(
									'id'=>'test_radio',
									'class'=>'checkbox',
									'type'=>'radio',
									'title'=>'单选',
							),
							//文件上传
							array(
									'id'=>'test_file',
									'class'=>'file',
									'type'=>'folder',
									'title'=>'文件上传',
							),
							//下拉列表
							array(
									'id'=>'test_select',
									'class'=>'select',
									'type'=>'select',
									'title'=>'select',
									'options'=>array(
									array('A','1',false),	
									array('B','1',false),
									)
							),
							//下拉列表多选
							array(
									'id'=>'test_selectlist',
									//class属性与select的不同
									'class'=>'list',
									'title'=>'selectlist',
									'size'=>6,
									'options'=>array(
											array('A','1',true),
											array('B','1',true),
											array('C','1',true),
											array('D','1',false),
											array('E','1',false),
											array('F','1',false),
											array('G','1',false),
											array('H','1',false),
											array('I','1',false),
									)
							),
							//文本
							array(
									'id'=>'test_text',
									'class'=>'text',
									'type'=>'text',
									'title'=>'text',
							),
							//密码控件
							array(
									'id'=>'test_password',
									'class'=>'text',
									'type'=>'password',
									'title'=>'password',
							),
							//文本域
							array(
									'id'=>'test_miltiple',
									'class'=>'text',
									'type'=>'multiple',
									'title'=>'multiple',
							),
					),
					
			),
		);
		return $arrBean;
	}
	
	public function process()
	{	
	}
}
