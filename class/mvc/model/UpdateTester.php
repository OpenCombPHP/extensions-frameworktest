<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\mvc\model\Model;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class UpdateTester extends ControlPanel
{
	public function process()
	{
	    /**
	     * 更新操作
	     */
		Model::create('frameworktest:book')                // 表名（必填）
				->hasOne("frameworktest:author")           // 单表关联
				->update(
					array(                                // 更新的内容
						'bookname' => '计算机科学2' ,
						'price' => '1' ,
						'`price`=`price`+1' ,		       // 表达式
					)
					, "bid=2"                              // 条件
				) ;
		exit;
	}
}

