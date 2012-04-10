<?php 
namespace org\opencomb\frameworktest\testmvc\testview ;

use org\jecat\framework\verifier\Length;

use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\view\layout\ViewLayoutFrame;

class TestLayoutFrame extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			//ViewLayoutFrame:dd
			'viewlayoutframe:dd'=>array(
// 					array(
// 						'name'=>"aa",
// 						'template' => 'test-mvc/testview/TestLayoutFrame.html' ,
// 						'class'=>'view',
// 					),
// 					array(
// 						'name'=>"bb",
// 						'template' => 'test-mvc/testview/TestLayoutFrame.html' ,
// 						'class' => 'view',
// 					),
				'views' =>array(
						'view path',
						array(),
				),
				'class'=>'viewlayoutframe',
				'type'=>'tab',
			),
			/*
			'view:testMVC' => array(
					'template' => 'test-mvc/testview/TestLayoutFrame.html' ,
					'class' => 'view' 
			),
			*/
// 			'view:dd'=>array(
// 					'template' => 'test-mvc/testview/TestLayoutFrame.html' ,
// 					'class'=>'view',
// 			)
		);
		return $arrBean;
	}
	
	public function process()
	{	
		echo strpos("viewsdfds:sdfsdf","view");
	}
}
