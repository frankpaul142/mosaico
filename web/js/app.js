var app = angular.module('Mosaico', ['MosaicoControllers', 'MosaicoDirectives', 'ngRoute', 'mgcrea.ngStrap', 'ngAnimate']);

// configs

app.config(function($routeProvider /*, $locationProvider*/ ) {
	$routeProvider.
	when('/', {
		templateUrl: 'partials/home.html',
		controller: 'HomeCtrl',
	}).
	when('/productos/:cat_id/:subcat_id', {
		templateUrl: 'partials/productos.html',
		controller: 'ProductosCtrl'
	}).
	otherwise({
		redirectTo: '/'
	});

	// $locationProvider.html5Mode(true);
	// $locationProvider.hashPrefix('!');
});

app.config(function($popoverProvider) {
	angular.extend($popoverProvider.defaults, {
		autoClose: true,
	});
});

// --configs

// run

app.run(function($rootScope, $location) {
	$rootScope.$on('duScrollspy:becameActive', function($event, $element) {
		var hash = conts[$element.attr('du-scrollspy')];
		if (hash) {
			$location.url(hash);
			$rootScope.$apply();
		}
	});
});

// --run


// values

app.value('duScrollOffset', 76).value('duScrollEasing', easingFunction);
app.value('baseUrl', document.getElementById('linkBaseUrl').getAttribute('href'));

// --values


// variables

var categoriaActual = 1;
var subcategoriaActual = 1;
var conts = [];
conts['cont1'] = '';
conts['cont2'] = 'subastas';
conts['cont3'] = 'contacto';
conts['cont4'] = 'productos/' + categoriaActual + '/' + subcategoriaActual;
var categories;
var carrito = [];
var popover;

// --variables


// funciones

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
		}).error(function(data) {
			console.log('error al cargar productos, reintentando en 30 segundos');
			setTimeout(function() {loadProducts($http, $rootScope)},30000);
		});
	}
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

function htmlCarrito(data) {
	var html = '';
	if (Object.keys(data).length > 1) {
		html = '<table><thead><tr><th>Producto</th><th>Cantidad</th><th></th></tr></thead>';
		for (c in data) {
			if (c != 'total') {
				html += '<tr><td class="table-name">' + data[c]['name'] + '</td>';
				html += '<td>' + data[c]['value'] + '</td>';
				if (data[c]['won'] == 'NO') {
					html += '<td ng-click="removeFromCart(' + c + ')" style="cursor:pointer; "><img src="img/cerrar-01.jpg"></td></tr>';
				} else {
					html += '<td></td>';
				}
			}
		}
		html += '</table><b>Total: $' + data['total'] + '</b>';
	} else {
		html = '<b>No hay productos</b>';
	}
	return html;
}

// --funciones
