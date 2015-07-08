var controllers = angular.module('MosaicoControllers', []);

controllers.controller('HomeCtrl', function($scope, $document, $rootScope, $http) {
    console.log('HomeCtrl');
    // $rootScope.inProducts = false;
    watchLoaded($scope, $rootScope);
    $scope.guest=true;
    $http.get('site/guest').success(function (data) {
        if(data=='false'){
            $scope.guest=false;
        }
    }).error(function (data) {
        console.log(data);
    });
    // $document.scrollTopAnimated(0, 1300).then(function() {
    //     addScrollSpy();
    // });
});

/*controllers.controller('SubastasCtrl', function($scope, $document, $rootScope) {
    console.log('SubastasController');
    $rootScope.inProducts = false;
    watchLoaded($scope, $rootScope);
    var section = angular.element(document.getElementById('cont2'));
    $document.scrollToElementAnimated(section, 50, 1500).then(function() {
        addScrollSpy();
    });
    $scope.openLogin = function() {
        popoverLogin.$promise.then(popoverLogin.show);
    }
});

controllers.controller('ContactoCtrl', function($scope, $document, $rootScope, $http) {
    console.log('ContactoController');
    $rootScope.inProducts = false;
    watchLoaded($scope, $rootScope);
    var section = angular.element(document.getElementById('cont3'));
    $document.scrollToElementAnimated(section, 50, 1500).then(function() {
        addScrollSpy();
    });
});*/

controllers.controller('ProductosCtrl', function($scope, $document, $routeParams, $rootScope, $http, $timeout, $modal, $sce) {
    console.log('ProductosController');
    var wwidth = $(window).width();
    var wheight = $(window).height();
    /*if (wwidth < 461) {
        $scope.numPerPage = 2;
    } else if (wwidth < 801) {
        $scope.numPerPage = 4;
    } else if (wwidth < 1101) {
        $scope.numPerPage = 6;
    } else {
        $scope.numPerPage = 8;
        if (wheight > 750) {
            $scope.numPerPage = 12;
        }
    }*/
    $scope.producto = [];
    $scope.currentPage = 0;
    $scope.filteredProducts = [];
    $scope.allProducts = [];
    // $rootScope.inProducts = true;
    $scope.loaded = $rootScope.loaded;
    watchLoaded($scope, $rootScope);
    categoriaActual = $routeParams.cat_id;
    $rootScope.categoria = categoriaActual;
    subcategoriaActual = $routeParams.subcat_id;
    loadedProducts();
    conts['cont4'] = 'productos/' + categoriaActual + '/' + subcategoriaActual;
    var section = angular.element(document.getElementById('cont4'));
    /*$document.scrollToElementAnimated(section, 50, 1500).then(function() {
        addScrollSpy();
    });*/
    $scope.range = function(n) {
        return new Array(n);
    };
    /*$scope.range2 = function(start, end) {
        var ret = [];
        if (!end) {
            end = start;
            start = 0;
        }
        for (var i = start; i < end; i++) {
            ret.push(i);
        }
        return ret;
    };*/
    $scope.addToCart = function(id) {
        console.log(id);
        if(galeriaModal){
        	galeriaModal.hide();
        }
        popover.$scope.cargando = true;
        popover.$promise.then(popover.show);
        $http.get('site/add-to-cart?productId=' + id + '&quantity=' + $scope.producto[id]).
        success(function(data) {
            if (data != '') {
                carrito = data;
                popover.$scope.content = htmlCarrito(carrito);
                $rootScope.cantidadCarrito = Object.keys(data).length - 1;
                popover.$scope.cargando = false;
            }
        }).
        error(function() {
            console.log('error add to cart');
            popover.$scope.cargando = false;
        });
    };
    /*$scope.prevPage = function() {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };
    $scope.nextPage = function() {
        if ($scope.currentPage < $scope.filteredProducts.length - 1) {
            $scope.currentPage++;
        }
    };
    $scope.setPage = function() {
        $scope.currentPage = this.n;
    };*/
    var galeriaModal = $modal({
        scope: $scope,
        template: 'partials/galeria.html',
        show: false
    });
    $scope.showModal = function(id) {
    	galeriaModal.$scope.id=id;
    	galeriaModal.$scope.name=categories[categoriaActual][subcategoriaActual][id].name;
    	galeriaModal.$scope.image1=categories[categoriaActual][subcategoriaActual][id].image1;
    	galeriaModal.$scope.image2=categories[categoriaActual][subcategoriaActual][id].image2;
    	galeriaModal.$scope.image3=categories[categoriaActual][subcategoriaActual][id].image3;
    	galeriaModal.$scope.description=$sce.trustAsHtml(categories[categoriaActual][subcategoriaActual][id].description);
    	galeriaModal.$scope.stock=categories[categoriaActual][subcategoriaActual][id].stock;
    	galeriaModal.$scope.price=categories[categoriaActual][subcategoriaActual][id].price;
        galeriaModal.$promise.then(galeriaModal.show);
    };

    function loadedProducts() {
        if (typeof(categories) !== 'undefined') {
            $scope.allProducts = [];
            for (i in categories[categoriaActual][subcategoriaActual]) {
                if (categories[categoriaActual][subcategoriaActual][i].name) {
                    $scope.allProducts.push(categories[categoriaActual][subcategoriaActual][i]);
                }
            }
            /*for (var i = 0; i < $scope.allProducts.length; i++) {
                if (i % $scope.numPerPage === 0) {
                    $scope.filteredProducts[Math.floor(i / $scope.numPerPage)] = [$scope.allProducts[i]];
                } else {
                    $scope.filteredProducts[Math.floor(i / $scope.numPerPage)].push($scope.allProducts[i]);
                }
            }*/
        } else {
            $timeout(loadedProducts, 500);
        }
    }
});

controllers.controller('MainCtrl', function($scope, $document, $location, $rootScope, $http, $window, baseUrl, $popover) {
    console.log('MainCtrl');
    $scope.enviado = false;
    $scope.noenviado = false;
    $scope.cantidadCarrito = 0;
    $rootScope.loaded = false;
    // $rootScope.inProducts = false;
    popover = $popover($('#icoCarrito'), {
        title: 'Carrito',
        template: "partials/carrito.html",
        placement: "left",
        animation: "am-flip-x",
        content: "Cargando",
    });
    var divLogin = $('#loginRegistrarse');
    if (divLogin[0]) {
        var popoverLogin = $popover(divLogin, {
            title: 'Iniciar Sesión',
            template: "partials/login.html",
            placement: "left",
            animation: "am-fade-and-slide-left",
        });
        $scope.openLogin = function() {
            popoverLogin.$promise.then(popoverLogin.show);
        };
    }
    popover.$scope.cargando = true;
    $http.get('site/load-cart').
    success(function(data) {
        console.log('cart loaded');
        var html
        if (data) {
            html = htmlCarrito(data);
            $rootScope.cantidadCarrito = Object.keys(data).length - 1;
        } else {
            html = "0 productos";
        }
        popover.$scope.content = html;
        popover.$scope.cargando = false;
    }).
    error(function() {
        console.log('error cargando carrito');
    });
    loadProducts($http, $rootScope);
    watchLoaded($scope, $rootScope);
    /*$rootScope.$watch('inProducts', function() {
        $scope.inProducts = $rootScope.inProducts;
    });*/
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
        // $('.circle').removeAttr('du-scrollspy');
        var section = angular.element(document.getElementById(sectionId));
        if (section[0]) {
            /*$document.scrollToElementAnimated(section, 50, 1500).then(function() {
                addScrollSpy();
                if (hash) {*/
                    $location.hash(hash);
                    // $location.url(hash);
                /*}
            });*/
        } else {
            var url = baseUrl;
            $window.location.href = url + '#/' + hash;
            // $location.url(hash);
        }
        
    };
    $scope.changeSubcategory = function(subcategoriaId) {
        $location.url('productos/' + $rootScope.categoria + '/' + subcategoriaId);
    };
    popover.$scope.removeFromCart = function(id) {
        console.log('removeFromCart');
        popover.$scope.cargando = true;
        $http.get('site/remove-from-cart?productId=' + id).
        success(function(data) {
            if (data != '') {
                carrito = data;
                popover.$scope.content = htmlCarrito(carrito);
                $rootScope.cantidadCarrito = Object.keys(data).length - 1;
                popover.$scope.cargando = false;
            }
        }).
        error(function() {
            console.log('error');
            popover.$scope.cargando = false;
        });
    };
    $scope.enviar = function($event) {
        console.log('enviar');
        $event.preventDefault();
        $scope.enviado = false;
        $scope.noenviado = false;
        var form = $('#form-form').serializeArray();
        $.post('site/contact', form)
            .success(function(data) {
                if (data == '1') {
                    $scope.$apply(function() {
                        $scope.enviado = true;
                    });
                } else {
                    console.log(data);
                    $scope.$apply(function() {
                        $scope.noenviado = true;
                        $scope.errorNoEnviado = data;
                    });
                }
            })
            .error(function(data) {
                console.log('error enviar contacto');
            });
    };
});

controllers.controller('LoginCtrl', function($scope, $window, baseUrl) {
    console.log('LoginCtrl');
    $scope.errorLabel = '';
    $scope.ingresando = false;
    $scope.entrar = function() {
        //console.log('entrar');
        $scope.ingresando = true;
        $scope.errorLabel = '';
        $.post('site/entrar', {
                'LoginForm[username]': $scope.email,
                'LoginForm[password]': $scope.password
            })
            .success(function(response) {
                if (response == '1') {
                    console.log('logeado');
                    location.reload();
                } else {
                    console.log(response);
                    $scope.$apply(function() {
                        $scope.ingresando = false;
                        $scope.errorLabel = 'Datos no coinciden';
                    });
                }
            }).error(function(response) {
                $scope.errorLabel = 'Error';
                $scope.ingresando = false;
            });
    };
    $scope.registrarse = function() {
        var url = baseUrl + 'site/registro';
        $window.location.href = url;
    }
    $scope.keypressed = function(keyEvent) {
        if (keyEvent.which === 13) {
            $scope.entrar();
        }
        $scope.errorLabel = '';
    }
});
