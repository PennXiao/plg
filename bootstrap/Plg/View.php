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

		
		$option = [];//模板参数配置
		if ( strtoupper($_ENV['APP_DEBUG']) === 'TRUE' ) {
			#开发模式的配置
		}else{
			#生产模式的配置
			$option['cache'] = BASEDIR_.'/tmp/cache/view';
		}

        $twig = new \Twig_Environment($loader,$option);
        return $twig->render($str.'.view.html',$param);
	}

}