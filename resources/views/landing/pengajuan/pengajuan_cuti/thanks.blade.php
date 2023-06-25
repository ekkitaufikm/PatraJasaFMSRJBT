@extends( 'landing/main' )

@section('css-library')
    
@endsection

@section('css-custom')
    
@endsection

@section('content')
<div id="parallax2" class="parallax">
    <div class="bg2 parallax-bg"></div>
    <div class="overlay"></div>
    <div class="parallax-content">
      <div class="container">

      </div>
    </div>
</div>
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
                                <p class="sec__desc font-weight-regular pb-2">Home / Sukses</p>
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
<br>
<div id="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 text-center">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="title">Terimakasih!</h3>
                        <h5>Silahkan menekan tombol dibawah untuk kembali ke halaman lainnya.</h5>
                    </div>
                </div>
                <div class="btn-box pb-4">
                    <a href="{{ url('') }}" class="theme-btn mb-2 mr-2">Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-library')
    
@endsection

@section('js-custom')
    
@endsection