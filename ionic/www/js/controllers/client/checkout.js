angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl', [
        '$scope', '$state', '$cart', 'Order','$ionicLoading', '$ionicPopup',
        function ($scope, $state, $cart, Order, $ionicLoading, $ionicPopup) {
            var cart = $cart.get();
            $scope.items = cart.items;
            $scope.total = cart.total;

            $scope.removeItem = function (i){
                $cart.removeItem(i);
                $scope.items.splice(i, 1);
                $scope.total = $cart.get().total;
            };

            $scope.save = function (){
                var items = angular.copy($scope.items);
                angular.forEach(items, function (item){
                   item.product_id = item.id;
                });

                $ionicLoading.show({
                    template: 'Salvando pedido...'
                });

                Order.save({id: null}, {items:items}, function (data){
                    $ionicLoading.hide();
                    $state.go('client.checkout_successful');
                }, function (responseError){
                    $ionicLoading.hide();
                    $ionicPopup.alert({
                        title:'Atenção',
                        template: 'Falha ao salvar pedido.'
                    })
                });
            };

            $scope.openListProducts = function (){
                $state.go('client.view_products');
            };

            $scope.openProductDetail = function(i){
                $state.go('client.checkout_item_detail', {index:i});
            }
        }]);