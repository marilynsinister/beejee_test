<?
require_once 'functions.php';

require_once 'config/db.php';
require_once 'main/database.php';

require_once 'main/model.php';
require_once 'main/view.php';
require_once 'main/controller.php';

require_once 'router.php';
Router::start(); // запускаем маршрутизатор