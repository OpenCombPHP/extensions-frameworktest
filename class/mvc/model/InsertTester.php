<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\db\DB;

use org\jecat\framework\mvc\model\Model;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class InsertTester extends ControlPanel
{
	public function process()
	{
	    
	    
	    // 用 addRow 向模型新增加一行，然后将这一行 insert 到数据表
	    Model::Create('frameworktest:book')->addRow(array(
	            'bookname' => 'xxxxsss' ,
	            'price' => '33' ,
	    ))->insert() ;
	    
	    // 最后插入ID
	    echo DB::singleton()->lastInsertId();
	    
	    exit;
	    
	    
	    
		// 插入一本书以及一个作者
		Model::Create('frameworktest:book')
				->hasAndBelongsToMany('frameworktest:author','frameworktest:book_link_author','bid','bid','aid','aid')
				->insert(
					array(
					        //第一本书
					        array(
					                'bookname' => 'xxx' ,
					                'price' => 'xxx' ,
					                'author' => array(
					                        //第一个作者信息
					                        array(
					                                'author.author' => 'alee' ,
					                        ),
					                        array(
					                                'author.author' => 'aaron' ,
					                        )
					                )
					        ),
					        //第二本书
					        array(
					                'bookname' => 'xxx2' ,
					                'price' => 'xxx' ,
					                'author' => array(
					                        //第一个作者信息
					                        array(
					                                'author.author' => 'alee2' ,
					                        ),
					                        array(
					                                'author.author' => 'aaron2' ,
					                        )
					                )
					        )
			        )
				) ;
		
		
		exit;
				
	}
}

