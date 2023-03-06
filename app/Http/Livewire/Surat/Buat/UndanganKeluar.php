<?php

namespace App\Http\Livewire\Surat\Buat;

use App\Models\DocTembusan;
use App\Models\DocUndanganKeluar;
use App\Models\DocUndanganKeluarTujuan;
use App\Models\RefDinas;
use App\Models\RefDinasPegawai;
use App\Models\RefDinasTTD;
use App\Models\Surat;
use App\Models\SuratTrack;
use App\Models\SuratView;
use Livewire\Component;

class UndanganKeluar extends Component
{
    public $time_start, $time_end;
    public $jenisSurat = 6;
    public function set_date($time_start,$time_end){
        $this->time_start =  date("Y-m-d H:i:00", strtotime($time_start));
        $this->time_end = date("Y-m-d H:i:00", strtotime($time_end));
    }
    public $daftarUndanganBaru = [];
    public $undanganBaru,$keteranganUndangan,$dinasSelected;
    public $dinas, $idDinasSaatIni;

    public $nomorSurat,$agenda,$tempat,$isi,$perihal;
    public function mount(){
        $this->idDinasSaatIni = auth()->user()->dinas;
        $this->dinas = RefDinas::where('id',"!=",$this->idDinasSaatIni)->get(); 
    }
    public $tembusan,$daftarTembusan = [];
    public function tambahTembusan(){
        $this->validate([
            'tembusan' => 'required',
        ]);
        $x['tembusan'] = $this->tembusan;
        array_push($this->daftarTembusan,$x);
        $this->tembusan = "";
    }
    function removeTembusan($tembusan){
        $i = 0;
        foreach ($this->daftarTembusan as $value) {
            if ($value['tembusan'] == $tembusan) {
                if ($i==0) {
                    array_splice($this->daftarTembusan, $i, 1); 
                }else{
                    array_splice($this->daftarTembusan, $i, $i); 
                }
            }    
            $i++;           
        }
    }
    function tambahUndanganBaru(){
        $this->validate([
            'undanganBaru' => 'required',
        ]);
        $status = true;
        if (COUNT($this->daftarUndanganBaru)>0) {
            $i = 0;
            foreach ($this->daftarUndanganBaru as $value) {
                if ($value['undangan'] == $this->undanganBaru) {
                    $status = false;
                }
                $i++;
            }
        }
        if ($status) {
            $dinas = RefDinas::find($this->undanganBaru);
            if(empty($dinas)){
                $x['id'] = 0;
                $x['undangan'] = $this->undanganBaru;
                array_push($this->daftarUndanganBaru,$x);
            }else{
                $this->validate([
                    'keteranganUndangan' => 'required',
                ]);
                $x['id'] = $dinas->id;
                $x['undangan'] = $this->keteranganUndangan;
                array_push($this->daftarUndanganBaru,$x);
            }
            session()->flash('msg-undangan', 'Undangan ditambahkan.');
            $this->undanganBaru = "";
            $this->keteranganUndangan = "";
        }else{
            session()->flash('msg-undangan-danger', 'Sudah ada undangan tersebut.');
            $this->undanganBaru = "";
            $this->keteranganUndangan = "";
        }
    }
    function removeUndangan($idUndangan){
        $i = 0;
        foreach ($this->daftarUndanganBaru as $value) {
            if ($value['undangan'] == $idUndangan) {
                if ($i==0) {
                    array_splice($this->daftarUndanganBaru, $i, 1); 
                }else{
                    array_splice($this->daftarUndanganBaru, $i, $i); 
                }
            }    
            $i++;           
        }
    }
    function setText($isi){
        $this->isi = $isi;
    }
    protected $messages = [
        'nomorSurat.required' => 'Nomor Surat Wajib Diisi!',
        'agenda.required' => 'Agenda Wajib Diisi!',
        'tempat.required' => 'Tempat Wajib Diisi!',
        'perihal.required' => 'Perihal Wajib Diisi!',
        'time_start.required' => 'Tgl. Mulai Wajib Diisi!',
        'daftarUndanganBaru.required' => 'Daftar Undangan Wajib Diisi!',
    ];
    function tambahSuratUndangaKeluar(){
        $this->validate([
            'nomorSurat' => 'required|max:150',
            'agenda' => 'required',
            'tempat' => 'required',
            'perihal' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'daftarUndanganBaru' => 'required',
        ]);

        $tglPembuatan = NOW();
        $surat = new Surat();
        $surat->id_jenis_surat = $this->jenisSurat;
        $surat->id_dinas = $this->idDinasSaatIni;
        $surat->id_admin = auth()->user()->id;
        $surat->status = 1;
        $surat->nomor_surat = $this->nomorSurat;
        $surat->tgl_masuk = $tglPembuatan; //tgl pembuatan
        $surat->save();

        $docUndanganKeluar = new DocUndanganKeluar;
        $docUndanganKeluar->id_surat = $surat->id;
        $docUndanganKeluar->id_admin = auth()->user()->id;
        $docUndanganKeluar->nomor_surat = $this->nomorSurat;
        $docUndanganKeluar->perihal = $this->perihal;
        $docUndanganKeluar->tgl_pembuatan = $tglPembuatan;
        $docUndanganKeluar->tempat = $this->tempat;
        $docUndanganKeluar->agenda = $this->agenda;
        $docUndanganKeluar->tgl_dimulai = $this->time_start;
        $docUndanganKeluar->tgl_diakhiri = $this->time_end;
        $docUndanganKeluar->isi = $this->isi;
        $docUndanganKeluar->save();

        $suratTrack = new SuratTrack;
        $suratTrack->setTrackSurat($surat->id,"Undangan baru dibuat pada ". date("d F Y", strtotime($tglPembuatan)));

        foreach ($this->daftarUndanganBaru as $item) {
            $docUndanganTujuan = new DocUndanganKeluarTujuan;
            $docUndanganTujuan->id_undangan = $docUndanganKeluar->id;
            if ($item['id'] != 0) {
                $docUndanganTujuan->id_dinas = $item['id'];
            }
            $docUndanganTujuan->keterangan = $item['undangan'];
            $docUndanganTujuan->save();
        }
        $pegawai = RefDinasTTD::where('id_dinas',auth()->user()->dinas)->get();
        foreach ($pegawai as $item) {
            $suratView = new SuratView;
            $suratView->id_surat = $surat->id;
            $suratView->urutan = $item->urutan;
            $suratView->id_user = $item->id_user;
            $suratView->terbaca = "N";
            $suratView->diproses = "N";
            $suratView->save();
        }
    }
    public function render(){
        return view('livewire.surat.buat.undangan-keluar');
    }
}
