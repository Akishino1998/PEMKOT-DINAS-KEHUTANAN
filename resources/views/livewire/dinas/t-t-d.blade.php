<div>
    @section('btn')
        <button class="btn btn-primary float-right"  data-toggle="modal" data-target="#modal-pegawai"> <i class="fas fa-plus    "></i> Tambah Baru </button>
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Penanggung Jawab Di {{ $refDinas->JenisDinas->jenis_dinas }} {{ $refDinas->nama_dinas }}
                <span class="badge badge-pill badge-info ">Urutan No. 1 berarti tingkat teratas pertanggungjawaban</span>
            </h3>
        </div>
        <div class="card-body">
            @if (session()->has('msg-undangan'))
                <div class="alert alert-success">
                    {{ session('msg-undangan') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table" id="refDinas-table">
                    <thead>
                        <tr>
                            <th style="width: 50px">No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Urutan</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($refPegawaiTTD as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->User->name }}</td>
                            <td>{{ $item->User->Jabatan->jabatan }}</td>
                            <td>{{ $item->urutan }}</td>
                            <td>
                                <div class='btn-group'>
                                    @if ($item->urutan == 1)
                                        @if (1 != COUNT($refDinas->PegawaiTTD))
                                            <button wire:click="urutanDown({{ $item->id }})" class='btn btn-info btn-sm'>
                                                <i class="fas fa-arrow-down"></i>
                                            </button>
                                        @endif
                                        
                                    @elseif ($item->urutan == COUNT($refDinas->PegawaiTTD)) 
                                        <button wire:click="urutanUp({{ $item->id }})" class='btn btn-info btn-sm'>
                                            <i class="fas fa-arrow-up"></i>
                                        </button>
                                    @else
                                        <button wire:click="urutanUp({{ $item->id }})" class='btn btn-info btn-sm'>
                                            <i class="fas fa-arrow-up"></i>
                                        </button>
                                        <button wire:click="urutanDown({{ $item->id }})" class='btn btn-info btn-sm'>
                                            <i class="fas fa-arrow-down"></i>
                                        </button>
                                        
                                    @endif
                                    <button class='btn btn-danger btn-sm'>
                                        <i class="fas fa-user-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if (COUNT($refDinas->PegawaiTTD)==0)
                    <div class="alert alert-danger" role="alert">
                        <p>Tidak Ada Data! </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-pegawai" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" wire:ignore.self style="">
        <div class="modal-dialog" role="document"  wire:ignore.self style="border-radius: 25px;box-shadow: 0px 0px 20px black;">
            <div class="modal-content"  wire:ignore.self>
                <form wire:submit.prevent="tambahPenanggungJawab">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pegawai Penganggung Jawab Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label for="nama">Pegawai<span class="badge badge-success-light">Wajib</span></label>
                            <select wire:model="selectedPegawai" class="form-control" id="selectedPegawai">
                                <option value="">--- Pilih Pegawai ---</option>
                                @foreach ($refPegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->Jabatan->jabatan }} {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            @if (session()->has('msg-undangan-danger'))
                                <div class="alert alert-danger">
                                    {{ session('msg-undangan-danger') }}
                                </div>
                            @endif
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" id="closePenanggungJawab" data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="tambahPenanggungJawab">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="tambahPenanggungJawab">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (session()->has('msg-undangan'))
        <script>
            $('#closePenanggungJawab').click(); 
        </script>
    @endif
</div>
