@extends('landing/main')

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <section class="job-details-area section--padding">
        <div class="container">
            <div class="row text center mb-5">
                <div class="col-sm-12 text-center">
                    <h3>Daftar Pengajuan Man Power</h3>
                </div>
            </div>
            <div class="row text-center mt-5">
                <div class="col-lg-6">
                    <div class="icon-box icon-layout-4 faq-icon-box">
                        <a href="{{ url('pengajuan_cuti') }}/create" class="d-block">
                            <div class="info-icon">
                                <i class="la la-users"></i>
                            </div>
                            <span class="d-block info__title">Pengajuan Cuti</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="icon-box icon-layout-4 faq-icon-box">
                        <a href="{{ url('pengajuan_izin') }}/create" class="d-block">
                            <div class="info-icon">
                                <i class="la la-users"></i>
                            </div>
                            <span class="d-block info__title">Surat Izin Keluar Kantor</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="icon-box icon-layout-4 faq-icon-box">
                        <a href="{{ url('pengajuan_lembur') }}/create" class="d-block">
                            <div class="info-icon">
                                <i class="la la-users"></i>
                            </div>
                            <span class="d-block info__title">Pengajuan Lembur</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="icon-box icon-layout-4 faq-icon-box">
                        <a href="{{ url('pengajuan_ketkerja') }}/create" class="d-block">
                            <div class="info-icon">
                                <i class="la la-users"></i>
                            </div>
                            <span class="d-block info__title">Pengajuan Keterangan Kerja</span>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </section><!-- end job-details-area -->
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
{{-- Tempat Ngoding Meletakkan js custom --}}
@endsection