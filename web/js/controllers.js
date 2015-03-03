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

controllers.controller('MenuCtrl', function($scope, $document, $location, $rootScope, $http, $window, baseUrl, $modal) {
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
		console.log('toSection');
		var hash = conts[sectionId];
		if (categoriaId && subcategoriaId) {
			hash = 'productos/' + categoriaId + '/' + subcategoriaId;
		}
		$('.circle').removeAttr('du-scrollspy');
		var section = angular.element(document.getElementById(sectionId));
		if(section[0]){
			$document.scrollToElementAnimated(section, 50, 1500).then(function() {
				addScrollSpy();
				if (hash) {
					$location.url(hash);
				}
			});
		}
		else{
			var url=baseUrl;
			$window.location.href=url;
		}
	};
	$scope.changeSubcategory=function (subcategoriaId) {
		$location.url('productos/' + $rootScope.categoria + '/' + subcategoriaId);
	};
	$scope.launch = function(){
		var modalInstance = $modal.open({
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

	modalInstance.result.then(function () {
      console.log('then');
    });

    /*modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });*/
	};

	$scope.getAnimation = function () {console.log(angular.fromJson(angular.toJson(animations[0].value)));
    return angular.fromJson(angular.toJson(animations[0].value));
  };
  var animations = [{
    name: 'Vertical flip',
    value: {
      enter: 'at-view-flip-in-vertical',
      leave: 'at-view-flip-out-vertical'
    }
  },
  {
    name: 'Horizontal flip',
    value: {
      enter: 'at-view-flip-in-horizontal',
      leave: 'at-view-flip-out-horizontal'
    }
  },
  {
    name: 'Fade',
    value: {
      enter: 'at-view-fade-in',
      leave: 'at-view-fade-out'
    }
  },
  {
    name: 'Slide from left',
    value: {
      enter: 'at-view-slide-in-left',
      leave: 'at-view-slide-out-left'
    }
  },
  {
    name: 'Slide in left, slide out right',
    value: {
      enter: 'at-view-slide-in-left',
      leave: 'at-view-slide-out-right',
    }
  },
  {
    name: 'Rotate top-left',
    value: {
      enter: 'at-view-slide-in-bottom',
      leave: 'at-view-rotate-fade-out'
    }
  },
  {
    name: 'Slide & rotate left',
    value: {
      enter: 'at-view-slide-in-left',
      leave: 'at-view-flip-out-right'
    }
  },
  {
    name: 'Emerge and scale',
    value: {
      enter: 'at-view-emerge',
      leave: 'at-view-scale-out'
    }
  },
  {
    name: 'Slide & opposite rotate left',
    value: {
      enter: 'at-view-slide-in-left',
      leave: 'at-view-flip-out-right-opposite'
    }
  },
  {
    name: 'Scale in',
    value: {
      enter: 'at-view-scale-in',
      leave: 'at-view-fade-out'
    }
  },
  {
    name: 'Slide from right',
    value: {
      enter: 'at-view-slide-in-right',
      leave: 'at-view-slide-out-right'
    }
  },
  {
    name: 'Slide from top',
    value: {
      enter: 'at-view-slide-in-top',
      leave: 'at-view-slide-out-top'
    }
  },
  {
    name: 'Slide from bottom',
    value: {
      enter: 'at-view-slide-in-bottom',
      leave: 'at-view-slide-out-bottom'
    }
  }];
});

controllers.controller('LoginCtrl',function($scope){
		console.log('LoginCtrl');
	});