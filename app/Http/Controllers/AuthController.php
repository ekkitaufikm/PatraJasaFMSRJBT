<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\UserModel;
use App\Models\JabatanModel;

class AuthController extends Controller
{   
    private $views      = 'auth';
    private $url        = 'login';
    private $title      = 'Login | PT.Patra Jasa Facility Management Services';

    public function __construct()
    {
        $this->mUser     = new UserModel();
        $this->mJabatan          = new JabatanModel();
    
    }

    //LOGIN
    public function login(){
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
        ];
        // View
        return view($this->views . "/index", $data);
    }

    //proses
    public function loginProses(Request $request)
    {
        // Validate
        $credentials = $request->validate([
            'nip'       => 'required',
            'password'  => 'required',
        ]);

        // dd('berhasil login!');
        // Get Data
        $users = $this->mUser->where('nip', $request->nip)->first();
        
        // Check User
        if ($users == null) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Ditemukan');
        }

        // Check User Password
        if (Hash::check($request->password, $users->password) == false) {
            return redirect()->back()->with('gagal', 'Kata Sandi Salah');
        }
        // Table user and Update Last Login
        $dataUser = [
            'last_login' => date('Y-m-d H:i:s'),
        ];
        $this->mUser->where('idUsers', $users->idUsers)->update($dataUser);
        $jabatan = $this->mJabatan->get();
        // echo json_encode($users); die;
        // Create Session

        if($users->role == 1){
            $session = [
                'idUsers'   => $users->idUsers,
                'nama'      => $users->nama,
                'jabatan'   => $users->jabatan->nama,
                'role'      => $users->role,
                'isLogin'   => true,
                'idArea'    => $users->idArea,
            ];

            session($session);
            return redirect('admin/dashboard')->with('sukses', 'Berhasil Login');
        }
        else if($users->role == 2){
            $session = [
                'idUsers'       => $users->idUsers,
                'nama'          => $users->nama,
                'role'          => $users->role,
                'jabatan'       => $users->jabatan->nama,
                'isLogin'       => true,
                'idArea'        => $users->idArea,
            ];

            session($session);
            return redirect('supervisor/profil')->with('sukses', 'Berhasil Login');
        }
        // Response
    }

    // //REGISTER
    // public function register(){
    //     return view('auth/register');
    // }

    // //proses
    // public function registerProses(Request $request){
    //     $request->validate([
    //         'username'  => 'required|unique:user,username|min:6|max:50',
    //         'password'  => 'required|min:6',
    //         'email'     => 'required|unique:profile,email',
    //         'phone'     => 'required|unique:profile,phone',
    //     ]);
    //     if (substr($request->phone, 0, 2) != '62') {
    //         echo "Harus diawali dengan 62";
    //         return redirect()->back()->with('error', 'Maaf! Nomor Handphone Harus Diawali dengan 62')->withInput();
    //     }
    //     if (strlen($request->phone) < 10) {
    //         return redirect()->back()->with('error', 'Maaf! Nomor Handphone Kurang dari 10 Karakter')->withInput();
    //     }
    //     if (strlen($request->phone) > 13) {
    //         return redirect()->back()->with('error', 'Maaf! Nomor Handphone Lebih dari 13 Karakter')->withInput();
    //     }
    //     // Table user
    //     $dataUser = [
    //         'username'      => $request->username,
    //         'password'      => Hash::make($request->password),
    //         'sandi'         => $request->password,
    //         'idURole'       => 3,
    //         'role'          => 3,
    //         'status'        => 0,
    //     ];
    //     // $dataUser = [
    //     //     'username'      => 'syuper',
    //     //     'password'      => Hash::make('doppelganger29'),
    //     //     'sandi'         => 'doppelganger29',
    //     //     'nama'          => 'Syaifur',
    //     //     'namaLengkap'   => 'Syaifur Rohman',
    //     //     'role'          => 1,
    //     //     'status'        => 2,
    //     // ];
    //     $users = $this->mUser->create($dataUser);
    //     return redirect('/login')->with('success', 'Berhasil Daftar, Silahkan Menunggu Admin untuk Mengkonfirmasi');
    // }

    public function registerPaksa(){
        $dataAdmin = [
            'nip'           => '12345',
            'nama'          => 'Admin Pro',
            'password'      => Hash::make('katasandi'),
            'sandi'         => 'katasandi',
            'role'          => 1,
        ];
        $users = $this->mUser->create($dataAdmin);

        // $dataSekolah = [
        //     'username'      => 'sekolah',
        //     'password'      => Hash::make('ayosekolah'),
        //     'sandi'         => 'ayosekolah',
        //     'status'        => 1,
        //     'idSekolah'     => 1,
        //     'role'          => 2,
        // ];
        // $users = $this->mUser->create($dataSekolah);
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}