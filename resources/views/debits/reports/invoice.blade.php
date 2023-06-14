<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Comprovativos</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ public_path('assets/css/invoice.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="desc">
                <p>A operação que efectuou foi registada com sucesso através do serviço BAIDirecto</p>
            </div>
        </div>
        <div class="body">
            <div class="sessao">
                <h4>Dados do Feirante</h4>
                <hr>
                <div class="dado">
                    <h4>Identificador</h4>
                </div>
                <div class="dado">
                    <h4>Feirante</h4>
                </div>
                <div class="dado">
                    <h4>Categoria</h4>
                </div>
            </div>


            <div class="sessao">

                <h4>Dados da Operação</h4>
                <hr>
                <div class="dado">
                    <p class="key">Número de operação</p>
                    <p class="value">00055</p>
                </div>
                <div class="dado">
                    <p class="key">Tipo de operação</p>
                    <p class="value">00055</p>
                </div>
                <div class="dado">
                    <p class="key">Montante</p>
                    <p class="value">00055</p>
                </div>
                <div class="dado">
                    <p class="key">Data de Execução</p>
                    <p class="value">00055</p>
                </div>
            </div>
        </div>
        <!-- <div class="card-footer">
            <div id="container">
                <div style="text-align: center">
                    <p id="rda">
                        Conselho Províncial de
                        Enfermagem de Luanda, aos <span>{{ date('d') }}</span> de
                        <span>{{ date('m') }}</span> de
                        <span>{{ date('Y') }}</span>
                    </p>
                </div>
            </div>
        </div> -->
    </div>

</body>

</html>
