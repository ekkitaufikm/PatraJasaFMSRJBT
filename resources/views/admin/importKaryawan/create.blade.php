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
                                        <a href="{{ url('excel-template/format_input_sekolah.xlsx') }}">
                                            <span class="text-light text-hover-primary">Download Template Excel</span>
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

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label class="col-form-label">Pilih Agama</label>
                                            <select id="select-agama" class="form-select select2" name="idAgama" aria-label="Default select example" required>
                                                <option value="">Pilih Agama</option>
                                                @foreach ($agama as $r) 
                                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label" for="validationCustomUsername">Copy untuk Excel</label>
                                            <input id="enAgama" type="text" class="form-control col-mb-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(function() {
        let baseUrl     = '{{ url('') }}';

        $('#select-agama').on('change', function() {
            $("#enAgama").val(this.value);
        });

        $('#select-periode').on('change', function() {
            $("#enPeriode").val(this.value);
        });

    });
</script>
@endsection