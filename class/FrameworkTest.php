<?php
namespace org\opencomb\frameworktest;

use org\jecat\framework\lang\aop\AOP;
use org\opencomb\platform\ext\Extension;
use org\jecat\framework\bean\BeanFactory;



use org\opencomb\frameworktest\aspect;
use org\opencomb\platform\system\PlatformSerializer;
use org\jecat\framework\ui\xhtml\weave\Patch;
use org\jecat\framework\ui\xhtml\weave\WeaveManager;

class FrameworkTest extends Extension
{
	public function load()
	{
		AOP::singleton()->register('org\\opencomb\\frameworktest\\aspect\\MainMenuAspect') ;
	}
}

?>