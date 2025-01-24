<?php

require_once __DIR__ . '/vendor/autoload.php'; // load classes
session_start(); // start a session

use Controller\SessionController;

// instantiate classes
$sessionController = new SessionController();

// search action by http request get
$action = $_GET['action'] ?? 'home'; // by default

// create a view
function renderView(string $page, string $title = "", array $data = []) {
    ob_start(); // output buffering
    extract($data); // export data

    $viewFile = __DIR__ . "/view/{$page}.php";
    if (file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo "Page not found: \"$page\"";
    }

    $content = ob_get_clean(); 
    require __DIR__ . '/view/template.php'; // get template
}

// routeur
switch ($action) {
    // navbar links
    case "home":
        renderView('home', 'Home');
        break;

    case "login":
        renderView('login', 'Login');
        break;

    case "chat":
        renderView('chat', 'Chat');
        break;

    case "register":
        renderView('register', 'Register');
        break;

    // session actions
    case "treatRegister":
        $sessionController->treatRegister();
        break;

    case "treatLogin":
        $sessionController->treatLogin();
        break;

    case "logout":
        $sessionController->logout();
        break;

    // if no actions found
    default:
        renderView('home');
        break;
}
