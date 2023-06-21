<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Périodo de pagamento</th>
                <th>Débito</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Périodo de pagamento</th>
                <th>Débito</th>
                <th style="width: 10%">Ação</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($categories->data as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->payment_period }}</td>
                    <td>{{ number_format($data->debit_amount, 2, ',', '.') }}
                    <td>
                        <div class="form-button-action">
                            <a href="{{ route('categories.edit', $data->id) }}"
                                data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                data-original-title="Editar item">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $data->id) }}" class="delete-form" method="POST">
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
