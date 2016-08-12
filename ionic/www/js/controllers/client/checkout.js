angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl', [
        '$scope', '$state', '$cart', '$localStorage',
        function ($scope, $state, $cart, $localStorage) {
            var cart = $cart.get();
            $scope.items = cart.items;
            $scope.total = cart.total;
        }]);