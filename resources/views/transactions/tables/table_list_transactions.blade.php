<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Montante</th>
                <th>Vendedor</th>
                <th>Saldo anterior</th>
                <th>Saldo posterior</th>
                <th>Data</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Montante</th>
                <th>Vendedor</th>
                <th>Saldo anterior</th>
                <th>Saldo posterior</th>
                <th>Data</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($transactions->data as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ number_format($value->value, 2, ',', '.') }}
                    </td>
                    <td>{{ $value->account->worker->name }}</td>
                    <td>{{ $value->previous_balance }}</td>
                    <td>{{ $value->current_balance }}</td>
                    <td>{{ date('d/m/Y H:m:s', strtotime($value->created_at)) }}
                    </td>
                    <td>
                        <div class="form-button-action">
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                data-original-title="Edit Task">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
