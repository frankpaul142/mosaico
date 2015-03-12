var directives = angular.module('MosaicoDirectives', []);

directives.directive('compile', function($compile) {
	return {
		link: function(scope, element, attrs) {
			scope.$watch(
				function(scope) {
					return scope.$eval(attrs.compile);
				},
				function(value) {
					var content = $compile(value)(scope);
					element.html(content);
				}
			);
		}
	}
});
