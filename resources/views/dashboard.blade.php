<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="{{ asset('css/styledash.css') }}">
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Estilos Personalizados -->

</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">

        <!-- KPIs -->
        <div class="kpi-container">
            <div class="kpi-card">
                <h4>{{ __('Total de Usuarios') }}</h4>
                <p>{{ $users->count() }}</p>
            </div>
            <div class="kpi-card">
                <h4>{{ __('Órdenes Completadas') }}</h4>
                <p>{{ $orders->where('status', 'completed')->count() }}</p>
            </div>
            <div class="kpi-card">
                <h4>{{ __('Tickets de Soporte Abiertos') }}</h4>
                <p>{{ $supportTickets->where('status', 'open')->count() }}</p>
            </div>
        </div>

        <!-- Charts -->
        <div class="charts-container">
            <div class="chart-card">
                <h2>{{ __('Product Categories Distribution') }}</h2>
                <canvas id="categoriesChart"></canvas>
            </div>

            <div class="chart-card">
                <h2>{{ __('Monthly Sales') }}</h2>
                <canvas id="salesChart"></canvas>
            </div>

            <div class="chart-card">
                <h2>{{ __('Product Ratings Distribution') }}</h2>
                <canvas id="ratingsChart"></canvas>
            </div>

            <div class="chart-card">
                <h2>{{ __('Top Active Users') }}</h2>
                <canvas id="activeUsersChart"></canvas>
            </div>
        </div>

        <!-- Formulario para Crear Producto -->
        <div class="form-card">
            <h2>{{ __('Agregar Nuevo Producto') }}</h2>
            <form id="add-product-form">
                @csrf
                <input type="text" id="product-name" name="name" placeholder="Nombre del Producto" required>
                <textarea id="product-description" name="description" placeholder="Descripción" rows="3" required></textarea>
                <input type="number" step="0.01" id="product-price" name="price" placeholder="Precio" required>
                <select id="product-category" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="text" id="product-image" name="image" placeholder="Nombre de la Imagen" required>
                <button type="button" onclick="addProduct()">{{ __('Agregar Producto') }}</button>
            </form>
        </div>


        <!-- Lista de Productos -->
        <div class="table-card">
            <h2>{{ __('Lista de Productos') }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>{{ __('Nombre') }}</th>
                        <th>{{ __('Descripción') }}</th>
                        <th>{{ __('Precio') }}</th>
                        <th>{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }} MXN</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}">{{ __('Editar') }}</a>
                            <button onclick="confirmDeletion('{{ route('products.destroy', $product->id) }}')">{{ __('Eliminar') }}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="form-card centered-content">
            <h2>{{ __('Añadir Nueva Categoría') }}</h2>
            <form id="add-category-form">
                @csrf
                <input type="text" id="category-name" name="name" placeholder="Nombre de la Categoría" required>
                <button type="button" onclick="addCategory()">{{ __('Guardar Categoría') }}</button>
            </form>

            <h2>{{ __('Categorías Existentes') }}</h2>
            <table class="centered-table">
                <thead>
                    <tr>
                        <th>{{ __('Nombre') }}</th>
                        <th>{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button onclick="confirmDeletion('{{ route('categories.destroy', $category->id) }}')">{{ __('Eliminar') }}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-card">
            <h2>{{ __('Lista de Órdenes') }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Usuario') }}</th>
                        <th>{{ __('Total') }}</th>
                        <th>{{ __('Estado') }}</th>
                        <th>{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->total_price }} MXN</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                        <select onchange="changeOrderStatus(this, {{ $order->id }})">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completada</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Enviado</option>
                            <option value="canceled" {{ $order->status === 'canceled' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
function changeOrderStatus(selectElement, orderId) {
    const newStatus = selectElement.value; // Asegúrate de que newStatus coincida exactamente con los valores permitidos

    Swal.fire({
        title: '{{ __("¿Estás seguro de cambiar el estado?") }}',
        text: '{{ __("Esta acción actualizará el estado de la orden.") }}',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '{{ __("Sí, cambiar estado!") }}',
        cancelButtonText: '{{ __("Cancelar") }}'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`{{ url('orders') }}/${orderId}/update-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualiza el texto de la celda de estado correspondiente
                    const statusCell = selectElement.closest('tr').querySelector('td:nth-child(4)');
                    statusCell.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);

                    Swal.fire(
                        '{{ __("Actualizado!") }}',
                        '{{ __("El estado de la orden ha sido actualizado.") }}',
                        'success'
                    );
                } else {
                    Swal.fire(
                        '{{ __("Error!") }}',
                        '{{ __("Hubo un problema al actualizar el estado de la orden.") }}',
                        'error'
                    );
                }
            })
            .catch(error => {
                Swal.fire(
                    '{{ __("Error!") }}',
                    '{{ __("Hubo un problema al actualizar el estado de la orden.") }}',
                    'error'
                );
            });
        }
    });
}

</script>

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
<script>
function confirmDeletion(url) {
    Swal.fire({
        title: '{{ __("¿Estás seguro?") }}',
        text: '{{ __("No podrás revertir esta acción.") }}',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '{{ __("Sí, eliminar!") }}',
        cancelButtonText: '{{ __("Cancelar") }}'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _method: 'DELETE'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire(
                        '{{ __("Eliminado!") }}',
                        '{{ __("El registro ha sido eliminado.") }}',
                        'success'
                    );
                    document.querySelector(`button[onclick="confirmDeletion('${url}')"]`).closest('tr').remove();
                } else {
                    Swal.fire(
                        '{{ __("Error!") }}',
                        '{{ __("Hubo un problema al eliminar el registro.") }}',
                        'error'
                    );
                }
            })
            .catch(error => {
                Swal.fire(
                    '{{ __("Error!") }}',
                    '{{ __("Hubo un problema al eliminar el registro.") }}',
                    'error'
                );
            });
        }
    });
}
</script>
<script>
function addProduct() {
    const formData = new FormData(document.getElementById('add-product-form'));

    fetch('{{ route('products.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: '{{ __("¡Éxito!") }}',
                text: data.message,
                icon: 'success',
                confirmButtonText: '{{ __("Aceptar") }}'
            }).then(() => {
                // Opcional: Recargar la página o limpiar el formulario
                location.reload();
            });
        } else {
            Swal.fire({
                title: '{{ __("Error!") }}',
                text: '{{ __("Hubo un problema al agregar el producto.") }}',
                icon: 'error',
                confirmButtonText: '{{ __("Intentar de nuevo") }}'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: '{{ __("Error!") }}',
            text: '{{ __("Hubo un problema al procesar tu solicitud.") }}',
            icon: 'error',
            confirmButtonText: '{{ __("Intentar de nuevo") }}'
        });
    });
}

function addCategory() {
    const formData = new FormData(document.getElementById('add-category-form'));

    fetch('{{ route('categories.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: '{{ __("¡Éxito!") }}',
                text: data.message,
                icon: 'success',
                confirmButtonText: '{{ __("Aceptar") }}'
            }).then(() => {
                // Opcional: Recargar la página o limpiar el formulario
                location.reload();
            });
        } else {
            Swal.fire({
                title: '{{ __("Error!") }}',
                text: '{{ __("Hubo un problema al agregar la categoría.") }}',
                icon: 'error',
                confirmButtonText: '{{ __("Intentar de nuevo") }}'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: '{{ __("Error!") }}',
            text: '{{ __("Hubo un problema al procesar tu solicitud.") }}',
            icon: 'error',
            confirmButtonText: '{{ __("Intentar de nuevo") }}'
        });
    });
}
</script>

</x-app-layout>
</body>
</html>
