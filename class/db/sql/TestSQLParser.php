<?php
namespace org\opencomb\frameworktest\db\sql ;

use org\jecat\framework\db\sql\parser\BaseParserFactory;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestSQLParser extends ControlPanel
{
	/**
	 */
	public function process()
	{
		$aParser = BaseParserFactory::singleton()->create() ;

		// , array("3","yyyyyyyyyy","","3","4")		
		$arrSqls[] = "SHOW TABLES" ;
		
		$arrSqls[] = "insert into `coresystem_group` (gid,name,lft,rgt) values (0,'系统管理员组',1,2)" ;
		
		$arrSqls[] = "CREATE TABLE IF NOT EXISTS `oc3_coresystem_user` ( `uid` INT ( 10 ) NOT NULL AUTO_INCREMENT , `username` VARCHAR ( 60 ) NOT NULL , `password` VARCHAR ( 32 ) CHARACTER SET latin1 NOT NULL , `lastLoginTime` INT ( 10 ) NOT NULL , `lastLoginIp` VARCHAR ( 15 ) CHARACTER SET latin1 NOT NULL , `registerTime` INT ( 10 ) NOT NULL , `registerIp` VARCHAR ( 15 ) CHARACTER SET latin1 NOT NULL , `activeTime` INT ( 10 ) NOT NULL , `activeIp` VARCHAR ( 15 ) CHARACTER SET latin1 NOT NULL , PRIMARY KEY ( `uid` ) , UNIQUE KEY `username` ( `username` ) ) ENGINE = MyISAM AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8" ;

		$arrSqls[] = "SHOW CREATE TABLE `opencms_article`" ;

		$arrSqls[] = "REPLACE INTO `oc3_opencms_category` (`cid`,`title`,`description`,`lft`,`rgt`) VALUES (@1 , @2 , @3,@4,@5) " ;
		
		$arrSqls[] = "DROP TABLE `opencms_article` ;" ;
		
		$arrSqls[] = "CREATE TABLE `opencms_article` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `from` varchar(60) NOT NULL COMMENT '来源',
  `cid` int(8) NOT NULL,
  `title` varchar(120) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `createTime` int(10) NOT NULL,
  `author` int(10) NOT NULL,
  `views` int(8) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `recommend` int(2) NOT NULL COMMENT '推荐星级, 0-10',
  PRIMARY KEY (`aid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8" ;
		
		$arrSqls[] = " delete from table1 as t1 join table2 as t2 using (clm) where t1.id=12 ;" ;
		$arrSqls[] = " insert into some_table (id,name,title) values (12,'alee','niubi'), (select * from table) ;" ;
		$arrSqls[] = "select * from tablename join table_a on (c.dd=b.dd) left join ss where 1 limit 0, 30" ;
		$arrSqls[] = " insert into some_table set id=123, username='xiaoxiao' ;" ;
		$arrSqls[] = " update some_table as t1, some_table as t2 set t1.id=123, t2.username='xiaoxiao', t2.view = t2.view+1 ;" ;
		
		$arrSqls[] = "select bookname, category, publish, price as oriPrice, ISBN as isbn, price*discount as payPrice, round(words/pages) as wordsPerPage
                                    from frameworktest:book
                                    order by price asc
                                    limit 0, 30 ;" ;
		$arrSqls[] = " select *, a.id as id from (select * from xxx where 1) as tq where 1" ;
		$arrSqls[] = " select *, sum(a), `xx.dd`.ss from table_a as ` a b `, coresystem:user, (select * from xxx) as tq,:wonei_members where ` a b ` . `id`='xxddsd23lmef'; " ;
		$arrSqls[] = " SELECT @0, sjd=@1, zhong:sss  `state`.`system`,`state`.`stid`,`state`.`forwardtid`,`state`.`replytid`,`state`.`uid`,`state`.`title`,`state`.`body`,`state`.`article_title`,`state`.`article_uid`,`state`.`time`,`state`.`data`,`state`.`client`,`state`.`stid`,`state.info`.`uid`,`state.info`.`sex`,`state.info`.`nickname`,`state.info`.`email`,`state.info`.`emailcheck`,`state.info`.`qq`,`state.info`.`msn`,`state.info`.`birthyear`,`state.info`.`birthmonth`,`state.info`.`birthday`,`state.info`.`blood`,`state.info`.`marry`,`state.info`.`birthprovince`,`state.info`.`birthcity`,`state.info`.`resideprovince`,`state.info`.`residecity`,`state.info`.`note`,`state.info`.`spacenote`,`state.info`.`authstr`,`state.info`.`theme`,`state.info`.`nocss`,`state.info`.`css`,`state.info`.`privacy`,`state.info`.`friend`,`state.info`.`feedfriend`,`state.info`.`sendmail`,`state.info`.`setting`,`state.info`.`field_1`,`state.info`.`menunum`,`state.info`.`field_3`,`state.info`.`achievement`,`state.info`.`avatar`,`state.info`.`uid`,`state.subscription`.`from`,`state.subscription`.`to`,`state.subscription`.`from`,`state.subscription`.`to` FROM `userstate_state` AS `state` LEFT JOIN ( `oauth_state` AS `state.astate` ) ON (`state`.`stid` = `state.astate`.`stid`) LEFT JOIN ( `myspace_spacefield` AS `state.info` ) ON (`state`.`uid` = `state.info`.`uid`) LEFT JOIN ( `userstate_state_attachment` AS `state.attachments` ) ON (`state`.`stid` = `state.attachments`.`stid`) LEFT JOIN ( `friends_subscription` AS `state.subscription` ) ON (`state`.`uid` = `state.subscription`.`to`) GROUP BY `state`.`stid` ORDER BY state.time DESC  LIMIT rand(),30 ;" ;
		
		

		foreach($arrSqls as $sSql)
		{
			echo $sSql ;
			
			$fMicrotime = microtime(true) ;
			$arrTokens = $aParser->parse($sSql) ;
			$fMicrotime = microtime(true) - $fMicrotime ;
			
			echo '<div><textarea style="width:600;height:400px">' ;
			print_r($arrTokens) ;
			echo '</textarea></div>' ;
			
			echo 'parse time : ', sprintf('%.10f',$fMicrotime), ' <br />' ;
			
			echo '<hr />' ;
		}
	}
}

