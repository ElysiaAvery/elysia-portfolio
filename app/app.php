<?php
  date_default_timezone_set('America/Los_Angeles');

  require_once __DIR__."/../vendor/autoload.php";

  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
  ));

  use Symfony\Component\HttpFoundation\Request;
  Request::enableHttpMethodParameterOverride();

  $app->get("/", function() use ($app) {
    return $app['twig']->render('index.html.twig');
  });

  $app->get("/about", function() use ($app) {
    $description = 'I am an ambitious and motivated Developer. I began coding when I was a teen ( and it was only basic HTML! ). I also love Illustrating and feel that shows in the design of my applications. My current favorite languages to write in are JavaScript, Java, and PHP.';
    return $app['twig']->render('about.html.twig', array('medescription' => $description));
  });

  $app->get("/contact", function() use ($app) {
    return $app['twig']->render('contact.html.twig');
  });

  $app->get("/volunteer", function() use ($app) {
    return $app['twig']->render('volunteer.html.twig');
  });


  return $app;
?>
