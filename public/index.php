<?php

require '../vendor/autoload.php';

require '../app/functions/functions.php';

use app\controller\TestController;
use app\core\RouterCore;

new RouterCore();
$app = new TestController();
