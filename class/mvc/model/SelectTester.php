<?php
namespace org\opencomb\frameworktest\mvc\model ;

use org\jecat\framework\mvc\model\Prototype;

use org\jecat\framework\mvc\model\Model;

use org\jecat\framework\db\DB;

use org\jecat\framework\mvc;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

class SelectTester extends ControlPanel
{
	public function process()
	{
	    
	    
	    /**
	     * 单表查询
	     * @var unknown_type
	     */
	    
	    $aModel = Model::Create('frameworktest:book')
	    ->where('tid = 0')                                // 通过方法设置WHERE
	    ->load() ;
	    /*
	    $aModel = Model::Create('frameworktest:book')
	    ->load("1",'bid') ;                                // 通过参数设置WHERE
	    */
	    
	    
	    
	    
	    /**
	     * 多表关联查询 --  方式1
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
	    
	    DB::singleton()->executeLog() ;
	    exit;
	    */
	    
	    /**
	     * 多表关联查询 --  方式2
	     * 用于“方法1”不能满足然情况。
	     * @var unknown_type
	     */
	    /*
	    $aModel = Model::Create('frameworktest:book')
	    ->ass(array(
	            'assoc' => Prototype::hasMany ,
	            'table' => 'frameworktest:bookcomment' ,
	            'fromKey' => 'bid' ,
	            'toKey' => 'bid' ,
	            'limitLen' => '10' ,
	            'limitFrom' => '10' ,
	            'orderBy' => array('time'=>true) ,
	            'where' => 'username = "xiaohong"' ,
	    ))
	    ->where('publish = "中国文学出版社"')
	    ->limit(20)
	    ->order('time')
	    ->load() ;
	    */
	    
		/*
		$aModel = Model::Create('frameworktest:book')
		->hasAndBelongsToMany('frameworktest:authorinfo','frameworktest:book_link_author','bid','bid','aid','aid')
		->limit(20)
		->load() ;
		*/
		/**
		 * ->where(array('publish = "中国文学出版社"',"bookcomment.uid = 1"))        支持
		 */
		
	    
	    // 打印SQL语句
		//DB::singleton()->executeLog() ;
	    
	    
	    /**
	     * 数据处理
	     */
	    echo $aModel->data('bid') ;
	    while ($aModel->next()){
	        echo $aModel->data('bid') ;
	    }
		
		exit;
		
	}
}

