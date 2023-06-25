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
                                        <a href="{{ url('admin/checklist') }}">
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
                            <table id="datatable" class="table text-left">
                                <tbody>
                                    <tr>
                                        <td class="text-sm-end"><b>Nama Man Power</b></td>
                                        <td>:</td>
                                        <td class="text-sm-start"><b>{{ $checklist->nama }}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end"><b>Nopeg Man Power</b></td>
                                        <td>:</td>
                                        <td class="text-sm-start"><b>{{ $checklist->nip }}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Area</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->area->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Nama Supervisor</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->users->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Area Toilet</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->area_toilet ?? 'Belum Ada Data' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tanggal</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Pukul</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->pukul }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Floor</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->floor }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Wall</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->wall }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Rubbish Bin</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->rubbish_bin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Mirror</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->mirror }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Hand Soap</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->hand_soap }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tissue</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->tissue }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Wastafel</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->wastafel }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Toilet Bowl</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->toilet_bowl }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Urinoir</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->urinoir }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Hand Dryer</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $checklist->hand_dryer }}</td>
                                    </tr>
                                </tbody>
                            </table>
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