<div class="table-responsive">
    <table class="table" id="refJabatans-table">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 150px">Jenis Dinas</th>
                <th>Jabatan</th>
                <th style="width: 150px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jabatan as $refJabatan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $refJabatan->JenisDinas->jenis_dinas }}</td>
                <td>{{ $refJabatan->jabatan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['master.jabatan.destroy', $refJabatan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('master.jabatan.edit', [$refJabatan->id]) }}"
                           class='btn btn-info btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
