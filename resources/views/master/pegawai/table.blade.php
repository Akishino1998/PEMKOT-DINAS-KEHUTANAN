<div class="table-responsive">
    <table class="table" id="refDinasPegawais-table">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px">No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Dinas</th>
                <th>Jabatan</th>
                <th>Akun</th>
                <th style="width: 150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($refDinasPegawais as $refDinasPegawai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $refDinasPegawai->nip }}</td>
                    <td>{{ $refDinasPegawai->nama }}</td>
                    <td>{{ $refDinasPegawai->Dinas->JenisDinas->jenis_dinas }} {{ $refDinasPegawai->Dinas->nama_dinas }}</td>
                    <td>{{ $refDinasPegawai->Jabatan->jabatan }}</td>
                    <td>{!! empty($refDinasPegawai->User)?'<span class="badge badge-pill badge-danger mt-2"><i class="fas fa-times"></i></span> ':'<span class="badge badge-pill badge-success mt-2"><i class="fas fa-check"></i></span>' !!}</td>
                    <td>
                        <div class='btn-group'>
                            <a href="{{ route('master.pegawai.show', [$refDinasPegawai->id]) }}" class='btn btn-info btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('master.pegawai.edit', [$refDinasPegawai->id]) }}" class='btn btn-primary btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>
                            @if (empty($refDinasPegawai->User))
                                <a href="{{ route('master.pegawai.akun', [$refDinasPegawai->id]) }}" class='btn btn-success btn-sm'>
                                    <i class="fas fa-user-cog"></i>
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
