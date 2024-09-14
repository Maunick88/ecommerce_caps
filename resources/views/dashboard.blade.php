<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                                <!-- Indicadores Numéricos (KPIs) -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-blue-100 p-4 rounded shadow text-center">
                            <h4 class="text-lg text-blue-800 font-semibold">{{ __('Total de Usuarios') }}</h4>
                            <p class="text-2xl text-blue-800">{{ $users->count() }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded shadow text-center">
                            <h4 class="text-lg text-green-800 font-semibold">{{ __('Órdenes Completadas') }}</h4>
                            <p class="text-2xl text-green-800">{{ $orders->where('status', 'completed')->count() }}</p>
                        </div>
                        <div class="bg-red-100 p-4 rounded shadow text-center">
                            <h4 class="text-lg text-red-800 font-semibold">{{ __('Tickets de Soporte Abiertos') }}</h4>
                            <p class="text-2xl text-red-800">{{ $supportTickets->where('status', 'open')->count() }}</p>
                        </div>
                    </div>

                    <!-- Container for Pie Chart -->
                    <h2 class="mt-6 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Product Categories Distribution') }}</h2>
                    <canvas id="categoriesChart" width="400" height="200"></canvas>

                    <!-- Container for Line Chart (Sales by Month) -->
                    <h2 class="mt-6 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Monthly Sales') }}</h2>
                    <canvas id="salesChart" width="400" height="200"></canvas>

                    <!-- Container for Radar Chart (Rating Distribution) -->
                    <h2 class="mt-6 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Product Ratings Distribution') }}</h2>
                    <canvas id="ratingsChart" width="400" height="200"></canvas>

                    <!-- Container for Horizontal Bar Chart (Active Users) -->
                    <h2 class="mt-6 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Top Active Users') }}</h2>
                    <canvas id="activeUsersChart" width="400" height="200"></canvas>

                    <!-- Aquí van las tablas existentes -->
                    <!-- Mantén las tablas que ya creaste para ver detalles en texto -->
           
                    <!-- Formulario Mejorado para Crear un Nuevo Producto -->
                    <h2 class="mt-6 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Agregar Nuevo Producto') }}</h2>
                    <form action="{{ route('products.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-4 max-w-3xl mx-auto">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Nombre del Producto') }}</label>
                            <input type="text" id="name" name="name" class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Descripción') }}</label>
                            <textarea id="description" name="description" class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="4" required></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Precio') }}</label>
                            <input type="number" step="0.01" id="price" name="price" class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="mb-6">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Categoría') }}</label>
                            <select id="category_id" name="category_id" class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Nombre de la Imagen') }}</label>
                            <input type="text" id="image" name="image" class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ejemplo: imagen.jpg" required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold transition duration-200">{{ __('Agregar Producto') }}</button>
                        </div>
                    </form>
                    <h2 class="mt-12 text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Lista de Productos') }}</h2>
                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nombre') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Descripción') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Precio') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->description }}</td>
                                <td class="border px-4 py-2">{{ $product->price }} MXN</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline mr-2">{{ __('Editar') }}</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('¿Estás seguro de que deseas eliminar este producto?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Datos para el gráfico de distribución de categorías de productos
        const categoriesData = {
            labels: @json($categoriesDistribution->keys()),
            datasets: [{
                label: 'Distribución de Productos por Categoría',
                data: @json($categoriesDistribution->values()),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
            }]
        };
        const ctxCategories = document.getElementById('categoriesChart').getContext('2d');
        new Chart(ctxCategories, {
            type: 'pie',
            data: categoriesData,
        });

        // Datos para el gráfico de ventas mensuales
        const salesData = {
            labels: @json($salesByMonth->pluck('month')),
            datasets: [{
                label: 'Ventas Mensuales',
                data: @json($salesByMonth->pluck('total')),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        const ctxSales = document.getElementById('salesChart').getContext('2d');
        new Chart(ctxSales, {
            type: 'line',
            data: salesData,
            options: { scales: { y: { beginAtZero: true } } }
        });

        // Datos para el gráfico de distribución de calificaciones
        const ratingsData = {
            labels: @json($ratingDistribution->keys()),
            datasets: [{
                label: 'Distribución de Calificaciones',
                data: @json($ratingDistribution->values()),
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };
        const ctxRatings = document.getElementById('ratingsChart').getContext('2d');
        new Chart(ctxRatings, {
            type: 'radar',
            data: ratingsData,
        });

        // Datos para el gráfico de barras horizontales de usuarios activos
        const activeUsersData = {
            labels: @json($activeUsers->pluck('name')),
            datasets: [{
                label: 'Órdenes por Usuario Activo',
                data: @json($activeUsers->pluck('reviews_count')),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };
        const ctxActiveUsers = document.getElementById('activeUsersChart').getContext('2d');
        new Chart(ctxActiveUsers, {
            type: 'bar',
            data: activeUsersData,
            options: { indexAxis: 'y', scales: { x: { beginAtZero: true } } }
        });
    </script>
</x-app-layout>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>