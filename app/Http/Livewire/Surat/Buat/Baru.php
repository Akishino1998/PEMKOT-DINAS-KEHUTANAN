<?php

namespace App\Http\Livewire\Surat\Buat;

use App\Models\RefJenisSurat;
use Livewire\Component;

class Baru extends Component
{
    public $jenisSurat, $pilihanSurat;
    public function selectJenisSurat($jenisSurat){
        $this->jenisSurat = $jenisSurat;
        $this->pilihanSurat = "";
    }
    public function render(){
        $refJenisSurat = RefJenisSurat::where('can_create',$this->jenisSurat)->get();
        return view('livewire.surat.buat.baru',compact('refJenisSurat'));
    }
}
