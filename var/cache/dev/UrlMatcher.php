<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/affectation' => [[['_route' => 'affectation', '_controller' => 'App\\Controller\\Agence\\AffectationController::affectation'], null, null, null, false, false, null]],
        '/api/Envoie' => [[['_route' => 'Envoie.add', '_controller' => 'App\\Controller\\Agence\\EnvoieCrontrollerController::newEnvoie'], null, ['POST' => 0], null, false, false, null]],
        '/api/newretrait' => [[['_route' => 'retrait.add', '_controller' => 'App\\Controller\\Agence\\RetraitController::retrait'], null, ['POST' => 0], null, false, false, null]],
        '/api/newtransactionE' => [[['_route' => 'transaction.add', '_controller' => 'App\\Controller\\Agence\\TransactionController::envoie'], null, ['POST' => 0], null, false, false, null]],
        '/api/newtransactionR' => [[['_route' => 'transaction.sub', '_controller' => 'App\\Controller\\Agence\\TransactionController::retrait'], null, ['POST' => 0], null, false, false, null]],
        '/api/newdepot' => [[['_route' => 'depot.add', '_controller' => 'App\\Controller\\Service\\DepotController::newDepot'], null, ['POST' => 0], null, false, false, null]],
        '/apinouveaucompte' => [[['_route' => 'nouveaucompte.add', '_controller' => 'App\\Controller\\Service\\ExistedPartenaireController::newPartenaire'], null, null, null, false, false, null]],
        '/api/newpartenaire' => [[['_route' => 'partenaire.new', '_controller' => 'App\\Controller\\Service\\PartenaireController::newPartenaire'], null, ['POST' => 0], null, false, false, null]],
        '/api/user' => [[['_route' => 'user.show', '_controller' => 'App\\Controller\\UserController::showUser'], null, ['GET' => 0], null, false, false, null]],
        '/admin' => [[['_route' => 'easyadmin', '_controller' => 'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController::indexAction'], null, null, null, true, false, null]],
        '/depot' => [[['_route' => 'depot', '_controller' => 'App\\Controller\\DepotController::Depot'], null, ['POST' => 0], null, false, false, null]],
        '/login_check' => [[['_route' => 'login_check'], null, ['POST' => 0], null, false, false, null]],
        '/docs' => [[['_route' => 'swagger_ui', '_controller' => 'api_platform.swagger.action.ui'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:77)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:110)'
                            .'|epots(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:144)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:182)'
                                .')'
                            .')'
                        .')'
                        .'|co(?'
                            .'|ntexts/(.+)(?:\\.([^/]++))?(*:224)'
                            .'|mptes(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:258)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:296)'
                                .')'
                            .')'
                        .')'
                        .'|affectations(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:340)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:378)'
                            .')'
                        .')'
                        .'|roles(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:414)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:452)'
                            .')'
                        .')'
                        .'|transactions(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:495)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:533)'
                            .')'
                        .')'
                        .'|partenaires(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:575)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:613)'
                            .')'
                        .')'
                        .'|media_objects(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:657)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:692)'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:727)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:765)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        77 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        110 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        144 => [
            [['_route' => 'api_depots_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_depots_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        182 => [
            [['_route' => 'api_depots_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_depots_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_depots_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_depots_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        224 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        258 => [
            [['_route' => 'api_comptes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comptes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        296 => [
            [['_route' => 'api_comptes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comptes_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_comptes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_comptes_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        340 => [
            [['_route' => 'api_affectations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Affectation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_affectations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Affectation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        378 => [
            [['_route' => 'api_affectations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Affectation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_affectations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Affectation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_affectations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Affectation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_affectations_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Affectation', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        414 => [
            [['_route' => 'api_roles_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_roles_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        452 => [
            [['_route' => 'api_roles_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_roles_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_roles_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_roles_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Role', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        495 => [
            [['_route' => 'api_transactions_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        533 => [
            [['_route' => 'api_transactions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_transactions_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_transactions_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        575 => [
            [['_route' => 'api_partenaires_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        613 => [
            [['_route' => 'api_partenaires_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        657 => [
            [['_route' => 'api_media_objects_post_collection', '_controller' => 'App\\Controller\\CreateMediaObjectAction', '_format' => null, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_media_objects_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        692 => [[['_route' => 'api_media_objects_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        727 => [
            [['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        765 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
