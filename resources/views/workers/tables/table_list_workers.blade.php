<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome completo</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Nascimento</th>
                <th>Gênero</th>
                <th>BI</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nome completo</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Nascimento</th>
                <th>Gênero</th>
                <th>BI</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($workers->data as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone_mobile }}</td>
                    <td>{{ date('d/m/Y', strtotime($data->date_birth)) }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->bi }}</td>
                    <td>
                        <div class="form-button-action">
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                data-original-title="Edit Task">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                data-original-title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
