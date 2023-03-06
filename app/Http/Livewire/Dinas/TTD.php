<?php

namespace App\Http\Livewire\Dinas;

use App\Models\RefDinasPegawai;
use App\Models\RefDinasTTD;
use Livewire\Component;

class TTD extends Component
{
    public $dinas,$selectedPegawai,$refPegawai,$refPegawaiTTD;
    protected $listeners = [
        'tambahPenanggungJawab'
    ];
    public function mount($dinas){
        $this->dinas = $dinas;
        $this->refPegawai = RefDinasPegawai::where('id_dinas',$this->dinas->id)->get();
        $this->refresh();
    }
    public function tambahPenanggungJawab(){
        $this->validate([
            'selectedPegawai' => 'required',
        ]);
        $urutan = 1;
        $refTTD = RefDinasTTD::where('id_dinas',$this->dinas->id)->get();
        if (COUNT($refTTD)>0) {
            $urutan=COUNT($refTTD)+1;
        }
        $refPegawai = RefDinasPegawai::find($this->selectedPegawai);
        $refTTD = RefDinasTTD::where('id_dinas',$this->dinas->id)->where('id_user',$refPegawai->id_user)->get();
        if (COUNT($refTTD)==0) {
            $refTTD = new RefDinasTTD;
            $refTTD->id_dinas = $this->dinas->id;
            $refTTD->id_user = $refPegawai->id_user;
            $refTTD->urutan = $urutan;
            $refTTD->save();
            session()->flash('msg-undangan', 'Berhasih ditambahkan.');
            $this->selectedPegawai = "";
        }else{
            session()->flash('msg-undangan', 'Pegawai tersebut sudah ada!');
            $this->selectedPegawai = "";
        }
        $this->refresh();

    }
    function urutanUp($id){
        $refTTD = RefDinasTTD::where('id_dinas',$this->dinas->id)->get();
        $pegawaiTTD = RefDinasTTD::find($id);
        $urutan = $pegawaiTTD->urutan;
        $pegawaiTTD->urutan = $urutan-1;
        foreach ($refTTD as $item) {
            if ($urutan-1==$item->urutan) {
                $item->urutan = $item->urutan+1;
                $item->save();
            }
        }
        $pegawaiTTD->save();
        $this->refresh();
    }
    function urutanDown($id){
        $refTTD = RefDinasTTD::where('id_dinas',$this->dinas->id)->get();
        $pegawaiTTD = RefDinasTTD::find($id);
        $urutan = $pegawaiTTD->urutan;
        $pegawaiTTD->urutan = $urutan+1;
        foreach ($refTTD as $item) {
            if ($urutan+1==$item->urutan) {
                $item->urutan = $item->urutan-1;
                $item->save();
            }
        }
        $pegawaiTTD->save();
        $this->refresh();
    }
    function refresh(){
        $this->refPegawaiTTD = RefDinasTTD::orderBy('urutan','asc')->where('id_dinas',$this->dinas->id)->get();
    }
    public function render()
    {
        $refDinas = $this->dinas;
        return view('livewire.dinas.t-t-d',compact('refDinas'));
    }
}
