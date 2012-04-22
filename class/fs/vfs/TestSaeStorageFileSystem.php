<?php
namespace org\opencomb\frameworktest\fs\vfs ;

use org\opencomb\platform\ext\Extension;
use org\jecat\framework\fs\vfs\VFSWrapper;
use cn\com\sina\sae\SaeStorage;
use org\opencomb\driver\sae\fs\SaeStorageFileSystem;
use org\jecat\framework\fs\vfs\VirtualFileSystem;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestSaeStorageFileSystem extends ControlPanel
{
	public function process()
	{
		$aSetting = Extension::flyweight('frameworktest')->setting() ;

		define( 'SAE_STOREHOST', 'http://stor.sae.sina.com.cn/storageApi.php' );
		define( 'SAE_S3HOST', 'http://s3.sae.sina.com.cn/s3Api.php' );
		$_SERVER[ 'HTTP_APPNAME' ] = $aSetting->item('/sae','HTTP_APPNAME','HTTP_APPNAME') ;
		
		$aSaeStorage = new SaeStorage(
				$aSetting->item('/sae','accessKey','accessKey'), $aSetting->item('/sae','secretKey','secretKey')
		) ;
		
		$aSaeStorFs = new SaeStorageFileSystem($aSaeStorage,'ocstor') ;
		VFSWrapper::vfs('test')->mount('aaa/bbb/ccc',$aSaeStorFs) ;
			
		print_r($aSaeStorage->getList('ocstor')) ;
		// file_put_contents('test://aaa/bbb/ccc/samefile','123') ;
	}

}

?>