<?php
namespace org\opencomb\frameworktest\mvc\model ;

class TestSelect extends ControlPanel
{
	public function process()
	{
		$aModel = mvc\M('airticket_contact')
			->hasOne('coresystem_user','uid',null,'user')
			->hasMany('coresystem_group_user_link','uid','uid','group','$.user')
			->assoc(array(
				'assoc' => 'hasOne' ,
				'table' => 'hasOne' ,
				'name' => 'hasOne' ,
			),'$.user.group')
			->where('1','$.uid')
			->order('uid')
			->group('uid')
			->limit(1)
			->load() ;
		
		
		
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

