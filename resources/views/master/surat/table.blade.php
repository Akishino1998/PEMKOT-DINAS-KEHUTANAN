<div class="table-responsive">
    <table class="table" id="refJenisSurats-table">
        <thead>
        <tr>
            <th style="width: 50px">No</th>
            <th>Nama Surat</th>
            {{-- <th style="width: 150px">Dapat Diubah</th> --}}
            {{-- <th style="width: 150px">Action</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach($refJenisSurats as $refJenisSurat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $refJenisSurat->nama_surat }}</td>
                    {{-- <td class="text-center">{{ ($refJenisSurat->can_create == 1)?"No":"Yes" }}</td> --}}
                    {{-- <td width="120">
                        {!! Form::open(['route' => ['master.surat.destroy', $refJenisSurat->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('master.surat.edit', [$refJenisSurat->id]) }}"
                            class='btn btn-info btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
