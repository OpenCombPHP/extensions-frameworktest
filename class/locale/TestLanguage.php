<?php
namespace org\opencomb\frameworktest\locale ;

use org\jecat\framework\locale\Locale;
use org\jecat\framework\locale\LocaleManager;
use org\opencomb\coresystem\mvc\controller\ControlPanel;

class TestLanguage extends ControlPanel
{
	public function process()
	{
		Locale::singleton()->trans('xxxx',array()) ;
	}
}


