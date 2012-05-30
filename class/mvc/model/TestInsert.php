<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\mvc\model\Model;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestInsert extends ControlPanel
{
	public function process()
	{
	    exit;
	    
		// 插入一本书以及一个作者
		Model::Create('frameworktest:book')
				->hasAndBelongsToMany('frameworktest:author','frameworktest:book_link_author','bid','bid','aid','aid')
				->insert(
					array(
					        array(
					                'bookname' => 'xxx' ,
					                'price' => 'xxx' ,
					                'author' => array(
					                        array(
					                                'author.author' => 'alee' ,
					                        ),
					                        array(
					                                'author.author' => 'aaron' ,
					                        )
					                )
					        ),
					        array(
					                'bookname' => 'xxx2' ,
					                'price' => 'xxx' ,
					                'author' => array(
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
		
		// 一次插入两本书，每本书都有两个作者
		echo '<hr/>' ;
		mvc\M('frameworktest:book')
				->hasAndBelongsToMany("frameworktest:author","frameworktest:bridge",'bid','aid')
				->insert(
					array(
						// 第一本书
						array(
							'bookname' => 'xxx' ,
							'price' => 'xxx' ,
							'author' => array(
								// 第一个作者
								array(
									'author.author' => 'alee' ,
								) ,
								// 第二个作者
								array(
									'author.author' => 'xiaye' ,
								) ,
							) ,
						) ,
						// 第二本书
						array(
							'bookname' => 'xxx' ,
							'price' => 'xxx' ,
							'author' => array(
								// 第一个作者
								array(
									'author.author' => 'alee' ,
								) ,
								// 第二个作者
								array(
									'author.author' => 'xiaye' ,
								) ,
							)
						) ,
					)
				) ;
				
				
		// 用 addRow 向模型新增加一行，然后将这一行 insert 到数据表
		mvc\M('frameworktest:book')->addRow(array(
					'bookname' => 'xxxx' ,
					'price' => 'yyy' ,
		))->insert() ;
	}
}

