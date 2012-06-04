<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\mvc\model\Model;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class DeleteTester extends ControlPanel
{
	public function process()
	{
		Model::create('frameworktest:book')->delete("frameworktest_book.bid = 2") ;
		exit;
	}
}

