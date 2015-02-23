var controllers = angular.module('MosaicoControllers', []);

controllers.controller('HomeCtrl', function($scope, $document) {
	console.log('HomeCtrl');
	$('#submenu').hide();
	$document.scrollTopAnimated(0, 1300).then(function() {
		addScrollSpy();
	});
});

controllers.controller('SubastasCtrl', function($scope, $document) {
	console.log('SubastasController');
	$('#submenu').hide();
	var section = angular.element(document.getElementById('cont2'));
	$document.scrollToElementAnimated(section, 50, 1500).then(function() {
		addScrollSpy();
	});
});

controllers.controller('ProductosCtrl', function($scope, $document) {
	console.log('ProductosController');
	$('#submenu').show();
	var section = angular.element(document.getElementById('cont3'));
	$document.scrollToElementAnimated(section, 50, 1500).then(function() {
		addScrollSpy();
	});
});

controllers.controller('ContactoCtrl', function($scope, $document) {
	console.log('ContactoController');
	$('#submenu').hide();
	var section = angular.element(document.getElementById('cont4'));
	$document.scrollToElementAnimated(section, 50, 1500).then(function() {
		addScrollSpy();
	});
});

controllers.controller('MenuCtrl', function($scope, $document, $location) {
	$scope.toSection = function(sectionId) {
		console.log('toSection');
		$('.circle').removeAttr('du-scrollspy');
		var section = angular.element(document.getElementById(sectionId));
		$document.scrollToElementAnimated(section, 50, 1500).then(function() {
			addScrollSpy();
			var hash = conts[sectionId];
			if (hash) {
				$location.url(hash);
			}
		});
	};
});
