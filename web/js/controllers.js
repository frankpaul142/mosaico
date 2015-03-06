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
	$rootScope.categoria = categoriaActual;
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

controllers.controller('MenuCtrl', function($scope, $document, $location, $rootScope, $http, $window, baseUrl, $modal) {
	$rootScope.loaded = false;
	$rootScope.inProducts = false;
	loadProducts($http, $rootScope);
	watchLoaded($scope, $rootScope);
	$rootScope.$watch('inProducts', function() {
		$scope.inProducts = $rootScope.inProducts;
	});
	$scope.$watch('loaded', function() {
		watchLoadedCategory($scope, $rootScope);
	});
	$rootScope.$watch('categoria', function() {
		watchLoadedCategory($scope, $rootScope);
	});
	$scope.toSection = function(sectionId, categoriaId, subcategoriaId) {
		console.log('toSection');
		var hash = conts[sectionId];
		if (categoriaId && subcategoriaId) {
			hash = 'productos/' + categoriaId + '/' + subcategoriaId;
		}
		$('.circle').removeAttr('du-scrollspy');
		var section = angular.element(document.getElementById(sectionId));
		if (section[0]) {
			$document.scrollToElementAnimated(section, 50, 1500).then(function() {
				addScrollSpy();
				if (hash) {
					$location.url(hash);
				}
			});
		} else {
			var url = baseUrl;
			$window.location.href = url;
		}
	};
	$scope.changeSubcategory = function(subcategoriaId) {
		$location.url('productos/' + $rootScope.categoria + '/' + subcategoriaId);
	};
	$scope.launch = function() {
		var modalInstance = $modal({
			templateUrl: 'partials/login.html',
			controller: 'LoginCtrl',
			size: 'sm',
			backdrop: true,
			/*resolve: {
			  items: function () {
			    return $scope.items;
			  }
			}*/
		});

		modalInstance.result.then(function() {
			console.log('then');
		});

		/*modalInstance.result.then(function (selectedItem) {
		  $scope.selected = selectedItem;
		}, function () {
		  $log.info('Modal dismissed at: ' + new Date());*/
	};
});

controllers.controller('LoginCtrl', function($scope, $window, baseUrl, $modalInstance, $http) {
	console.log('LoginCtrl');
	$scope.errorLabel = '';
	$scope.ingresando = false;
	$scope.entrar = function() {
		console.log('entrar');
		$scope.ingresando = true;
		$scope.errorLabel = '';
		$.post('site/login', {
				'LoginForm[username]': $scope.email,
				'LoginForm[password]': $scope.password
			})
			.success(function(response) {
				if (response == '1') {
					console.log('logeado');
					location.reload();
				} else {
					console.log(response);
					$scope.$apply(function () {
						$scope.ingresando=false;
						$scope.errorLabel = 'Datos no coinciden';
					});
					//$scope.errorLabel = 'Datos no coinciden';
				}
				//$scope.ingresando = false;
			}).error(function(response) {
				$scope.errorLabel = 'Error';
				$scope.ingresando = false;
			});
	};
	$scope.registrarse = function() {
		var url = baseUrl + 'site/registro';
		$window.location.href = url;
	}
	$scope.keypressed=function (keyEvent) {
		if(keyEvent.which===13){
			$scope.entrar();
		}
		$scope.errorLabel='';
	}
});
