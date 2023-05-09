<?php
//Start a new session
session_start();


const DOC_ROOT = "Views/partitions/";
const DOC_FE = "Views/frontend/";
const DOC_URL = "/mvcproject/index.php?";

require './Core/Database.php'; // nhung file Core.php vao file index

require './Models/BaseModel.php';

require './Controllers/BaseController.php';

$controllerName = ucfirst((strtolower($_REQUEST['controller'] ?? 'home')) . 'Controller');


$actionName = $_REQUEST['action'] ?? 'index';

require "./Controllers/${controllerName}.php";

$controllerObject = new $controllerName;

$controllerObject->$actionName();
