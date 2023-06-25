@extends('landing/main')

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <!-- ================================
    START BREADCRUMB AREA
    ================================= -->
    <section class="breadcrumb-area gradient-bg-gray before-none">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                            <div class="section-heading text-left">
                                <h2 class="sec__title">{{ $page }}</h2>
                                <p class="sec__desc font-weight-regular pb-2">Silahkan Mengisi Form Dibawah Ini!</p>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
        START JOB-DETAILS AREA
    ================================= -->
    <section class="job-details-area section--padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ url('checklist') }}" method="POST">
                        @csrf     
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title d-flex align-items-center justify-content-between">
                                    <span><i class="la la-briefcase mr-2 text-gray"></i>Checklist Toilet</span>
                                    <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span>
                                </h3>
                            </div>
                            <div class="form-content contact-form-action row">
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Nama Lengkap</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Nopeg</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input type="text" class="form-control" name="nip" placeholder="Nopeg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Area</label>
                                        <div class="form-group select-contain w-auto">
                                            <span class="la la-user form-icon"></span>
                                            <select class="select-contain-select" name="idArea">
                                                <option value="">Pilih Area</option>
                                                @foreach ($area as $r) 
                                                    <option value="{{ $r->idArea }}">{{ $r->nama }}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Supervisor</label>
                                        <div class="form-group select-contain w-auto">
                                            <span class="la la-user form-icon"></span>
                                            <select class="select-contain-select" name="idUsers">
                                                <option value="">Pilih Supervisor</option>
                                                @foreach ($users as $r) 
                                                    <option value="{{ $r->idUsers }}">{{ $r->nama }}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Area Toilet</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input type="text" class="form-control" name="area_toilet" placeholder="Area Toilet">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Tanggal</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input type="date" class="form-control" name="tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Jam Pembersihan</label>
                                        <div class="form-group select-contain w-auto">
                                            <span class="la la-user form-icon"></span>
                                            <select class="select-contain-select" name="pukul">
                                                <option value="">Pilih Jam</option>
                                                <option value="07.00">07.00</option>
                                                <option value="09.00">09.00</option>
                                                <option value="10.00">10.00</option>
                                                <option value="13.00">13.00</option>
                                                <option value="14.30">14.30</option>
                                            </select >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Floor</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="floor" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="floor" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="floor" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Wall</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="wall" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="wall" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="wall" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Rubbish Bin</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="rubbish_bin" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="rubbish_bin" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="rubbish_bin" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Mirror</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="mirror" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="mirror" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="mirror" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Hand Soap</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="hand_soap" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="hand_soap" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="hand_soap" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Tissue</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="tissue" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="tissue" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="tissue" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Wastafel</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="wastafel" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="wastafel" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="wastafel" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Toilet Bowl</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="toilet_bowl" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="toilet_bowl" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="toilet_bowl" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Urinoir</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="urinoir" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="urinoir" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="urinoir" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Hand Dryer</label>
                                        <div class="form-group">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="hand_dryer" value="Sudah" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Sudah</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="hand_dryer" type="checkbox" value="Belum" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Belum</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input h-20px w-20px" name="hand_dryer" type="checkbox" value="Tidak Ada" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-bold">Tidak Ada</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="submit-box">
                            <div class="btn-box pt-3">
                                <button type="submit" class="theme-btn">Kirim <i class="la la-arrow-right ml-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end job-details-area -->
    <!-- ================================
        END JOB-DETAILS AREA
    ================================= -->
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
{{-- Tempat Ngoding Meletakkan js custom --}}
@endsection