<div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Semua Surat</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-inbox">
                        <tbody>
                            @foreach ($surat->groupBy('penting') as $key => $items)
                                @foreach ($items as $item)
                                    <tr class="{{ ($item->cekRead($item->id))?"unread":"a" }}">

                                        @if ($item->penting == 1)
                                            <td class="inbox-small-cells" style="width: 50px"  wire:click="setSuratPenting({{ $item->id }})"><i class="fa fa-star text-warning"></i></td>
                                        @else
                                            <td class="inbox-small-cells" style="width: 50px"  wire:click="setSuratPenting({{ $item->id }})"><i class="fa fa-star inbox-started"></i></td>
                                        @endif
                                        
                                        
                                        @if ($item->JenisSurat->can_create == 1)
                                            <td class="inbox-small-cells" style="width: 150px">
                                                <b>{{ $item->getPengirimSuratMasuk($item->id)->Dinas->JenisDinas->jenis_dinas }} {{ $item->getPengirimSuratMasuk($item->id)->Dinas->nama_dinas }}</b>
                                            </td>
                                        @else
                                            <td class="inbox-small-cells" style="width: 150px">
                                                <b>Dikirim Ke -</b>
                                            </td>
                                        @endif

                                        @if ($item->JenisSurat->can_create == 1)
                                            <td class="inbox-small-cells" style="width: 50px" >
                                                <span class="badge badge-success-light"><i class="fas fa-inbox"></i> {{ $item->JenisSurat->nama_surat }}</span>
                                            </td>
                                        @else
                                            <td class="inbox-small-cells"  style="width: 50px" >
                                                <span class="badge badge-info-light"><i class="far fa-paper-plane"></i> {{ $item->JenisSurat->nama_surat }}</span>
                                            </td>
                                        @endif

                                        <td class="inbox-small-cells" >
                                            {{  $item->getPengirimSuratMasuk($item->id)->perihal  }}
                                        </td>

                                        <td class="view-message  text-right">
                                            @if (date('Y-m-d', strtotime(NOW())) == date("Y-m-d", strtotime($item->tgl_masuk)))
                                                {{ date("H:i", strtotime($item->tgl_masuk)) }}
                                            @else
                                                {{ date("d F", strtotime($item->tgl_masuk)) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
