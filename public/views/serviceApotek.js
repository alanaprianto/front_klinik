'use strict';

angular.module('adminApp')
    .factory('ServicesApotek', function($resource, config) {
    return $resource(config.url + ':module/:submodule/:controller/:action/:id', {
        id: '@_id'
    }, {
    	getApotekRecipes: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'apotek',
                controller: 'recipes',
                action: 'list'
            }
        },
        getApotekRecipesCreate: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'apotek',
                controller: 'recipes',
            }
        },
        createApotekRecipes: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id/:name_tuslah/:tuslah_amount/:amount/:price/:inventory',
            params: {
                module: 'api',
                submodule: 'apotek',
                controller: 'recipes',
                reference_id: null,
                name_tusla: null,
                tuslah_amount: null,
                amount: null,
                price: null, 
                inventory:null,
            }
        },
        getApotekRecipesId: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'apotek',
                controller: 'recipes',
                id: null
            }
        }
    });
});