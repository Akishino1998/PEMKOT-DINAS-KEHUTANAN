<div class="table-responsive">
    <table class="table" id="refDinas-table">
        <thead>
        <tr>
            <th style="width: 50px">No</th>
            <th>Jenis Dinas</th>
            <th>Nama Dinas</th>
            <th style="width: 150px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($refDinas as $refDinas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $refDinas->JenisDinas->jenis_dinas }}</td>
                <td>{{ $refDinas->nama_dinas }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['master.dinas.destroy', $refDinas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('master.dinas.edit', [$refDinas->id]) }}"
                           class='btn btn-info btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('master.dinas.ttd', [$refDinas->id]) }}"
                            class='btn btn-success btn-sm'>
                             <i class="fas fa-cog"></i>
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
