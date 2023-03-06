<div>
    <form wire:submit.prevent="tambahSuratMasuk">
        <div class="card" >
            <div class="card-header">
                <h3 class="card-title">Tambahkan Surat Masuk</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <label class="form-label">Nomor Surat <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input class="form-control @error('nomorSurat') is-invalid state-invalid @enderror" placeholder="Nomor Surat " type="text" wire:model="nomorSurat">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pengirim <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <select class="form-control select2-dinas @error('pengirim') is-invalid state-invalid @enderror" data-placeholder="Pilih Pengirim" wire:model="pengirim" >
                            <option value="">--- Pilih Pengirim ---</option>
                            @foreach ($dinas as $item)
                                <option value="{{ $item->id }}">{{ $item->JenisDinas->jenis_dinas }} {{ $item->nama_dinas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tgl. Surat <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input class="form-control @error('tglSurat') is-invalid state-invalid @enderror" type="date" wire:model="tglSurat">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Perihal <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <textarea class="form-control @error('perihal') is-invalid state-invalid @enderror" placeholder="Perihal"  wire:model="perihal" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Berkas Surat <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input type="file" class="form-control border-right-0 browse-file @error('berkasSurat') is-invalid state-invalid @enderror" placeholder="Pilih Berkas" wire:model="berkasSurat" accept="image/jpg,image/jpeg, application/pdf, application/doc, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" readonly>
                        @error('berkasSurat') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card" >
            <div class="card-header">
                <h3 class="card-title">
                    Disposisi
                    <div wire:loading wire:target='"createDisposisi'>
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </h3>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <div class="form-label">Buat Disposisi <div wire:loading wire:target='"createDisposisi'>
                            <i class="fas fa-circle-notch fa-spin"></i>
                        </div></div>
                        <div class="d-flex justify-content-center">
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" wire:model="createDisposisi">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                @if ($createDisposisi)
                    <div class="form-group card-pay">
                        <label class="form-label">Sifat Disposisi <span class="badge badge-success-light mt-2">Wajib</span>
                        </label>
                        <ul class="tabs-menu nav">
                            <li><a class="{{ ($statusDisposisi==1)?"active":"" }}" data-toggle="tab" wire:click="setSifatDisposisi(1)"> <b>Segera</b></a></li>
                            <li><a class="{{ ($statusDisposisi==2)?"active":"" }}" data-toggle="tab" wire:click="setSifatDisposisi(2)"> <b>Sangat Segera</b></a></li>
                            <li><a class="{{ ($statusDisposisi==3)?"active":"" }}" data-toggle="tab" wire:click="setSifatDisposisi(3)"> <b>Rahasia</b></a></li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Keterangan Disposisi <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <textarea class="form-control @error('keteranganDisposisi') is-invalid state-invalid @enderror" placeholder="Keterangan Disposisi"  wire:model="keteranganDisposisi" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group" style="margin-bottom:0px">
                        <label class="form-label">Pegawai <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <select class="form-control select2-pegawai @error('pegawaiSelect') is-invalid state-invalid @enderror" data-placeholder="Pilih Pegawai" name="id_kategori" wire:model="pegawaiSelect" >
                            <option value="">--- Pilih Pegawai ---</option>
                            @foreach ($pegawai as $item)
                                <option value="{{ $item->id }}">{{ $item->Jabatan->jabatan }} - {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-primary" style="width: 100%" wire:click="addToPegawaiDisposisi"><i class="fas fa-user-plus"></i> Tambahkan Pegawai Ke Disposisi</span>
                        @if (session()->has('msg-pegawai'))
                            <div class="alert alert-success">
                                {{ session('msg-pegawai') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-hover card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th style="width: 50px;text-align:center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jumlahPegawaiDisposisi as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item['nip'] }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ $item['jabatan'] }}</td>
                                            <td style="width: 50px;text-align:center" wire:click="removePegawaiDisposisi({{ $item['id'] }})"><span class="btn btn-danger btn-sm"><i class="fa fa-user-times" aria-hidden="true"></i></span></td>
                                        </tr>
                                    @endforeach
                                    @if (COUNT($jumlahPegawaiDisposisi)==0)
                                        <tr>
                                            <th style="text-align: center" colspan="5">
                                                Tidak Ada Pegawai Dalam Disposisi Ini
                                            </th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card" >
            <div class="card-body">
                <button class="btn btn-primary" type="submit" ><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('surat.index') }}" class="btn btn-light"><i class="fas fa-trash    "></i> Batal</a>
            </div>
        </div>
    </form>
</div>
