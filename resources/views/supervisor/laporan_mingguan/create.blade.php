@extends($supervisor)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">

        {{-- Diberikan alert --}}
        @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @elseif (session()->has('gagal'))
            <div class="alert alert-danger" role="alert">
                {{ session('gagal') }}
            </div>
        @endif
        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div class="container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>{{ $page }}</h2>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{ url('supervisor/laporan_mingguan') }}">
                                            <span class="text-light text-hover-primary">Kembali</span>
                                        </a>
                                    </button>
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <form action="{{ url('supervisor/laporan_mingguan') }}" method="POST" enctype="multipart/form-data">
                                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                                @csrf 
                                {{-- <input type="text" name="e" >
                                <input type="submit" > --}}
                
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Nama Supervisor</label>
                                        <select id="select-sem" class="form-select select2" name="idUsers" aria-label="Default select example" required>
                                            <option value="">Pilih Nama Supervisor</option>
                                            @foreach ($users as $r) 
                                                <option value="{{ $r->idUsers }}">{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Area</label>
                                        <select id="select-sem" class="form-select select2" name="idArea" aria-label="Default select example" required>
                                            <option value="">Pilih Area</option>
                                            @foreach ($area as $r) 
                                                <option value="{{ $r->idArea }}">{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">File Laporan Mingguan Supervisor</label>
                                        <input class="form-control" name="laporanMingguan" type="file" accept=".csv, .xls, .xlsx, .pdf">
                                        <span class="form-text fs-6 text-muted">File csv, xls, xlsx, dan pdf Max 1 Mb</span>
                                        {{-- <input type="file" class="form-control mb-2" name> --}}
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
        <!--end::Post-->
    </div>
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
{{-- Tempat Ngoding Meletakkan js custom --}}
@endsection