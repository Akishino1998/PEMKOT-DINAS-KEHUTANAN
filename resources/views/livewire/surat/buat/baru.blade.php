<div>
    <div class="card-header">
        <h3 class="card-title">Buat Surat Baru</h3>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-12">
                <div class="card" >
                    <div class="card-header">
                        <h3 class="card-title">
                            Pilih Jenis Surat
                            <div wire:loading wire:target='"selectJenisSurat'>
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="wrapper">
                                <input type="radio" name="select" id="option-1">
                                <input type="radio" name="select" id="option-2">
                                <label for="option-1" class="option option-1" wire:click="selectJenisSurat(1)">
                                    <div class="dot"></div>
                                    <span><i class="fas fa-sign-in-alt"></i> Surat Masuk</span>
                                </label>
                                <label for="option-2" class="option option-2" wire:click="selectJenisSurat(2)">
                                    <div class="dot"></div>
                                    <span><i class="fas fa-sign-out-alt"></i> Surat Keluar</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pilih Jenis Surat <span class="badge badge-success-light mt-2">Wajib</span></label>
                            <select wire:model="pilihanSurat" class="form-control" id="pilihanSurat">
                                <option value="">--- Pilih Jenis Surat ---</option>
                                @foreach ($refJenisSurat as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_surat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            @if ($pilihanSurat == 1)
                <livewire:surat.buat.masuk>
            @elseif ($pilihanSurat == 2)
                <livewire:surat.buat.keluar>
            @elseif ($pilihanSurat == 6)
                <livewire:surat.buat.undangan-keluar>
            @endif
        </div>
    </div>
 
</div>
