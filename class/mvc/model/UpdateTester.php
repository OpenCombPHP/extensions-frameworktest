<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\mvc\model\Model;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestUpdate extends ControlPanel
{
	public function process()
	{
		Model::create('frameworktest:book')
				->hasOne("frameworktest:author")
				//->hasOne("frameworktest:authorinfo")
				->update(
					array(
						'bookname' => '计算机科学2' ,
						'price' => '1' ,
						'`price`=`price`+1' ,		// 表达式
					)
					, "bid=2"
				) ;
		exit;
	}
}

