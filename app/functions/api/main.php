<?php

require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/database/main.php");
require_once(__DIR__ . "/routes/core/Router.php");

$appModels         = ['Player', 'PlayerTarget'];
$appControllers    = ['PlayerController', 'GEOController'];
$appRoutes         = ['PlayerRouter', 'GEORouter'];

__importProviders('model', $appModels);
__importProviders('controller', $appControllers);
__importProviders('router', $appRoutes);
