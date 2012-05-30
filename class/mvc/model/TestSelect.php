<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\mvc\model\Model;

use org\jecat\framework\db\DB;

use org\jecat\framework\mvc;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestSelect extends ControlPanel
{
	public function process()
	{
	    
	    
	    /**
	     * 单表查询
	     * @var unknown_type
	     */
	    /*
	    $aModel = Model::Create('frameworktest:book')
	    ->where('bid = 1')
	    ->load() ;
	    
	    $aModel = Model::Create('frameworktest:book')
	    ->load("1",'bid') ;
	    */
	    
	    /**
	     * 多表关联查询
	     * 此例子为查出某一出版社最新的20本书，包括其作者信息,以及某用户对当前书最新的10条评论。
	     * @var unknown_type
	     */
		/*
	    $aModel = Model::Create('frameworktest:book')
		->hasOne('frameworktest:author','tid','aid')
		->hasMany('frameworktest:bookcomment','bid','bid')
		->where("bookcomment.uid = 1")                        //针对"一对多"进行条件限定
		->where('publish = "中国文学出版社"')
		->limit(10,0,'bookcomment')                        //针对"一对多"进行条件限定
		->limit(20)
		->order('bookcomment.time')                        //针对"一对多"进行条件限定
		->order('time')
		->load() ;
		*/
	    
		$aModel = Model::Create('frameworktest:book')
		->hasAndBelongsToMany('frameworktest:authorinfo','frameworktest:book_link_author','bid','bid','aid','aid')
		->limit(20)
		->load() ;
		
		/**
		 * ->where(array('publish = "中国文学出版社"',"bookcomment.uid = 1"))        支持
		 */
		
		DB::singleton()->executeLog() ;
		exit;
		
		$aModel = mvc\M('airticket:contact')
		
				->hasOne('coresystem:user','uid')
					->hasMany('coresystem:group_user_link','uid','uid','lnk')
					->hasMany('coresystem:group_user_link',array('uid'=>'uid'),'lnk')
					->assoc(array(
						'assoc' => 'hasMany' ,
						'table' => '' ,
						'fromKey' => '' ,
						'toKey' => '' ,
						'toBridgeKeys' => '' ,
						'toBridgeKeys' => '' ,
						'on' => '' ,
						'limit' => '' ,
							'order' => '' ,
					))
				->back('lnk')
				
				->where('1','contact.uid','lnk')
				->order('uid')
				->group('uid')
				->limit(2)
				->load() ;
		
		echo $aModel->data('name') ;
		echo $aModel->data('user.username') ;
		echo $aModel->data('user.lnk.uid') ;
		
		$aModel['user.username'] ;
		$aModel->next('user.lnk') ;
		$aModel['user.username'] ;
		
		
		$aModel['user.lnk.uid'] ;
		
		
		mvc\M('opencms:category')
				->hasMany('opencms:article')
				->where("category.lft>=12 and category.rgt<14=")
				->update(array(
					'cid' => 14 ,
				)) ;
		
				
		
		
		$aModel = mvc\M('opencms:category')
			->hasMany('opencms:article') ;
		$aModel['xxx'] = 1 ;
		$aModel['yyy'] = 1 ;
		$aModel['zzz'] = 1 ;
		$aModel->save() ;
		
		
		$aModel = mvc\M('opencms:category')
			->hasMany('opencms:article') ;
		
		
		
		mvc\M('opencms:category')
			->update(array('xx'),array('id'=>1)) ;
	}
}

