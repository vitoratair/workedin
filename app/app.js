var app = angular.module('app',['ngRoute']);

app.config(function($routeProvider, $locationProvider)
{

   $routeProvider

   .when('/', {
      templateUrl : 'app/views/content.html',
      controller     : 'HomeCtrl',
   })

   // caso não seja nenhum desses, redirecione para a rota '/'
   .otherwise ({ redirectTo: '/' });

});

