@include('headerFooter')   

<body class="bg-star">
<section class="section-wrapper d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <!-- Inicio del formulario de soporte -->
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Formulario de Soporte</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('support.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="type">Tipo de Comentario</label>
                    <select name="type" id="type" class="form-control" required onchange="toggleTransactionField()">
                        <option value="">Seleccione una opción</option>
                        <option value="queja">Queja</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="falla">Falla</option>
                        <option value="devolucion">Devolución</option>
                        <option value="problemas con la pagina">Problemas con la Página</option>
                    </select>
                </div>

                <!-- Campo de ID de Transacción oculto por defecto -->
                <div class="form-group" id="transactionField" style="display: none;">
                    <label for="transaction_id">ID de Transacción</label>
                    <input type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Ingrese su ID de transacción">
                </div>

                <div class="form-group">
                    <label for="comment">Comentario</label>
                    <textarea name="comment" id="comment" class="form-control" rows="6" placeholder="Escriba su comentario aquí..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
    <!-- Fin del formulario de soporte -->
</section>
</body>

@include('footerStar')   

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Función para mostrar/ocultar el campo de ID de transacción
function toggleTransactionField() {
    var typeSelect = document.getElementById('type');
    var transactionField = document.getElementById('transactionField');
    if (typeSelect.value === 'devolucion') {
        transactionField.style.display = 'block';
    } else {
        transactionField.style.display = 'none';
    }
}

// Mostrar el mensaje de éxito con SweetAlert si existe
@if(session('success'))
    Swal.fire({
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
@endif
</script>
</html>
