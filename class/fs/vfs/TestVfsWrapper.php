<?php
namespace org\opencomb\frameworktest\fs\vfs ;

use org\jecat\framework\fs\vfs\VFSWrapper;
use org\jecat\framework\fs\vfs\VirtualFileSystem;
use org\jecat\framework\fs\vfs\LocalFileSystem;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestVfsWrapper extends ControlPanel
{
	public function process()
	{
		VFSWrapper::vfs('test')
			->mount('aaa/bbb/ccc',new LocalFileSystem(__DIR__)) ;
			
		// 测试目录操作
		$hHere = opendir("test://aaa/bbb/ccc") ;
		while($sFilename=readdir($hHere))
		{
			echo $sFilename, "<br />\r\n" ;
		}
		rewinddir($hHere) ;
		while($sFilename=readdir($hHere))
		{
			echo $sFilename, "<br />\r\n" ;
		}
		closedir($hHere) ;

		// 测试文件操作
		$sFilePath = "test://aaa/bbb/ccc/".basename(__FILE__) ;
		$hFile = fopen($sFilePath,'r') ;
		$sContents = '' ;
		while( !feof($hFile) )
		{
			$sContents.= fread($hFile,10) ;
		}
		
		if( file_get_contents(__FILE__) === $sContents )
		{		
			echo highlight_string( $sContents ) ;
		}
		fclose($hFile) ;
		
		// stat
		echo 'test://aaa/bbb/ccc is_dir() ',is_dir('test://aaa/bbb/ccc')? 'true': 'false', "<br />\r\n" ;
		echo 'test://aaa/bbb/ccc is_file() ',is_file('test://aaa/bbb/ccc')? 'true': 'false', "<br />\r\n" ;
		echo 'test://aaa/bbb/ccc file_exists() ',file_exists('test://aaa/bbb/ccc')? 'true': 'false', "<br />\r\n" ;
		
		echo $sFilePath, ' is_dir() ',is_dir($sFilePath)? 'true': 'false', "<br />\r\n" ;
		echo $sFilePath, ' is_file() ',is_file($sFilePath)? 'true': 'false', "<br />\r\n" ;
		echo $sFilePath, ' file_exists() ',file_exists($sFilePath)? 'true': 'false', "<br />\r\n" ;
		
		// wrapper 性能测试
		$fTime = microtime(true) ;
		for($i=0;$i<1000;$i++)
		{
			clearstatcache() ;
			is_file(__FILE__) ;
		}
		printf( "is_file(local path) %f sec <br />\r\n", (microtime(true)-$fTime)/1000 ) ;
		
		$fTime = microtime(true) ;
		for($i=0;$i<1000;$i++)
		{
			clearstatcache() ;
			is_file($sFilePath) ;
		}
		printf( "is_file(vfs url) %f sec <br />\r\n", (microtime(true)-$fTime)/1000 ) ;
	}
}


