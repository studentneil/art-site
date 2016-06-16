<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 02/06/2016
 * Time: 00:35
 */
namespace Art\Controllers;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    public function indexAction(Request $request, Application $app)
    {
        $img = $app['db']->fetchAll('SELECT * FROM images');
        $templateName = 'home';
        $args_array = array(
            'images' => $img
        );

        return $app['twig']->render($templateName.'.html.twig', $args_array);
    }
    
    public function artAction(Request $request, Application $app)
    {
        $templateName = 'art';
        $args_array = array();
        
        return $app['twig']->render($templateName.'.html.twig', $args_array);
    }
}