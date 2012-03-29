<?php
namespace org\opencomb\frameworktest\db\sql ;

use org\jecat\framework\db\sql2\SQL;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestSelect extends ControlPanel
{
	/**
	 * @wiki /数据库/SQL/Select
	 * @example /数据库/SQL/Select
	 * @forwiki /数据库/SQL/Select
	 */
	public function process()
	{
		// --------------
		// 创建并初始化一个 sql Select 对象
		$aSelectA = SQL::select('frameworktest:book','b')
		
						// 添加多个返回字段
						->addColumns('bookname','category','publish')
						// 如果需要设置字段别名，可以传入一个数组，数组的键做为字段的别名
						->addColumns( array(
							'oriPrice' => 'price' ,
							'isbn' => 'ISBN' ,
						) )
						// 以 sql 表达式形式添加返回字段
						->addColumnsExpr("price*discount as payPrice, round(words/pages) as wordsPerPage")
						
						->setLimit(30,0)
						->addOrderBy('price') ;
						
						//->where()->add() ;
		
		
		// --------------
		// 用字符串格式 sql 创建一个 Select 对象 
		$aSelectB = SQL::make("select bookname, `category`, `publish`, price as oriPrice, ISBN as isbn, price*discount as payPrice, round(words/pages) as wordsPerPage
									from frameworktest:book
									order by price asc
									limit 0, 30 ;") ;
		// 打印 select 对象， $aSelectA 和 $aSelectB 的内容一样，但是通过 SQL::make() 函数从一个自由书写的sql语句创建对象，效率要低于直接创建的对象
		echo $aSelectA, '<br />', $aSelectB, '<br />' ;
		
		
		// --------------
		// 多个数据表
		// 继续对 $aSelectA 操作, 在 book 表上连接一个数据表 bookcomment , 用两个表的 bid 作外键，bookcomment的别名为 bc
		$aSelectA->joinTable('b','frameworktest:bookcomment',null,'bid','bc','INNERT') ;
		
		// 在 $aSelectB 对象上以表达式形式添加关联表
		//$aSelectB->joinTableExpr('b',"inner join frameworktest:bookcomment as bc using(bid)") ;
		
		echo $aSelectA, '<br />', $aSelectB, '<br />' ;
		
	}
}
