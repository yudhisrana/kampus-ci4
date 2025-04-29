<?php

namespace App\Controllers;
//load Models
use App\Models\M_Admin;

class Admin extends BaseController
{
    public function login()
    {
        return view('Backend/Login/login');
    }

    public function dashboard()
    {
        if (session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan loginterlebih dahulu');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $data['name'] = session()->get('ses_user');

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar');
        echo view('Backend/Login/dashboard_admin');
        echo view('Backend/Template/footer');
    }

    public function autentikasi()
    {
        $modelAdmin = new M_Admin; //inisiasi model baru
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cekUsername = $modelAdmin->getDataAdmin(['username_admin' => $username, 'is_delete_admin' => '0'])->getNumRows();
        if ($cekUsername == 0) {
            session()->setFlashdata('Error', 'Username Tidak Ditemukan');
            return redirect()->back();
        } else {
            $dataUser = $modelAdmin->getDataAdmin(['username_admin' => $username, 'is_delete_admin' => '0'])->getRowArray();
            $passwordUser = $dataUser['password_admin'];

            $verifikasiPassword = password_verify($password, $passwordUser);
            if (!$verifikasiPassword) {
                session()->setFlashdata('Error', 'Password Tidak Sesuai');
                return redirect()->back();
            } else {
                $dataSession = [
                    'ses_id' => $dataUser['id_admin'],
                    'ses_user' => $dataUser['nama_admin'],
                    'ses_level' => $dataUser['akses_level']
                ];
                session()->set($dataSession);
                session()->setFlashdata('success', 'Berhasil');
                return redirect()->to(base_url('admin/dashboard-admin'));
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Berhasil Logout');
        return redirect()->to(base_url('admin/login-admin'));
    }

    public function input_data_admin()
    {
        if (session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan loginterlebih dahulu');
            return redirect()->to(base_url('admin/login-admin'));
        }

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar');
        echo view('Backend/MasterAdmin/input-admin');
        echo view('Backend/Template/footer');
    }

    public function simpan_data_admin()
    {
        if (session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan loginterlebih dahulu');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $modelAdmin = new M_Admin();

        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $level = $this->request->getPost('level');

        $cekUsername = $modelAdmin->getDataAdmin(['username_admin' => $username, 'is_delete_admin' => '0'])->getNumRows();
        if ($cekUsername > 0) {
            session()->setFlashdata('error', 'Username Sudah Digunakan!!');
            return redirect()->back();
        } else {
            $hasil = $modelAdmin->autoNumber()->getRowArray();
            if (!$hasil) {
                $id = 'ADM001';
            } else {
                $kode = $hasil['id_admin'];
                $noUrut = (int) substr($kode, -3);
                $noUrut++;
                $id = 'ADM' . sprintf("%03s", $noUrut);
            }

            $dataSimpan = [
                'id_admin' => $id,
                'nama_admin' => $nama,
                'username_admin' => $username,
                'password_admin' => password_hash('pass_admin', PASSWORD_DEFAULT),
                'akses_level' => $level,
                'is_delete_admin' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $modelAdmin->saveDataAdmin($dataSimpan);
            session()->setFlashdata('success', 'Data Admin Berhasil Ditambahkan!!');
            return redirect()->to(base_url('admin/master-data-admin'));
        }
    }

    public function master_data_admin()
    {
        if (session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan loginterlebih dahulu');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $modelAdmin = new M_Admin();

        $uri = service('uri');
        $pages = $uri->getSegment(2);
        $dataUser = $modelAdmin->getDataAdmin(['is_delete_admin' => '0', 'akses_level !=' => '1'])->getResultArray();

        $data['pages'] = $pages;
        $data['data_user'] = $dataUser;
        $data['name'] = session()->get('ses_user');

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterAdmin/master-data-admin', $data);
        echo view('Backend/Template/footer', $data);
    }
}
