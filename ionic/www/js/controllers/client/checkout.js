angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl', [
        '$scope', '$state', '$cart', '$localStorage',
        function ($scope, $state, $cart, $localStorage) {
            var cart = $cart.get();
            $scope.items = cart.items;
            $scope.total = cart.total;

            $scope.removeItem = function (i){
                $cart.removeItem(i);
                $scope.items.splice(i, 1);
                $scope.total = $cart.get().total;
            }
        }]);