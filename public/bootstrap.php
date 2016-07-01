<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 01/07/2016
 * Time: 23:46
 */
require __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
// turn on for developing
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../templates'
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.named_packages' => array(
        'js'     => array('version' => 'uikitJS', 'base_path' => '/js'),
        'css'    => array('version' => 'css', 'base_path' => '/css'),
        'images' => array('version' => 'original', 'base_path' => '/images')
    )
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'daveg',
        'host'     => 'localhost',
        'user'     => 'neil',
        'password' => 'neil',
        'charset'  => 'utf8mb4',
        'port'     => '3306'
    ),
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\SwiftmailerServiceProvider());

return $app;