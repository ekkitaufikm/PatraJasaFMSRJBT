<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\MImportexcelKaryawanModel;
use App\Models\JabatanModel;
use App\Models\KelaminModel;
use App\Models\AreaModel;
use App\Models\StatusModel;
use App\Models\RoleModel;
use App\Models\AgamaModel;

class ImportKaryawanController extends Controller
{
    private $views      = 'admin/importKaryawan';
    private $url        = 'admin/import_karyawan';
    private $title      = 'Halaman Import Karyawan';


    public function __construct()
    {
        // Di isi Construct
        $this->mExcelKaryawan       = new MImportexcelKaryawanModel();
        $this->mJabatan             = new JabatanModel();
        $this->mJenisKelamin        = new KelaminModel();
        $this->mArea                = new AreaModel();
        $this->mStatus              = new StatusModel();
        $this->mRole                = new RoleModel();
        $this->mAgama               = new AgamaModel();
        
    }

    public function index()
    {
        // $guru = $this->mGuru->get();
        $excelKaryawan     = $this->mExcelKaryawan->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Import Karyawan',
            'excelKaryawan'     => $excelKaryawan,
        ];
        // View
        return view($this->views . "/index", $data);
        // echo "hood";
        // dd(session()->all());
    }

    public function create()
    {
        $jenis_kelamin  = $this->mJenisKelamin->get();
        $jabatan        = $this->mJabatan->get();
        $area           = $this->mArea->get();
        $status         = $this->mStatus->get();
        $role           = $this->mRole->get();
        $agama          = $this->mAgama->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Import Excel Karyawan',
            'jenis_kelamin'     => $jenis_kelamin,
            'jabatan'           => $jabatan,
            'area'              => $area,
            'status'            => $status,
            'role'              => $role,
            'agama'             => $agama,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        // validasi
        $validateData = $request->validate([
            'file_excel'                    => 'required|mimes:csv,xls,xlsx'
        ],[
            'file_excel.required'           => 'Pilih file terlebih dahulu',
            'file_excel.mimes'              => 'Format data harus csv, xls atau xlsx',
        ]);

        // Library Import Excel
		$file = $validateData['file_excel'];
        $collection = Excel::toCollection(collect([]), $file); // ke convert collection

        foreach ($collection[0] as $row) {
            // skip header

            $i=0;
            if($i <> 1) {
            
                if ($row[0] == 'id daerah') //buat skip row pertama
                    continue;

                // ambil dari excel
                $idMDaerah          = desc($row[0]);
                $idPPeriode         = desc($row[1]);
                $npsn               = $row[2];
                $nama               = $row[3];
                $alamat             = $row[4];
                $telp               = $row[5];
                $web                = $row[6];
                $email              = $row[7];

                $dataPerpusSekolah = [
                    'idMDaerah'     => $idMDaerah,
                    'idPPeriode'    => $idPPeriode,
                    'nama'          => $nama,
                    'alamat'        => $alamat,
                    'telp'          => $telp,
                    'web'           => $web,
                    'email'         => $email,
                ];
                // echo json_encode($dataSiswa);
                // dd($dataSiswa);
                $perpus_sekolah = $this->mPerpusSekolah->create($dataPerpusSekolah);

                // tambah mutasi
                $dataUser = [
                    'username'          => $npsn,
                    'password'          => Hash::make('katasandi'),
                    'sandi'             => 'katasandi',
                    'role'              => 2,
                    'status'            => 2,
                    'idPSekolah'        => $perpus_sekolah['id'],
                    'idPPeriode'        => $idPPeriode,
                ];
                $this->mUsers->create($dataUser);
            }
            $i++;
        }
        
        $recordImport = [
            'idMDaerah'     => $idMDaerah,
            'idPPeriode'    => $idPPeriode,
            'npsn'          => $npsn,
            'nama'          => $nama,
            'alamat'        => $alamat,
            'telp'          => $telp,
        ];
        $this->mExcelSekolah->create($recordImport);

        // $guru = $this->mGuru->get();
        $excelSekolah     = $this->mExcelSekolah->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Import Sekolah',
            'excelSekolah'  => $excelSekolah,
        ];
        // View
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // 
    }

    public function update(Request $request, $id)
    {
        // 
    }

    public function destroy($id)
    {
        //
    }
}
