
<div>
    <form wire:submit.prevent="tambahSuratUndangaKeluar">
        <div class="card" >
            <div class="card-header">
                <h3 class="card-title">Buat Undangan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

                    <div class="form-group">
                        <label class="form-label">Nomor Surat <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input class="form-control @error('nomorSurat') is-invalid state-invalid @enderror" placeholder="Nomor Surat " type="text" wire:model="nomorSurat">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Perihal <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input class="form-control @error('perihal') is-invalid state-invalid @enderror" placeholder="Perihal " type="text" wire:model="perihal">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tempat <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input class="form-control @error('tempat') is-invalid state-invalid @enderror" placeholder="Tempat " type="text" wire:model="tempat">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Agenda <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input class="form-control @error('agenda') is-invalid state-invalid @enderror" placeholder="Agenda " type="text" wire:model="agenda">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tgl. Mulai <span class="badge badge-success-light mt-2">Wajib</span></label>
                        <input id="date_range" class="datepicker-here form-control digits" autocomplete="off" readonly required style="font-size: 12px;">
                    </div>
                    <div class="form-group" wire:ignore>
                        <label class="form-label">Isi Surat</label>
                        <textarea id="isiText" name="isi" wire:model='isi' wire:ignore></textarea>
                        <script>
                            $(function(e) {
                                $('#isiText').richText();
                            });
                        </script>
                    </div>
                    <script>
                        $('#date_range').daterangepicker({
                            locale: {
                                format: 'HH:mm DD MMMM YYYY'
                            },
                            "timePicker": true,
                            "timePicker24Hour": true,
                        }, function(start, end, label) {
                            console.log('New date range selected: ' + start.format('YYYY-MM-DD HH:mm') + ' to ' + end.format('YYYY-MM-DD HH:mm') + ' (predefined range: ' + label + ')');
                            @this.call('set_date',start.format('YYYY-MM-DD HH:mm'),end.format('YYYY-MM-DD HH:mm'))
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tembusan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Tembusan <span class="badge badge-success-light mt-2">Wajib</span></label>
                    <input class="form-control @error('tembusan') is-invalid state-invalid @enderror" placeholder="Gubernur Kalimantan Timur di Samarinda" type="text" wire:model="tembusan">
                </div>
                <div class="form-group">
                    <span class="btn btn-primary" style="width: 100%" wire:click="tambahTembusan"><i class="fas fa-user-plus"></i> Tambahkan Tembusan Undangan</span>
                    @if (session()->has('msg-undangan'))
                        <div class="alert alert-success">
                            {{ session('msg-undangan') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Tembusan</th>
                                    <th style="width: 50px;text-align:center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarTembusan as $item)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item['tembusan'] }}</td>
                                        <td style="width: 50px;text-align:center" wire:click="removeTembusan('{{ $item['tembusan'] }}')"><span class="btn btn-danger btn-sm"><i class="fa fa-user-times" aria-hidden="true"></i></span></td>
                                    </tr>
                                @endforeach
                                @if (COUNT($daftarTembusan)==0)
                                    <tr>
                                        <th style="text-align: center" colspan="5">
                                            Tidak Ada Tembusan
                                        </th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Undangan</h3>
            </div>
            <div class="card-body">
                <div class="form-group" style="margin-bottom:0px">
                    <label class="form-label">Dari Dinas <span class="badge badge-success-light mt-2">Wajib</span> <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#modal-UndanganBaru"><i class="fas fa-plus    "></i> Jika tidak ada, tambahkan di sini!</button> </label>
                    <select class="form-control select2-pegawai @error('undanganBaru') is-invalid state-invalid @enderror" data-placeholder="Pilih Dinas" name="dinasSelected" wire:model="undanganBaru" >
                        <option value="">--- Pilih Dinas ---</option>
                        @foreach ($dinas as $item)
                            <option value="{{ $item->id }}">{{ $item->JenisDinas->jenis_dinas }} {{ $item->nama_dinas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Mengundang <span class="badge badge-success-light mt-2">Wajib</span></label>
                    <input class="form-control @error('keteranganUndangan') is-invalid state-invalid @enderror" placeholder="Kepala UPTD KPHP ... /  Kepala Bidang ..." type="text" wire:model="keteranganUndangan">
                </div>
                <div class="form-group">
                    <span class="btn btn-primary" style="width: 100%" wire:click="tambahUndanganBaru"><i class="fas fa-user-plus"></i> Tambahkan Pegawai Ke Disposisi</span>
                    @if (session()->has('msg-undangan'))
                        <div class="alert alert-success">
                            {{ session('msg-undangan') }}
                        </div>
                    @endif
                    @if (session()->has('msg-undangan-danger'))
                        <div class="alert alert-danger">
                            {{ session('msg-undangan-danger') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No</th>
                                    <th>Undangan</th>
                                    <th style="width: 50px;text-align:center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarUndanganBaru as $item)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item['undangan'] }}</td>
                                        <td style="width: 50px;text-align:center" wire:click="removeUndangan('{{ $item['undangan'] }}')"><span class="btn btn-danger btn-sm"><i class="fa fa-user-times" aria-hidden="true"></i></span></td>
                                    </tr>
                                @endforeach
                                @if (COUNT($daftarUndanganBaru)==0)
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
            </div>
        </div>
        <div class="card" >
            <div class="card-body">
               
                <button class="btn btn-primary" onclick="@this.call('setText',$('.richText-editor').html())" type="submit" ><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('surat.index') }}" class="btn btn-light"><i class="fas fa-trash    "></i> Batal</a>
                
            </div>
        </div>
    </form>
    <div class="modal fade" id="modal-UndanganBaru" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" wire:ignore.self style="">
        <div class="modal-dialog" role="document"  wire:ignore.self style="border-radius: 25px;box-shadow: 0px 0px 20px black;">
            <div class="modal-content"  wire:ignore.self>
                <form wire:submit.prevent="tambahUndanganBaru">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Daftar Undangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label for="nama">Daftar Undangan <span class="badge badge-success-light">Wajib</span></label>
                            <input class="form-control @error('daftarUndanganBaru') is-invalid @enderror" wire:model.defer="undanganBaru" type="text" placeholder="Kepala UPTD KPHP ... /  Kepala Bidang ..." id="undanganBaru" autocomplete="off">
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
                        <button type="button" class="btn btn-light" id="closeUndanganUndanganBaru" data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="tambahUndanganBaru">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="tambahUndanganBaru">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div wire:poll>
        @if (session()->has('msg-undangan'))
            <script>
                $('#closeUndanganUndanganBaru').click(); 
            </script>
        @endif
    </div>
</div>
