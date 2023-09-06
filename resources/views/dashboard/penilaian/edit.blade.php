@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="modal-box" id="edit_form">
                <form action="{{ route('penilaian.perbarui', $data->id) }}" method="post" enctype="multipart/form-data">
                    <h3 class="font-bold text-lg">Ubah {{ $judul }}: 
                        <span class="text-greenPrimary" id="title_form">{{ $data->kriteria->nama }}</span>
                    </h3>
                    @csrf
                    <input type="text" name="id" value="{{ $data->id }}" hidden />
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Sub Kriteria</span>
                        </label>
                        <select class="select select-bordered text-dark" name="sub_kriteria_id" id="sub_kriteria_id">
                            <option disabled selected>--Pilih--</option>
                            @foreach ($subKriteria as $value)
                                @if ($value->id == $data->sub_kriteria_id)
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
                    <div class="modal-action">
                        <button type="submit" class="btn btn-success">Perbarui</button>
                        <a href="{{ route('penilaian') }}" class="btn">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
