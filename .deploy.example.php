<?php

//http://ripeworks.com/pomander/getting-started.html
$env->repository('git@github.com:WilliGant/Statistizzle.git')
    ->deploy_to('path on the server')
    ->user('bob')
    ->key_path("/Users/will/.ssh/id_rsa")
    ->app([ // Your application server(s) host or IP
            'some ip address'
          ]
    )
;

after('deploy:update', function($app) {
    info("deploy", "Running composer");
    exec_cmd("composer install --no-interaction");
    info("deploy","Running migrate");
    exec_cmd("php artisan migrate");
});