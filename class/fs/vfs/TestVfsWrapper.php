<?php
namespace org\opencomb\frameworktest\fs\vfs ;

use org\jecat\framework\fs\vfs\VirtualFileSystem;
use org\jecat\framework\fs\vfs\LocalFileSystem;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestVfsWrapper extends ControlPanel
{
	public function process()
	{
		VirtualFileSystem::flyweight('test')
			->mount('aaa/bbb/ccc',new LocalFileSystem(__DIR__)) ;
			
		$hHere = opendir("test://aaa/bbb/ccc") ;
		echo readdir($hHere) ;		
		echo readdir($hHere) ;		
	}
}


