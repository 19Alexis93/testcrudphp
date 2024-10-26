<!doctype html>
<html ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<header class="bg-blue-600 text-white py-4 mt-10">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl font-bold">Test CRUD PHP</h1>
    </div>
</header>

<body ng-controller="myCtrl">
    <div class="flex flex-col w-full ml-8">
        <section>
            <div class="mt-16" ng-if="!crear && !editar">
                <button ng-click="crearProducto()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Crear producto
                </button>
            </div>
        </section>
        <div ng-if="!crear && !editar">
            <?php require_once 'Templates/Listar.php'; ?>
        </div>
        <div ng-if="crear">
            <?php require_once 'Templates/Crear.php'; ?>
        </div>
        <div ng-if=editar>
            <?php require_once 'Templates/Editar.php'; ?>
        </div>
    </div>
</body>

</html>


<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        $http.get("http://localhost/testcrudphp/Controllers/ProductosController.php")
            .then(function(response) {
                $scope.data = response.data;
            })
            .catch(function(error) {
                console.log("Error al realizar la solicitud:", error);
            });

        //variable de cambio
        $scope.crear = false;
        $scope.editar = false;

        $scope.crearProducto = function() {
            $scope.code = "";
            $scope.name = "";
            $scope.category = "";
            $scope.price = "";
            $scope.createdAt = "";
            $scope.updatedAt = "";
            $scope.crear = !$scope.crear;
        }

        $scope.editarProducto = function(code, name, category, price, createdAt) {
            $scope.editar = !$scope.editar;
            $scope.code = code;
            $scope.name = name;
            $scope.category = category;
            $scope.price = price;
            $scope.createdAt = createdAt;
        }

        $scope.cancelar = function() {
            $scope.crear = false;
            $scope.editar = false;
        }

        $scope.guardarProducto = function(code, name, category, price) {
            var datos = {
                code: Number(code),
                name: name,
                category: category,
                price: Number(price),
                createdAt: new Date().toISOString().split('T')[0],
                updatedAt: new Date().toISOString().split('T')[0]
            };

            $http.post("http://localhost/testcrudphp/Controllers/ProductosController.php", datos)
                .then(function(response) {
                    $scope.crear = !$scope.crear;
                    window.location.reload();
                    alert("¡Producto creado correctamente!");
                })
                .catch(function(error) {
                    console.log("Error al guardar el producto:", error);
                });
        }

        $scope.actualizarProducto = function(name, category, price) {
            var datos = {
                code: Number($scope.code),
                name: name,
                category: category,
                price: Number(price),
                updatedAt: new Date().toISOString().split('T')[0]
            };

            $http.put("http://localhost/testcrudphp/Controllers/ProductosController.php", datos)
                .then(function(response) {
                    $scope.editar = !$scope.editar;
                    $scope.code = "";
                    $scope.name = "";
                    $scope.category = "";
                    $scope.price = "";
                    $scope.createdAt = "";
                    $scope.updatedAt = "";
                    window.location.reload();
                    alert("¡Producto actualizado correctamente!");
                })
                .catch(function(error) {
                    console.log("Error al actualizar el producto:", error);
                });
        }

        $scope.eliminarProducto = function(code) {
            var confirmacion = confirm("¿Estás seguro de que deseas eliminar este producto?");
            if (confirmacion) {
                $http.delete("http://localhost/testcrudphp/Controllers/ProductosController.php", { data: { code: code } })
                    .then(function(response) {
                        window.location.reload();
                        alert("¡Producto eliminado correctamente!");
                    })
                    .catch(function(error) {
                        console.log("Error al eliminar el producto:", error);
                    });
            }
        }
    });
</script>


<style>
    :root {
        color-scheme: light dark;
    }
</style>