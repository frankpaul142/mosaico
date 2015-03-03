var app = angular.module('Mosaico', ['ngRoute', 'duScroll', 'MosaicoControllers','ui.bootstrap']);

app.config(function($routeProvider /*, $locationProvider*/ ) {
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
	when('/productos/:cat_id/:subcat_id', {
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
app.value('baseUrl', document.getElementById('linkBaseUrl').getAttribute('href'));

app.run(function($rootScope, $location) {
	$rootScope.$on('duScrollspy:becameActive', function($event, $element) {
		var hash = conts[$element.attr('du-scrollspy')];
		if (hash) {
			$location.url(hash);
			$rootScope.$apply();
		}
	});
});

app.factory('loadedServ', function($rootScope) {
	var loaded;
	return function(arg) {
		if (arg) {
			loaded = arg;
			$rootScope.loaded = arg;
		} else {
			return loaded;
		}
	}
});


var categoriaActual = 1;
var subcategoriaActual = 1;
var conts = [];
conts['cont1'] = '/';
conts['cont2'] = 'subastas';
conts['cont3'] = 'productos/' + categoriaActual + '/' + subcategoriaActual;
conts['cont4'] = 'contacto';
var categories;

function easingFunction(t) {
	return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
}

function addScrollSpy() {
	$('.circle').each(function(index) {
		$(this).attr('du-scrollspy', 'cont' + (index + 1));
	});
}

function loadProducts($http, $rootScope) {
	console.log('loadProducts');
	if (typeof(categories) === 'undefined') {
		$http.get('site/load-products').success(function(response) {
			categories = response;
			$rootScope.categories = categories;
			$rootScope.categoria = categoriaActual;
			$rootScope.subcategoria = subcategoriaActual;
			$rootScope.loaded = true;
			// loadedServ(true);
			//console.log($scope.inProducts);
		}).error(function(data) {
			console.log('error al cargar productos:');
		});
	}
	/*else {
			console.log('categories no loading');
			$scope.categories = categories;
			$scope.categoria = categoriaActual;
			$scope.subcategoria = subcategoriaActual;
			$rootScope.loaded = true;
		}*/
}

function watchLoaded($scope, $rootScope) {
	$rootScope.$watch('loaded', function() {
		$scope.loaded = $rootScope.loaded;
		if ($scope.loaded) {
			$scope.categories = categories;
			$scope.categoria = categoriaActual;
			$scope.subcategoria = subcategoriaActual;
		}
	});
}

function watchLoadedCategory($scope, $rootScope) {
	if ($scope.loaded) {
		$scope.subcategory = [];
		$scope.subcategoryId = [];
		for (subc in $scope.categories[$rootScope.categoria]) {
			if ($scope.categories[$rootScope.categoria][subc].name) {
				$scope.subcategory.push($scope.categories[$rootScope.categoria][subc].name);
				$scope.subcategoryId.push(subc);
			}
		}
	}
}
