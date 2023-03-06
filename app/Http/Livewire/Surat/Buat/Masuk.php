<?php

namespace App\Http\Livewire\Surat\Buat;

use App\Models\DocDisposisi;
use App\Models\DocDisposisiDetail;
use App\Models\DocSuratMasuk;
use App\Models\RefDinas;
use App\Models\RefDinasPegawai;
use App\Models\Surat;
use App\Models\SuratTrack;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
class Masuk extends Component
{
    use WithFileUploads;
    public $jenisSurat = 1,$statusDisposisi = 1;
    public $idDinasSaatIni;
    public $createDisposisi;
    public $pegawai, $pegawaiSelect;
    public $dinas;
    public $jumlahPegawaiDisposisi = [];
    public $nomorSurat, $pengirim, $tglSurat, $perihal, $berkasSurat, $keteranganDisposisi;
    public function mount(){
        $this->pegawai = RefDinasPegawai::where('id_dinas',auth()->user()->dinas)->get();
        $this->dinas = RefDinas::get(); 
        $this->idDinasSaatIni = auth()->user()->dinas;
    }
    protected $messages = [
        'berkasSurat.max' => 'Maksimal ukuran berkas 10MB!',
        'berkasSurat.required' => 'Wajib Diisi, ya!',
        'berkasSurat.mimes' => 'File Wajib Format JPG, JPEG, PNG, PDF Dan DOCX!',
    ];
    public function setSifatDisposisi($statusDisposisi){
        $this->statusDisposisi = $statusDisposisi;
    }
    public function addToPegawaiDisposisi(){
        $this->validate([
            'pegawaiSelect' => 'required',
        ]);
        $status = true;
        if (COUNT($this->jumlahPegawaiDisposisi)>0) {
            $i = 0;
            foreach ($this->jumlahPegawaiDisposisi as $value) {
                if ($value['id'] == $this->pegawaiSelect) {
                    $status = false;
                }
                $i++;
            }
        }
        if ($status) {
            $pegawai = RefDinasPegawai::find($this->pegawaiSelect);
            $x['id'] = $pegawai->id;
            $x['nip'] = $pegawai->nip;
            $x['nama'] = $pegawai->nama;
            $x['jabatan'] = $pegawai->Jabatan->jabatan;
            array_push($this->jumlahPegawaiDisposisi,$x);
            session()->flash('msg-pegawai', 'Pegawai ditambahkan.');
            $this->pegawaiSelect = "";
        }else{
            session()->flash('msg-pegawai', 'Sudah ada pegawai tersebut.');
        }
    }
    function removePegawaiDisposisi($idPegawaiDisposisi){
        $i = 0;
        foreach ($this->jumlahPegawaiDisposisi as $value) {
            if ($value['id'] == $idPegawaiDisposisi) {
                if ($i==0) {
                    array_splice($this->jumlahPegawaiDisposisi, $i, 1); 
                }else{
                    array_splice($this->jumlahPegawaiDisposisi, $i, $i); 
                }
            }    
            $i++;           
        }
    }
    public function tambahSuratMasuk(){
        $this->validate([
            'berkasSurat.*' => 'required|max:10000|mimes:jpg,jpeg,png,pdf,docx,doc',
            'nomorSurat' => 'required|max:150',
            'pengirim' => 'required',
            'tglSurat' => 'required|date',
            'perihal' => 'required',
        ]);
        $tglMasukSurat = NOW();
        $surat = new Surat;
        $surat->id_jenis_surat = $this->jenisSurat;
        $surat->id_dinas = $this->idDinasSaatIni;
        $surat->id_admin = auth()->user()->id;
        $surat->status = 1;
        $surat->nomor_surat = $this->nomorSurat;
        $surat->tgl_masuk = $tglMasukSurat;
        $surat->tgl_surat = $this->tglSurat;
        $surat->save();

        $docSuratMasuk = new DocSuratMasuk;
        $docSuratMasuk->id_surat = $surat->id;
        $docSuratMasuk->pengirim = $this->pengirim;
        $docSuratMasuk->id_admin = auth()->user()->id;
        $docSuratMasuk->nomor_surat = $this->nomorSurat;
        $docSuratMasuk->tgl_masuk = $tglMasukSurat;
        $docSuratMasuk->tgl_surat = $this->tglSurat;
        $docSuratMasuk->perihal = $this->perihal;
        if (isset($this->berkasSurat)) {
            $fileName = $this->berkasSurat->store('surat-masuk', 'public');
            $docSuratMasuk->file_surat = $fileName;
        }
        $docSuratMasuk->save();

        $suratTrack = new SuratTrack;
        $suratTrack->setTrackSurat($surat->id,"Surat Masuk dibuat pada ". date("d F Y", strtotime($tglMasukSurat)));

       

        if ($this->createDisposisi){
            $this->validate([
                'keteranganDisposisi' => 'required',
            ]);
            $disposisi = new DocDisposisi;
            $disposisi->id_surat = $surat->id;
            $disposisi->keterangan_disposisi = $this->keteranganDisposisi;
            $disposisi->tgl_diposisi_dibuat = $tglMasukSurat;
            $disposisi->sifat = $this->statusDisposisi;
            $disposisi->save();

            foreach ($this->jumlahPegawaiDisposisi as $item) {
                $disposisiDetail = new DocDisposisiDetail;
                $disposisiDetail->id_pegawai = $item['id'];
                $disposisiDetail->status = 1;
                $disposisiDetail->save();
            }
        }

    }
    public function render()
    {
        return view('livewire.surat.buat.masuk');
    }
}
