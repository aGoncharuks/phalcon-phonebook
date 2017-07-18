<?phpuse Phalcon\Loader;use Phalcon\Di\FactoryDefault;use Phalcon\Mvc\View;use Phalcon\Mvc\Url as UrlProvider;use Phalcon\Mvc\Application;try {  // Register the loader component  $loader = new Loader();  $loader->registerDirs(array(    '../app/controllers',    '../app/models'  ));  // DI container  $di = new FactoryDefault();  // Register the view service  $di->set('view', function() {    $view = new View();    $view->setViewsDir('../app/views/');    return $view;  });  // Register the url service  $di->set('url', function() {    $url = new UrlProvider();    $url->setBaseUri('/phalcon-phonebook/');    return $url;  });  // Handle requests  $app = new Application($di);  echo $app->handle()->getContent();} catch (\Exception $e) {  echo "Exception: ", $e->getMessage();}