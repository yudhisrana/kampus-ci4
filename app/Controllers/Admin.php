<?php

namespace App\Controllers;

use App\Models\M_Admin;

class Admin extends BaseController
{
    public function login()
    {
        return view('Backend/Login/login');
    }

    public function dashboard()
    {
        if (!session()->get('ses_id') || !session()->get('ses_user') || !session()->get('ses_level')) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu');
            return redirect()->to(base_url('admin/login-admin'));
        }

        echo view('Backend/Template/header');
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
            session()->setFlashdata('Error', 'Username Tidak Ditemuka');
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
        session()->setFlashdata('success', 'Logout berhasil');
        return redirect()->to(base_url('admin/login-admin'));
    }
}
