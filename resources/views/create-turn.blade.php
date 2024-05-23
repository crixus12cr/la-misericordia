<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creacion de turnos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="width: 50%;">
            <div class="card-body">
                <h5 id="cardTitle" class="card-title text-center">Seleccionar categoría</h5>

                <div id="categoryList">
                    <div class="list-group">
                        @foreach($categories as $category)
                            <button type="button" class="list-group-item list-group-item-action mt-2 bg-primary text-white" onclick="updateForm({{ $category->id }})">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>

                <form id="appointmentForm" style="display: none;" method="POST">
                    @csrf

                    <input type="hidden" id="category" name="category">

                    <div class="form-group mt-3">
                        <label for="name">Nombres</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="typeDocument">Tipo de documento</label>
                        <select id="typeDocument" name="typeDocument" class="form-control" required>
                            <option value="">tipo de documento</option>
                            @foreach($typeDocuments as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="numberDocument">Número de documento</label>
                        <input type="text" id="numberDocument" name="numberDocument" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Solicitar cita</button>
                    <button type="button" class="btn btn-secondary mt-3" onclick="goBack()">Regresar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function updateForm(categoryId) {
            document.getElementById('category').value = categoryId;
            let form = document.getElementById('appointmentForm');
            let categoryList = document.getElementById('categoryList');
            let cardTitle = document.getElementById('cardTitle');
            form.style.display = 'block';
            categoryList.style.display = 'none';
            cardTitle.textContent = 'Escribe tus datos';
        }

        function goBack() {
            let form = document.getElementById('appointmentForm');
            let categoryList = document.getElementById('categoryList');
            let cardTitle = document.getElementById('cardTitle');
            form.style.display = 'none';
            categoryList.style.display = 'block';
            cardTitle.textContent = 'Seleccionar categoría';
            form.reset();
        }

        document.getElementById('appointmentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            console.log(formData.get('category'));

            fetch("{{ url('http://127.0.0.1:8000/turns/store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Turno confirmado: ' + data.turn.turn_prefix,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('/turns/create') }}";
                    }
                });
            })
            .catch((error) => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Hubo un error al crear el turno',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
</body>
</html>
