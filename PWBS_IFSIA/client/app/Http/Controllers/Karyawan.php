<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Karyawan extends Controller
{
    function __construct()
    {
        $this->client = new \GuzzleHttp\Client();

    }

    // Buat Fungsi index (tampil data kayrawan)
    function index()
    {
        // $this->client = new \GuzzleHttp\Client();
        // echo env("API_URL");

        // untuk get dari data server
        $url = env("API_URL")."view";
        // echo $url;

        // ambil service "get" dari server
        $request = $this->client->get($url);
     
        // menampilkan hasil
        $response = $request->getBody();

        // tampilkan data
        // foreach (json_decode($response)->karyawan as $hasil) {
        //     echo $hasil->nama_karyawan."<br>";
        // }

        $data["result"] = json_decode($response);

        // panggil view "vw_karyawan"

        return view("vw_karyawan",$data);
    }

    // fungsi untuk hapus data karyawan
    function delete($parameter)
    {
        $kode = base64_encode($parameter);
        // url untuk delete dari data server
        $url = env("API_URL")."delete/". $kode;

        // ambil service "delete" dari server
        $request = $this->client->delete($url);

        // menampilkan hasil dari delete server
        $response = $request->getBody();
        
        // kirim hasil service "delete" ke "vw_karyawan"
        echo $response;
    }

    function add()
    {
        // tampilkan view "env_karyawan"
        return view("en_karyawan");
    }

    // buat fungsi untuk simpan data
    function insert(Request $req)
    {
        // untuk post data ke server
        $url = env("API_URL")."insert";

        // ambil service "post" dari server
        $request = $this->client->post($url,[
            "form_params" => [
                "nik_karyawan" => $req->nik_karyawan,
                "nama_karyawan" => $req->nama_karyawan,
                "alamat_karyawan" => $req->alamat_karyawan,
                "telepon_karyawan" => $req->telepon_karyawan,
                "jabatan_karyawan" => $req->jabatan_karyawan,
            ]
        ]);

        // menampilkan hasil dari post server
        $response = $request->getBody();

        // kirim hasil service "post" ke "en_karyawan"
        echo $response;
    }

    // fungsi untuk halaman update data
    function update($parameter)
    {
        // untuk get dari data server (detail)
        $url = env("API_URL")."detail/".$parameter;
        // echo $url;

        // ambil service "get" dari server
        $request = $this->client->get($url);
     
        // menampilkan hasil
        $response = $request->getBody();

        // tampilkan data
        foreach (json_decode($response)->karyawan as $hasil) {
            $data = [
                "kode" => $hasil->kode_karyawan,
                "nama" => $hasil->nama_karyawan,
                "alamat" => $hasil->alamat_karyawan,
                "telepon" => $hasil->telepon_karyawan,
                "jabatan" => $hasil->jabatan_karyawan,
                "kode_lama" => $parameter,
            ];
        }

        // tampilkan view "up_karyawan"
        return view("up_karyawan",$data);
    }

    // buat fungsi untuk edit data karyawan
    function edit($parameter,Request $req)
    {
        // untuk put data ke server
        $url = env("API_URL")."update/".$parameter;

        // ambil service "post" dari server
        $request = $this->client->put($url,[
            "form_params" => [
                "nik_karyawan" => $req->nik_karyawan,
                "nama_karyawan" => $req->nama_karyawan,
                "alamat_karyawan" => $req->alamat_karyawan,
                "telepon_karyawan" => $req->telepon_karyawan,
                "jabatan_karyawan" => $req->jabatan_karyawan,
            ]
        ]);

        // menampilkan hasil dari post server
        $response = $request->getBody();

        // kirim hasil service "put" ke "up_karyawan"
        echo $response;
    }
}
