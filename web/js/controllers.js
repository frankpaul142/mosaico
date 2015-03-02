var controllers = angular.module('MosaicoControllers', []);

controllers.controller('HomeCtrl', function($scope, $document, $rootScope) {
	console.log('HomeCtrl');
	$rootScope.inProducts = false;
	watchLoaded($scope, $rootScope);
	$document.scrollTopAnimated(0, 1300).then(function() {
		addScrollSpy();
	});
});

controllers.controller('SubastasCtrl', function($scope, $document, $rootScope) {
	console.log('SubastasController');
	$rootScope.inProducts = false;
	watchLoaded($scope, $rootScope);
	var section = angular.element(document.getElementById('cont2'));
	$document.scrollToElementAnimated(section, 50, 1500).then(function() {
		addScrollSpy();
	});
});

controllers.controller('ProductosCtrl', function($scope, $document, $routeParams, $rootScope) {
	console.log('ProductosController');
	$rootScope.inProducts = true;
	$scope.loaded = $rootScope.loaded;
	watchLoaded($scope, $rootScope);
	categoriaActual = $routeParams.cat_id;
	$rootScope.categoria=categoriaActual;
	subcategoriaActual = $routeParams.subcat_id;
	conts['cont3'] = 'productos/' + categoriaActual + '/' + subcategoriaActual;
	var section = angular.element(document.getElementById('cont3'));
	$document.scrollToElementAnimated(section, 50, 1500).then(function() {
		addScrollSpy();
	});
});

controllers.controller('ContactoCtrl', function($scope, $document, $rootScope) {
	console.log('ContactoController');
	$rootScope.inProducts = false;
	watchLoaded($scope, $rootScope);
	var section = angular.element(document.getElementById('cont4'));
	$document.scrollToElementAnimated(section, 0, 1500).then(function() {
		addScrollSpy();
	});
});

controllers.controller('MenuCtrl', function($scope, $document, $location, $rootScope, $http) {
	$rootScope.loaded = false;
	$rootScope.inProducts = false;
	loadProducts($http, $rootScope);
	watchLoaded($scope, $rootScope);
	$rootScope.$watch('inProducts', function() {
		$scope.inProducts = $rootScope.inProducts;
	});
	$scope.$watch('loaded', function() {
		watchLoadedCategory($scope,$rootScope);
	});
	$rootScope.$watch('categoria', function() {
		watchLoadedCategory($scope,$rootScope);
	});
	$scope.toSection = function(sectionId, categoriaId, subcategoriaId) {
		console.log('toSection');console.log('cat: '+$scope.categoria);
		var hash = conts[sectionId];
		if (categoriaId && subcategoriaId) {
			hash = 'productos/' + categoriaId + '/' + subcategoriaId;
		}
		$('.circle').removeAttr('du-scrollspy');
		var section = angular.element(document.getElementById(sectionId));
		$document.scrollToElementAnimated(section, 50, 1500).then(function() {
			addScrollSpy();
			if (hash) {
				$location.url(hash);
			}
		});
	};
	$scope.changeSubcategory=function (subcategoriaId) {
		console.log(subcategoriaId);console.log('cat: '+$rootScope.categoria);
		$location.url('productos/' + $rootScope.categoria + '/' + subcategoriaId);
	};
});
