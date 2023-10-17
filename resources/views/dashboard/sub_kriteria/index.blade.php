@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if ($data != null)
                @foreach ($data as $item)
                    <div class="relative flex flex-col min-w-0 mb-5 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Tabel Kriteria <span class="text-greenPrimary">{{ $item['kriteria'] }}</span></h6>
                            <label for="add_button" id="label_{{ $item['kriteria'] }}" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-greenPrimary to-greenPrimary/80 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all">
                                <i class="ri-add-fill"></i>
                                Tambah {{ $judul }}
                            </label>
                        </div>
                        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="{{ 'tabel_data_' . $item['kriteria'] }}" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item['sub_kriteria'] as $subKriteria)
                                        <tr>
                                            <td>{{ $subKriteria['nama'] }}</td>
                                            <td>{{ $subKriteria['nilai'] }}</td>
                                            <td class="flex gap-x-3">
                                                <label for="edit_button" class="cursor-pointer" onclick="return edit_button('{{ $subKriteria['id'] }}')">
                                                    <i class="ri-pencil-line text-xl"></i>
                                                </label>
                                                <button onclick="return delete_button('{{ $subKriteria['id'] }}', '{{ $item['kriteria'] }}', '{{ $subKriteria['nama'] }}');">
                                                    <i class="ri-delete-bin-line text-xl"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="relative flex flex-col min-w-0 mb-5 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Tabel Sub Kriteria</h6>
                    </div>
                    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                        <table id="tabel_data" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- Form Tambah Data --}}
            <input type="checkbox" id="add_button" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box">
                    <form action="{{ route('sub_kriteria.simpan') }}" method="post" enctype="multipart/form-data">
                        <h3 class="font-bold text-lg">Tambah {{ $judul }} <span class="text-greenPrimary" id="title_add_button"></span></h3>
                            @csrf
                            <input type="number" name="kriteria_id" id="kriteria_id_add_button" hidden>
                            <input type="text" name="kode" id="kode_add_button" value="kode" hidden>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text">Nama</span>
                                </label>
                                <input type="text" name="nama" placeholder="Type here" class="input input-bordered w-full max-w-xs text-dark" value="{{ old('nama') }}" required />
                                <label class="label">
                                    @error('nama')
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text">Nilai</span>
                                </label>
                                <input type="number" name="nilai" placeholder="Type here" class="input input-bordered w-full max-w-xs text-dark" value="{{ old('nilai') }}" required />
                                <label class="label">
                                    @error('nilai')
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                        <div class="modal-action">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <label for="add_button" class="btn">Batal</label>
                        </div>
                    </form>
                </div>
                <label class="modal-backdrop" for="add_button">Close</label>
            </div>

            {{-- Form Ubah Data --}}
            <input type="checkbox" id="edit_button" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box" id="edit_form">
                    <form action="{{ route('sub_kriteria.perbarui') }}" method="post" enctype="multipart/form-data">
                        <h3 class="font-bold text-lg">Ubah {{ $judul }}: <span class="text-greenPrimary" id="title_form"><span class="loading loading-dots loading-md"></span></span></h3>
                            @csrf
                            <input type="text" name="id" hidden />
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text">Nama</span>
                                    <span class="label-text-alt" id="loading_edit1"></span>
                                </label>
                                <input type="text" name="nama" placeholder="Type here" class="input input-bordered w-full max-w-xs text-dark" required />
                                <label class="label">
                                    @error('nama')
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text">Nilai</span>
                                    <span class="label-text-alt" id="loading_edit2"></span>
                                </label>
                                <input type="number" name="nilai" placeholder="Type here" class="input input-bordered w-full max-w-xs text-dark" required />
                                <label class="label">
                                    @error('nilai')
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                        <div class="modal-action">
                            <button type="submit" class="btn btn-success">Perbarui</button>
                            <label for="edit_button" class="btn">Batal</label>
                        </div>
                    </form>
                </div>
                <label class="modal-backdrop" for="edit_button">Close</label>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        // Tabel
        $(document).ready(function() {
            @if ($data != null)
                @foreach ($data as $item)
                    $("#tabel_data_{{ $item['kriteria'] }}").DataTable({
                        responsive: true,
                        order: [],
                    })
                    .columns.adjust()
                    .responsive.recalc();

                    $("#label_{{ $item['kriteria'] }}").click(function () {
                        $("#title_add_button").html("{{ $item['kriteria'] }}");
                        $("#kriteria_id_add_button").val("{{ $item['kriteria_id'] }}");
                    });
                @endforeach
            @else
                $("#tabel_data").DataTable({
                        responsive: true,
                        order: [],
                    })
                    .columns.adjust()
                    .responsive.recalc();
            @endif
        });

        @if (session()->has('berhasil'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('berhasil') }}',
                icon: 'success',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if (session()->has('gagal'))
            Swal.fire({
                title: 'Gagal',
                text: '{{ session('gagal') }}',
                icon: 'error',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: @foreach ($errors->all() as $error) '{{ $error }}' @endforeach,
            })
        @endif

        function edit_button(id) {
            // Loading effect start
            let loading = `<span class="loading loading-dots loading-md text-greenPrimary"></span>`;
            $("#title_form").html(loading);
            $("#loading_edit1").html(loading);
            $("#loading_edit2").html(loading);

            $.ajax({
                type: "get",
                url: "{{ route('sub_kriteria.ubah') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function (data) {
                    // console.log(data);
                    let items = [];
                    $.each(data, function(key, val) {
                        items.push(val);
                    });

                    // console.log(items);

                    $("#title_form").html(`${items[7]['nama']}`);
                    $("input[name='id']").val(items[0]);
                    $("input[name='nama']").val(items[2]);
                    $("input[name='nilai']").val(items[3]);

                    // Loading effect end
                    loading = "";
                    $("#loading_edit1").html(loading);
                    $("#loading_edit2").html(loading);
                }
            });
        }

        function delete_button(id, kriteria, nama) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                html:
                    "<p>Data tidak dapat dipulihkan kembali!</p>" +
                    "<div class='divider'></div>" +
                    "<b>Data: Kriteria " + kriteria + " (" + nama + ")</b>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6419E6',
                cancelButtonColor: '#F87272',
                confirmButtonText: 'Hapus Data!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('sub_kriteria.hapus') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Data berhasil dihapus!',
                                icon: 'success',
                                confirmButtonColor: '#6419E6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data gagal dihapus!',
                            })
                        }
                    });
                }
            })
        }
    </script>
@endsection
