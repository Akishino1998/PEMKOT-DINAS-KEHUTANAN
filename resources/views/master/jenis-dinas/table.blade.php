<div class="table-responsive">
    <table class="table" id="refDinasJenis-table">
        <thead>
        <tr>
            <th style="width: 50px">No</th>
            <th>Jenis Dinas</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($refDinasJenis as $refDinasJenis)
            <tr>                
                <td>{{ $loop->iteration }}</td>
                <td>{{ $refDinasJenis->jenis_dinas }}</td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('master.jenis-dinas.edit', [$refDinasJenis->id]) }}"
                           class='btn btn-primary btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
