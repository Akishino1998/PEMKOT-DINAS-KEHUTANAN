<div>
    <div class="card" >
        <div class="card-header">
            <h3 class="card-title">Buat Surat Masuk</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <label class="form-label">Nomor Surat <span class="badge badge-success-light mt-2">Wajib</span></label>
                    <input class="form-control @error('nomorSurat') is-invalid state-invalid @enderror" placeholder="Nomor Surat " type="text" wire:model="nomorSurat">
                </div>
                <div class="form-group" wire:ignore>
                    <label class="form-label">Isi Surat</label>
                    <textarea class="isiText" name="example" wire:model='isi'></textarea>
                </div>
                <script>
                    $(function(e) {
                        $('.isiText').richText();
                    });
                </script>
            </div>
        </div>
    </div>
</div>
