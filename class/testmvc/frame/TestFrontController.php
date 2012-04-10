<?php
namespace org\opencomb\frameworktest\testmvc\frame ;

use org\jecat\framework\mvc\model\db\Category;
use org\jecat\framework\message\Message;
use org\jecat\framework\mvc\model\IModel;
use org\jecat\framework\mvc\model\db\orm\Prototype;
use org\jecat\framework\verifier\Length;
use org\jecat\framework\mvc\view\DataExchanger;
use org\opencomb\platform\ext\Extension;
use org\opencomb\oauth\adapter\AdapterManager;
use org\opencomb\coresystem\mvc\controller\Controller;

class TestFrontController extends Controller
{
	public function defaultFrameConfig() {
		return array ('class' => 'org\\opencomb\\frameworktest\\testmvc\\frame\\TestFrontFrame' );
	}
}
?>