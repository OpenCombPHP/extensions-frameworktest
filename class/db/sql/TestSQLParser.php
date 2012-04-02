<?php
namespace org\opencomb\frameworktest\db\sql ;

use org\jecat\framework\db\sql\parser\BaseParserFactory;
use org\jecat\framework\db\sql\SQL;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestSQLParser extends ControlPanel
{
	/**
	 */
	public function process()
	{
		$aParser = BaseParserFactory::singleton()->create() ;

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
