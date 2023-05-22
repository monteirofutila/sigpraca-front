<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome completo</th>
                <th>Nome de usuário</th>
                <th>Função</th>
                <th>Email</th>
                <th>Telefone</th>
               <th style="width: 10%">Ação</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				<th>ID</th>
                <th>Nome completo</th>
                <th>Nome de usuário</th>
                <th>Função</th>
                <th>Email</th>
                <th>Telefone</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($users->data as $data)
                <tr>
					<td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->user_name }}</td>
                    <td>{{ $data->roles[0] }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone_mobile }}</td>
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
