<?php
namespace org\opencomb\frameworktest\testmvc\frame ;

use org\opencomb\coresystem\mvc\controller\Controller;

class TestFrontController extends Controller
{
	public function defaultFrameConfig() {
		return array ('class' => 'org\\opencomb\\frameworktest\\testmvc\\frame\\TestFrontFrame' );
	}
}
