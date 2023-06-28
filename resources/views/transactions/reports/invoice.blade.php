<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Comprovativo</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ public_path('assets/css/invoice.css') }}">
</head>

<body>

    <h1>A operação que efectuou foi registada com sucesso através do serviço SIGM</h1>
    <br>
    <table>
        <tr>
            <th colspan="2">Dados do Feirante</th>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>{{ $data->account->worker->code_number }}</td>
        </tr>
        <tr>
            <td>Feirante</td>
            <td>{{ $data->account->worker->name }}</td>
        </tr>
        <tr>
            <td>Categoria</td>
            <td>{{ $data->account->category->name }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <th colspan="2">Dados da Operação</th>
        </tr>
        <tr>
            <td>Número de operação</td>
            <td>{{ $data->code_number }}</td>
        </tr>
        <tr>
            <td>Tipo de operação</td>
            <td>{{ $data->description }}</td>
        </tr>
        <tr>
            <td>Montante</td>
            <td>{{ number_format($data->amount, 2, ',', '.') }}
        </tr>
        <tr>
            <td>Data de Execução</td>
            <td>{{ $data->created_at }}</td>
        </tr>
    </table>
    <br>
    <div class="qrcode">
        <img width="75" height="75" src="{{ 'https://qr.eletto.dev/'.route('reports.transaction', $data->id)}}" /> 
    </div>
</body>

</html>
