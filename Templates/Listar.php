<?php
require_once 'Entidades/Category.php';
require_once 'Entidades/Product.php';
?>
<section>
    <div>
        <div class="relative overflow-auto max-h-96 w-4/5 mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            createdAt
                        </th>
                        <th scope="col" class="px-6 py-3">
                            updatedAt
                        </th>
                        <th scope="col" class="px-6 py-3">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.code }}
                        </th>
                        <td class="px-6 py-4">
                            {{ item.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.category }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.createdAt }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.updatedAt}}
                        </td>
                        <td class="px-6 py-4 grid gap-2">
                            <button ng-click="editarProducto(item.code, item.name, item.category, item.price, item.createdAt)" type="button" class="flex items-center px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 4.379a3 3 0 00-4.243 0L2.828 11.172a1 1 0 00-.293.707v3.414a1 1 0 001 1h3.414a1 1 0 00.707-.293l8.05-8.05a3 3 0 000-4.243l-1.414-1.414zM16.95 5.05a3 3 0 010 4.243L12.121 10.88a1 1 0 01-1.415 0l-1.414-1.414a1 1 0 010-1.415l4.829-4.828a3 3 0 014.243 0l1.414 1.414z" />
                                </svg>
                                Editar
                            </button>
                            <button ng-click="eliminarProducto(item.code)" type="button" class="flex items-center px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Eliminar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>