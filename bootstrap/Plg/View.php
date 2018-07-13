<?php
namespace Plg;
class View{
	public function __construct(string $str,array $param){
		$loader = new \Twig_Loader_Filesystem(BASEDIR_.'/src/view');
        $twig = new \Twig_Environment($loader);
        return $twig->render('index.html',['title'=>'hi']);
	}

	public static function make( $str='index', $param=[]){
		$loader = new \Twig_Loader_Filesystem(BASEDIR_.'/src/view');
		$option['cache'] = getenv('APP_DEBUG')==true?false:BASEDIR_.'/tmp/cache/view';
        $twig = new \Twig_Environment($loader,$option);
        return $twig->render($str.'.view.html',$param);
	}

}