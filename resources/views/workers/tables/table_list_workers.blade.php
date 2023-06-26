<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Identificador</th>
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
                <th>Identificador</th>
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
                    <td>{{ $data->code_number }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone_mobile }}</td>
                    <td>{{ date('d/m/Y', strtotime($data->date_birth)) }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->bi }}</td>
                    <td>
                        <div class="form-button-action">
                            <a href="{{ route('accounts.show', $data->id) }}"
                                data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                data-original-title="Detalhes da conta">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('workers.edit', $data->id) }}"
                                data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                data-original-title="Editar item">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('workers.destroy', $data->id) }}" class="delete-form" method="POST">
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
