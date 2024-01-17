@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="modal-box" id="edit_form">
                <form action="{{ route('penilaian.perbarui', $data->alternatif_id) }}" method="post" enctype="multipart/form-data">
                    <h3 class="font-bold text-lg">Ubah {{ $judul }}:
                        <span class="text-greenPrimary" id="title_form">{{ $data->alternatif->objek->nama }}</span>
                    </h3>
                    @csrf
                    <input type="text" name="alternatif_id" value="{{ $data->alternatif_id }}" hidden />
                    @foreach ($subKriteria->unique('kriteria_id') as $item)
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">Sub Kriteria: <span class="text-greenPrimary">{{ $item->kriteria->nama }}</span></span>
                            </label>
                            <select class="select select-bordered text-dark" name="kriteria_id[]" id="kriteria_id[]">
                                <option disabled selected>--Pilih--</option>
                                @foreach ($subKriteria->where('kriteria_id', $item->kriteria_id) as $value)
                                    @if ($value->id == $data2->where('kriteria_id', $item->kriteria_id)->first()->sub_kriteria_id)
                                        <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                    @else
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label class="label">
                                @error('sub_kriteria_id')
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    @endforeach
                    <div class="modal-action">
                        <button type="submit" class="btn btn-success">Perbarui</button>
                        <a href="{{ route('penilaian') }}" class="btn">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
