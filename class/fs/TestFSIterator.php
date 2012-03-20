<?php
namespace org\opencomb\frameworktest\fs ;

use org\opencomb\coresystem\mvc\controller\ControlPanel ;
use org\jecat\framework\fs\Folder;
use org\jecat\framework\fs\FSIterator ;

class TestFSIterator extends ControlPanel
{
	public function createBeanConfig()
	{
		return array(
			'view:view' => array(
				'template' => 'fs/TestFSIterator.html' ,
			),
		);
	}
	
	/**
	 * @example /文件系统/迭代器
	 * @forwiki /文件系统/迭代器
	 */
	public function process(){
		// 得到 FileSystem 对象
		$aFileSystem = Folder::singleton() ;
		// 本例从 /settings 开始迭代
		$aFolder = $aFileSystem->findFolder('/settings');
		
		// ===默认===
		$aIterator = $aFolder->iterator() ;
		$this->view->variables()->set('iterator',$aIterator);
		
		// ===不包含文件夹===
		$aNoFolderIterator = $aFolder->iterator(FSIterator::FLAG_DEFAULT ^ FSIterator::CONTAIN_FOLDER) ;
		$this->view->variables()->set('noFolderIterator',$aNoFolderIterator);
		
		// ===不包含文件===
		$aNoFileIterator = $aFolder->iterator(FSIterator::FLAG_DEFAULT ^ FSIterator::CONTAIN_FILE) ;
		$this->view->variables()->set('noFileIterator',$aNoFileIterator);
		
		// ===不进行递归===
		$aNoRecursiveIterator = $aFolder->iterator(FSIterator::FLAG_DEFAULT ^ FSIterator::RECURSIVE_SEARCH) ;
		$this->view->variables()->set('noRecursiveIterator',$aNoRecursiveIterator);
		
		// ===返回FSO对象===
		$aReturnFSOIterator = $aFolder->iterator(FSIterator::FLAG_DEFAULT | FSIterator::RETURN_FSO) ;
		$this->view->variables()->set('returnFSOIterator',$aReturnFSOIterator);
		
		// ===返回相对路径===
		$aReturnRelativeIterator = $aFolder->iterator(FSIterator::FLAG_DEFAULT ^ FSIterator::RETURN_ABSOLUTE_PATH) ;
		$this->view->variables()->set('returnRelativeIterator',$aReturnRelativeIterator);
	}
}
