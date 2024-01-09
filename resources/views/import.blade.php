
<!DOCTYPE html>
<html>
<head>
    <title>Visualización de Excel</title>
</head>
<body>
    <h1>Datos del archivo Excel</h1>
    @if ($data)
        <table>
            <thead>
                <tr>
                    @foreach($data[0][0] as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data[0] as $row)
                    <tr>
                        @foreach($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se importaron datos.</p>
    @endif
</body>
</html>
