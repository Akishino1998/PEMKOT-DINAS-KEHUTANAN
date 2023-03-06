<?php

namespace App\Http\Livewire\Surat;

use App\Models\Surat;
use Livewire\Component;

class Semua extends Component
{
    public function setSuratPenting($idSurat){
        $surat = Surat::find($idSurat);
        if (empty($surat)) {
        }
        if ($surat->penting == 2) {
            $surat->penting = 1;
            $surat->save();
        }else{
            $surat->penting = 2;
            $surat->save();
        }
    }
    public function render()
    {
        $surat = Surat::latest()->where('id_dinas',auth()->user()->dinas)->get();
        return view('livewire.surat.semua',compact('surat'));
    }
}
