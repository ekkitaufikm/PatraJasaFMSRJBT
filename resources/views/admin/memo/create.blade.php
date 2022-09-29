@extends($admin)

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
                                        <a href="{{ url('admin/memo') }}">
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
                            <form action="{{ url('admin/memo') }}" method="POST">
                                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                                @csrf 
                                {{-- <input type="text" name="e" >
                                <input type="submit" > --}}
                
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Nomor Surat</label>
                                        <input name="no_surat" class="form-control" type="text" placeholder="Nomor Surat">
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Tempat Surat</label>
                                        <input name="surat_tempat" class="form-control" type="text" placeholder="Tempat Surat">
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Tanggal Surat</label>
                                        <input name="waktu_tanggal" class="form-control" type="date" placeholder="Tanggal Surat">
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Perihal Surat</label>
                                        <input name="perihal" class="form-control" type="text" placeholder="Perihal Surat">
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