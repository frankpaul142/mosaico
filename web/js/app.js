var app = angular.module('Mosaico', ['ngRoute', 'duScroll', 'MosaicoControllers']);

app.config(function($routeProvider/*, $locationProvider*/) {
	$routeProvider.
	when('/', {
		templateUrl: 'partials/productos.html',
		controller: 'HomeCtrl',
	}).
	when('/home', {
		redirectTo: '/'
	}).
	when('/subastas', {
		templateUrl: 'partials/productos.html',
		controller: 'SubastasCtrl'
	}).
	when('/productos', {
		templateUrl: 'partials/productos.html',
		controller: 'ProductosCtrl'
	}).
	when('/contacto', {
		templateUrl: 'partials/productos.html',
		controller: 'ContactoCtrl'
	}).
	otherwise({
		redirectTo: '/'
	});

	// $locationProvider.html5Mode(true);
	// $locationProvider.hashPrefix('!');
});

app.value('duScrollOffset', 210).value('duScrollEasing', easingFunction);

app.run(function($rootScope, $location) {
	$rootScope.$on('duScrollspy:becameActive', function($event, $element) {
		var hash = conts[$element.attr('du-scrollspy')];
		if (hash) {
			$location.url(hash);
			$rootScope.$apply();
		}
	});
});

var conts=[];
conts['cont1']='/';
conts['cont2']='subastas';
conts['cont3']='productos';
conts['cont4']='contacto';
var categories;

function easingFunction(t) {
	return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
}

function addScrollSpy() {
	$('.circle').each(function(index) {
		$(this).attr('du-scrollspy', 'cont' + (index + 1));
	});
}

function loadProducts($scope, $http) {
	if (typeof(categories) === 'undefined') {
        $http.get('site/load-products').success(function(response) {
            categories = response;
            $scope.categories = categories;
            $scope.loaded=true;
        }).error(function (data) {
        	console.log('error al cargar productos:');
        });
    } else {
        $scope.categories = categories;
        $scope.loaded=true;
    }
}