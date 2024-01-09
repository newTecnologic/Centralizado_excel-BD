<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Importacion de documento</title>
</head>
<body>
    <div class="container">
        <br/>
        <div class="row">
            <div class="clod-md-6">
                <div class="row">
                    <form action="{{ route('importar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="clo-md-6">
                            {{-- <label for="documento" class="custom-file-upload" style="display: none;">
                                Seleccionar documento
                            </label> --}}
                            <input type="file" class="form-control" id="documento" name="documento" style="color:rgb(84, 70, 141)" accept=".csv" >
                        </div>
                            @error('documento')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <br/>
                            <button class="btn btn-primary" id="importButton" style="background-color:rgb(99, 93, 168); border-color:rgb(99, 93, 168); margin-bottom:15px" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
            <br/>
            <br/>
            <div class="clod-md-6">
                <form action="{{ route('exportar') }}" method="get" enctype="multipart/form-data">
                    <button class="btn btn-primary" id="exportButton" style="background-color:rgb(99, 93, 168); border-color:rgb(99, 93, 168); margin-bottom:15px;" type="submit" >Exportar</button>
                </form>
            </div>
            <form action="{{ route('borrar-datos') }}" method="get">
                <button class="btn btn-danger" type="submit">Borrar Datos</button>
            </form>
        </div>
        {{-- ------------ --}}
        <div class="row">
            @if(count($pruebas))
            <div class="bd-example">
                <table class="table table-bordered" style="border-color:rgb(211, 211, 223)">
                    <thead class="thead-dark">
                        <tr>
                            <td>id</td>
                            <td>name</td>
                            <td>procesual</td>
                            <td>continua</td>
                        </tr>
                    </thead>
                        @foreach ( $pruebas as $prueba )
                            <tr>
                                <td>{{ $prueba->id }}</td>
                                <td>{{ $prueba->name }}</td>
                                <td>{{ $prueba->procesual }}</td>
                                <td>{{ $prueba->continua }}</td>
                            </tr>
                        @endforeach
                </table>
            </div>
            @endif
        </div>
    </div>
    {{-- <script>
        document.getElementById('documento').addEventListener('change', function () {
        const exportButton = document.getElementById('exportButton');
            if (this.files.length > 0) {
                exportButton.style.display = 'block';
            } else {
                exportButton.style.display = 'none';
            }
        });
    </script> --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
