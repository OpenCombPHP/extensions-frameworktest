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

class TestVerifier extends ControlPanel
{
	public function createBeanConfig()
	{	
		$arrBean = array(
			'view:testVerifier' => array(
					'template' => 'test-mvc/testviewwindow/TestVerifier.html' ,
					'class' => 'form' ,
					'widgets'=>array(
							
							/**
							 * @example /MVC模式/数据交换和数据校验/数据校验/Email格式校验
							 */
							
							array(
									'id'=>'test_email',
									'class'=>'text',
									'type'=>'text',
									//当输入错误时，title被显示出来，可以识别哪个控件出错
									'title'=>'Email格式校验',
									//email校验器
									'verifier:email'=>array(),
							),
							
							
							/* 以下校验为bug，无法实现
							 array(
							 		'id'=>'test_fileext',
							 		'class'=>'file',
							 		'type'=>'folder',
							 		'folder'=>Extension::flyWeight('frameworktest')->publicFolder()->path().'/frameworktest_img',
							 		'title'=>'文件扩展名验证',
							 		'verifier:extname'=>array(
							 				'exts'=>array('dd','ee'),
							 				'alow'=>true,
							 		),
							
							 ),
							
							array(
									'id'=>'test_filesize',
									'class'=>'file',
									'type'=>'folder',
									'folder'=>Extension::flyWeight('frameworktest')->publicFolder()->path().'/frameworktest_img',
									'title'=>'文件大小验证',
									'verifier:filesize'=>array(
											'nMaxSize'=>100,
											'nMinSize'=>20,
									),
							),
							
							array(
									'id'=>'test_imageArea',
									'class'=>'file',
									'type'=>'folder',
									'folder'=>Extension::flyWeight('frameworktest')->publicFolder()->path().'/frameworktest_img',
									'title'=>'图片大小验证',
									'verifier:imagearea'=>array(
											'max'=>100,
											'min'=>20,
									),
							),
							array(
									'id'=>'test_imagesize',
									'class'=>'file',
									'type'=>'folder',
									'folder'=>Extensi	'verifier:imagesize'=>array(
											'maxWidth'=>100,
											'maxHeight'=>20,
											'minWidth'=>20,
											'minHeight'=>20,
									),on::flyWeight('frameworktest')->publicFolder()->path().'/frameworktest_img',
									'title'=>'图片大小验证',
									'verifier:imagesize'=>array(
											'maxWidth'=>100,
											'maxHeight'=>20,
											'minWidth'=>20,
											'minHeight'=>20,
									),
							),
							*/
							
							/**
							 * @example /MVC模式/数据交换和数据校验/数据校验/字符长度校验器(Length)
							 *
							 */
							
							array(
									'id'=>'test_length',
									'class'=>'text',
									'type'=>'text',
									'title'=>'字符长度校验器(Length)',
									//字符长度校验器
									'verifier:length' => array(
											'max' => 2,
											'min' => 1,
											'byte' => true,
									)
							),
							
							/**
							 * @example /MVC模式/数据交换和数据校验/数据校验/校验内容为空(notempty)
							 */
							
							array(
									'id'=>'test_notempty',
									'class'=>'text',
									'type'=>'text',
									'title'=>'校验内容为空(notempty)',
									//校验内容为空(notempty)
									'verifier:notempty'=>array(),
							),
							
							/**
							 * @example /MVC模式/数据交换和数据校验/数据校验/数字校验器(Number)
							 */
							array(
									'id' => 'test_int',
									'class' => 'text',
									'title' => '数字校验器(int)',
									'verifier:number' => array(
										'int' => "int",//整数验证
									)	
										
							),
							
							array(
									'id' => 'test_number',
									'class' => 'text',
									'title' => '数字校验器(Number)',
									'verifier:number' => array(
											'int' => "number",//数字验证
									)
							
							),
							
							array(
									'id' => 'test_float',
									'class' => 'text',
									'title' => '数字校验器(float)',
									'verifier:number' => array(
											'int' => "float",//小数验证
									)
							
							),
							
							array(
									'id'=>'test_password',
									'class'=>'text',
									'type'=>'password',
									'title'=>'password',
							),
							array(
									'id'=>'test_RepeatPassword',
									'class'=>'text',
									'type'=>'password',
									'title'=>'password',
							),
		
							/**
							 * @example /MVC模式/数据交换和数据校验/数据校验/内容一致性效验(same)
							 * @forwiki /MVC模式/数据交换和数据校验/数据校验/内容一致性效验(same)
							 */
							
							array(
									'class' => 'group',
									//校验test_password和test_RepeatPassword的内容一致性
									'widgets' => array('test_password','test_RepeatPassword'),
									//same校验器
									'verifier:same'=>array(),
							),
							
							array(
									'id' => 'test_version',
									'class' => 'text',
									'type' => 'text',
									'title' => '版本校验(version)',
									'verifier:version' => array(),
							)
							
							
					),
					
			),
		);
		return $arrBean;
	}
	
	public function process()
	{	
		
		if($this->viewTestVerifier->isSubmit($this->params))
		{
			$this->viewTestVerifier->loadWidgets( $this->params );
			echo $this->viewTestVerifier->widget('test_int')->value();
			if (! $this->viewTestVerifier->verifyWidgets ())
			{
				return;
			}
		}
		
	}
}
