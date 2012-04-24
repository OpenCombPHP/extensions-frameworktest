<?php 
namespace org\opencomb\frameworktest ;

use org\opencomb\coresystem\mvc\controller\ControlPanel;

/**
 * 文件系统
 * 	文件操作
 * 		新建文件
 * 		找到文件对象
 * 		读/写文件内容
 * 		文件各项属性
 * 		删除文件
 * 	目录操作
 * 		新建目录(递归)
 * 		遍历目录
 * 	挂载文件系统
 * 	Local文件系统
 * 	Zip文件系统
 * 	FTP文件系统
 *
 * 缓存(cache)
 * 	高速缓存：Memcache/APC/XCache 
 * 配置(setting)
 * 会话(session)
 *
 * 数据库
 * 	连接数据库
 *	Select
 *		单表查询
 *		查询条件(Criteria/Restraction/Order: Order/Limit/Group/Where)
 *		Join 关联查询
 *		动态结果集
 *		Union 查询
 *	Insert
 *	Update
 *	Delete 删除
 * 	数据库反射
 *
 * 模板引擎
 * 	模板文件
 * 	宏
 *  标签
 * 	模板引擎的输入/输出
 * 	自定义模板标签和宏
 * 	模板编织
 * 	
 * MVC模式
 * 	数据库模型
 * 		模型的基本操作(新建、保存、删除、加载、克隆)
 * 			模型加载的高级条件
 * 		模型列表(ModelList)
 * 			列表中新增模型
 * 		数据表关联(hasOne,hasMany,belongsTo,hasAndBelongsToMany)
 * 		不用Bean构建模型
 * 		模型的原型
 * 		原型的映射
 * 	视图
 * 		视图的基本操作(显示、变量、预定义变量)
 * 		模板标签
 * 		视图组合 	
 * 		绑定模型
 * 		表单视图
 * 		视图的Bean配置
 * 
 * 	视图窗体(控件)
 * 		表单控件
 * 			... ...
 * 		分页控件
 * 		菜单控件
 * 	控制器
 * 		控制器的基本操作（执行、成员及其访问规则）
 * 			控制器 Action 机制
 * 		请求-回应(request-response)
 * 			Ajax请求
 * 		控制器组合
 * 		控制器的Bean配置
 * 
 * 	数据交换 和 数据校验
 * 
 * 认证和授权
 * 	认证(Id,IdManager,Session)
 * 	授权和许可
 * 		许可：要求用户登录
 * 		许可：逻辑分组
 * 		许可：自定义
 * 		许可：权限(蜂巢)
 * 
 * 模式
 * 	单例和享元
 * 	Bean对象
 * 	迭代器
 * 	面向方面(AOP)
 * 	
 * 杂项
 *   字符串类
 *   栈和队列
 *   正则表达式
 */
class TestIndex extends ControlPanel
{
	public function createBeanConfig()
	{		
		$arrBean = array(
			'view' => array(
					'template' => 'TestIndex.html' ,
					'class' => 'view' 
					),
		);
		return $arrBean;
	}
	
	public function process()
	{}
}

