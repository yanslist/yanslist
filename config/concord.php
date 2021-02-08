<?php

return [
    'modules' => [
        /**
         * Example:
         * VendorA\ModuleX\Providers\ModuleServiceProvider::class,
         * VendorB\ModuleY\Providers\ModuleServiceProvider::class
         *
         */
        App\Modules\Post\Providers\ModuleServiceProvider::class => [
            'migrations' => true
        ],
    ],
    'register_route_models' => true
];
