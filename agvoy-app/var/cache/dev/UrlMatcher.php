<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/agvoy' => [[['_route' => 'agvoy', '_controller' => 'App\\Controller\\AgvoyController::index'], null, null, null, false, false, null]],
        '/basket' => [[['_route' => 'basket', '_controller' => 'App\\Controller\\AgvoyController::basket'], null, ['GET' => 0], null, false, false, null]],
        '/backoffice/owner/list' => [[['_route' => 'owner_index', '_controller' => 'App\\Controller\\OwnerController::index'], null, ['GET' => 0], null, false, false, null]],
        '/backoffice/owner/new' => [[['_route' => 'owner_new', '_controller' => 'App\\Controller\\OwnerController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/backoffice/region/list' => [[['_route' => 'region_index', '_controller' => 'App\\Controller\\RegionController::index'], null, ['GET' => 0], null, false, false, null]],
        '/backoffice/region/new' => [[['_route' => 'region_new', '_controller' => 'App\\Controller\\RegionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/room/list' => [[['_route' => 'room_index', '_controller' => 'App\\Controller\\RoomController::index'], null, ['GET' => 0], null, false, false, null]],
        '/room/new' => [[['_route' => 'room_new', '_controller' => 'App\\Controller\\RoomController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/agvoy/([^/]++)(*:184)'
                .'|/backoffice/(?'
                    .'|owner/([^/]++)(?'
                        .'|(*:224)'
                        .'|/edit(*:237)'
                        .'|(*:245)'
                    .')'
                    .'|region/([^/]++)(?'
                        .'|(*:272)'
                        .'|/edit(*:285)'
                        .'|(*:293)'
                    .')'
                .')'
                .'|/room/(?'
                    .'|([^/]++)(?'
                        .'|(*:323)'
                        .'|/edit(*:336)'
                        .'|(*:344)'
                    .')'
                    .'|mark/(\\d+)(*:363)'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        184 => [[['_route' => 'agvoy_region', '_controller' => 'App\\Controller\\AgvoyController::listName'], ['regionNameSelected'], null, null, false, true, null]],
        224 => [[['_route' => 'owner_show', '_controller' => 'App\\Controller\\OwnerController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        237 => [[['_route' => 'owner_edit', '_controller' => 'App\\Controller\\OwnerController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        245 => [[['_route' => 'owner_delete', '_controller' => 'App\\Controller\\OwnerController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        272 => [[['_route' => 'region_show', '_controller' => 'App\\Controller\\RegionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        285 => [[['_route' => 'region_edit', '_controller' => 'App\\Controller\\RegionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        293 => [[['_route' => 'region_delete', '_controller' => 'App\\Controller\\RegionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        323 => [[['_route' => 'room_show', '_controller' => 'App\\Controller\\RoomController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        336 => [[['_route' => 'room_edit', '_controller' => 'App\\Controller\\RoomController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        344 => [[['_route' => 'room_delete', '_controller' => 'App\\Controller\\RoomController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        363 => [
            [['_route' => 'room_mark', '_controller' => 'App\\Controller\\RoomController::markAction'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
