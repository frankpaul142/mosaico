var controllers = angular.module('MosaicoControllers', []).value('duScrollOffset', 110);

controllers.controller('SubastasCtrl', ['$scope', function($scope) {
	console.log('SubastasController');
}]);

controllers.controller('MenuCtrl', function($scope, $document) {
	$scope.toTheTop = function() {
		$document.scrollTopAnimated(0, 1000).then(function() {
			console && console.log('You just scrolled to the top!');
		});
	}
});
