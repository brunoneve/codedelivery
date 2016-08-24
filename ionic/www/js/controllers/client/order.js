angular.module('starter.controllers')
    .controller('ClientOrderCtrl', [
        '$scope', '$state', '$cart','Order',
        function ($scope, $state, $cart, Order) {
            Order.query({}, function (response){
                $scope.orders = response.data;
            });
        }]);