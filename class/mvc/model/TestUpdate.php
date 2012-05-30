<?php
namespace org\opencomb\frameworktest\mvc\model ;

class TestInsert extends ControlPanel
{
	public function process()
	{
		Model::create('frameworktest:author')
				->hasOne("frameworktest:authorinfo")
				->update(
					array(
						'bookname' => 'xxx' ,
						'price' => 'xxx' ,
						'`price`+=1' ,		// 表达式
					)
					, "aid=2"
				) ;
	}
}

