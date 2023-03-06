<div class="form-group col-sm-12">
    {!! Form::label('jenis_dinas', 'Pilih Jenis Dinas') !!}
    <select name="jenis_dinas" class="form-control">
        @foreach ($jenisDinas as $item)
            <option value="{{ $item->id }}"{{ ($item->id==$refDinas->id_jenis_dinas)?"selected":"" }}>{{ $item->jenis_dinas }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('nama_dinas', 'Nama Dinas:') !!}
    {!! Form::text('nama_dinas', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>