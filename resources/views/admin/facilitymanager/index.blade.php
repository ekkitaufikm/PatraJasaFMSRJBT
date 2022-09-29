@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')

<div class="container-fluid pt-4">
                    
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12">
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            {{-- Kalo di laravel, ada fitur kurung kurawal 2 kali untuk echo --}}
                            <h5 class="card-title">{{ $page }}</h5>
                        </div>
                        <div class="col-lg-6">
                            {{-- karena pake route web resource, dibuat sama semua urlnya. Ini otomatis ke halaman form --}}
                            <a href="{{ url('sekolah/kepsek') }}/create" class="btn btn-sm btn-primary float-end">Ganti Facility Manager</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table text-center">
                        <tbody>
                        @if ($guru == null)
                            <tr>
                                <td colspan="3" class="text-center">Facility Manager Belum di Set</td>
                            </tr>
                        @else
                            <tr>
                                <td class="text-sm-end"><b>Nama Kepala Sekolah</b></td>
                                <td>:</td>
                                <td class="text-sm-start"><b>{{ $guru->nama }}</b></td>
                            </tr>
                            
                            <tr>
                                <td class="text-sm-end">NIP Kepala Sekolah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $guru->nip }} </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
@endsection

