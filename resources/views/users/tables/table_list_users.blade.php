<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Identificador</th>
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
                <th>Identificador</th>
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
                    <td>{{ $data->code_number }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->user_name }}</td>
                    <td>{{ $data->roles[0] }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone_mobile }}</td>
                    <td>
                        <div class="form-button-action">
                            <a href="{{ route('users.edit', $data->id) }}"
                                data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                data-original-title="Editar item">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('users.destroy', $data->id) }}" class="delete-form" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    data-toggle="tooltip" class="btn btn-link btn-danger"
                                    data-original-title="Excluir item">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('js')
<script>

    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', confirmDelete);
    });

    function confirmDelete(event) {
        event.preventDefault();

        const form = event.target;

        Swal.fire({
            //title: 'Você tem certeza?',
            text: 'Você tem certeza?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, exclua!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endpush
