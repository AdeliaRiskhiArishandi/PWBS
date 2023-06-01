@extends('main_tamplate')

@section('title_tamplate')
    <title>Ubah Data Karyawan</title>
@endsection

@section('body_tamplate')

    <body class="m-5">
        {{-- section utama --}}
        <section class="flex flex-col">
            {{-- section untuk baris pertama --}}
            <section class="flex w-full mb-4">
                {{-- section untuk nik --}}
                <section class="flex-auto w-1/2 mr-4">
                    <section>
                        <label for="txt_nik" id="lbl_nik">Nik</label>
                    </section>
                    <section>
                        <input type="text" name="txt_nik" id="txt_nik" maxlength="10"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_nik" class="text-rose-500 ">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Nik Harus Diisi.</label>
                    </section>
                </section>

                {{-- section untuk nama --}}
                <section class="flex-auto w-1/2 ">
                    <section>
                        <label for="txt_nama" id="lbl_nama">Nama</label>
                    </section>
                    <section>
                        <input type="text" name="txt_nama" id="txt_nama" maxlength="50"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_nama" class="text-rose-500">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Nama Harus Diisi.</label>
                    </section>
                </section>
            </section>

            {{-- section untuk baris kedua --}}
            <section class="flex w-full mb-4">
                {{-- section untuk nik --}}
                <section class="flex-auto w-1/2 mr-4">
                    <section>
                        <label for="txt_alamat" id="lbl_alamat">alamat</label>
                    </section>
                    <section>
                        <input type="text" name="txt_alamt" id="txt_alamat" maxlength="100"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_alamat" class="text-rose-500">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Alamat Harus Diisi.</label>
                    </section>
                </section>

                {{-- section untuk nama --}}
                <section class="flex-auto w-1/2 ">
                    <section>
                        <label for="txt_telepon" id="lbl_telepon">Telepon</label>
                    </section>
                    <section>
                        <input type="text" name="txt_telepon" id="txt_telepon" maxlength="13"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_telepon" class="text-rose-500">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Telepon Harus Diisi.</label>
                    </section>
                </section>
            </section>

            {{-- section untuk baris ketiga --}}
            <section class="flex w-full mb-4">
                {{-- section untuk Jabatan --}}
                <section class="flex-auto w-1/2 mr-4">
                    <section>
                        <label for="txt_jabatan" id="lbl_jabatan">Jabatan</label>
                    </section>
                    <section>
                        <input type="text" name="txt_jabatan" id="txt_jabatan" maxlength="50"
                            class="w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-sky-200 rounded">
                    </section>
                    <section>
                        <label for="" id="err_jabatan" class="text-rose-500">
                            <i class="fa-solid fa-circle-exclamation mr-2.5"></i> Jabatan Harus Diisi!</label>
                    </section>
                </section>

                {{-- section untuk kosong --}}
                <section class="flex-auto w-1/2">

                </section>
            </section>

            {{-- Area Tombol --}}
            <section class="flex w-full mb-4">
                {{-- section untuk Jabatan --}}
                <section class="flex-auto w-full">
                    <button id="btn_ubah" class="bg-teal-600 h-12 w-28 rounded-full text-white uppercase font-bold" onclick="edit()">
                        Ubah
                    </button>
                    <button id="btn_batal" class="bg-stone-200 h-12 w-28 rounded-full text-teal-600 uppercase font-bold">
                        Batal
                    </button>
                </section>
            </section>
        </section>

        {{-- Custom JS --}}
        <script>
            // hilangkan pesan error
            document.querySelector("#err_nik").style.display = 'none'
            document.querySelector("#err_nama").style.display = 'none'
            document.querySelector("#err_telepon").style.display = 'none'
            document.querySelector("#err_alamat").style.display = 'none'
            document.querySelector("#err_jabatan").style.display = 'none'

            // tampilkan data
            let kode_lama = "{{$kode_lama}}"
            document.querySelector('#txt_nik').value = "{{$kode}}"
            document.querySelector('#txt_nama').value = "{{$nama}}"
            document.querySelector('#txt_alamat').value = "{{$alamat}}"
            document.querySelector('#txt_telepon').value = "{{$telepon}}"
            document.querySelector('#txt_jabatan').value = "{{$jabatan}}"
            
            // document.querySelector("#txt_nik").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded"
        
            // fungsi "btn_batal"
            document.querySelector("#btn_batal").addEventListener("click", function () { 
                location.href="{{ url('/update') }}/" +btoa(document.querySelector("#txt_nik").value) 
            })

            // fungsi "btn_ubah"
            const edit = () => {
                // jika "txt_nik" Tidak diisi
                // if(document.querySelector("#txt_nik").value === "") //untuk menampung nilai TXT menggunakan "value"
                // {
                //     // tampilkan error nik
                //     document.querySelector("#err_nik").style.display = 'unset'

                //     document.querySelector("#txt_nik").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded"
                // }
                // // jika "txt_nik" diisi
                // else
                // {
                //     alert("nik Tidak Kosong")
                // }

                // Ternary Computer
                const nik = document.querySelector("#txt_nik").value === "" ? 
                // hasil jika kondisi benar
                [
                    // tampilkan error nik
                    document.querySelector("#err_nik").style.display = 'unset',
                    // Ubah class "txt_nik"
                    document.querySelector("#txt_nik").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_nik = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_nik
                    document.querySelector("#err_nik").style.display = 'none',

                    document.querySelector("#txt_nik").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_nik = 0
                ]

                const nama = document.querySelector("#txt_nama").value === "" ? 
                // hasil jika kondisi benar
                [
                    // tampilkan error nama
                    document.querySelector("#err_nama").style.display = 'unset',
                    // Ubah class "txt_nama"
                    document.querySelector("#txt_nama").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_nama = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_nama
                    document.querySelector("#err_nama").style.display = 'none',

                    document.querySelector("#txt_nama").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_nama = 0
                ]

                const alamat = document.querySelector("#txt_alamat").value === "" ? 
                // hasil jika kondisi benar
                [
                    // tampilkan error alamat
                    document.querySelector("#err_alamat").style.display = 'unset',
                    // Ubah class "txt_alamat"
                    document.querySelector("#txt_alamat").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_alamat = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_alamat
                    document.querySelector("#err_alamat").style.display = 'none',

                    document.querySelector("#txt_alamat").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_alamat = 0
                ]

                const telepon = document.querySelector("#txt_telepon").value === "" ? 
                // hasil jika kondisi benar
                [
                    // tampilkan error telepon
                    document.querySelector("#err_telepon").style.display = 'unset',
                    // Ubah class "txt_telepon"
                    document.querySelector("#txt_telepon").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_telepon = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_telepon
                    document.querySelector("#err_telepon").style.display = 'none',

                    document.querySelector("#txt_telepon").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_telepon = 0
                ]

                const jabatan = document.querySelector("#txt_jabatan").value === "" ? 
                // hasil jika kondisi benar
                [
                    // tampilkan error jabatan
                    document.querySelector("#err_jabatan").style.display = 'unset',
                    // Ubah class "txt_jabatan"
                    document.querySelector("#txt_jabatan").className = "w-full border-2 border-transparent border-b-rose-500 focus:outline-none rounded",
                    // set error = 0
                    err_jabatan = 1
                ]
                :
                // Hasil Jika salah
                [
                    // Sembunyikan err_jabatan
                    document.querySelector("#err_jabatan").style.display = 'none',

                    document.querySelector("#txt_jabatan").className = "w-full border-2 border-transparent border-b-sky-500 focus:outline-none focus:ring focus:border-rose-600 rounded",
                    // set error = 0
                    err_jabatan = 0
                ]

                // if(err_nik === 0 && err_nama === 0  && err_alamat === 0 && err_telepon === 0 && err_jabatan === 0)   
                // {
                //     alert("Simpan")
                // }
                // else
                // {
                //     alert("Gagal")
                // }

                // jika seluruh komponen sudah diisi
                const check = (nik[2] === 0 && nama[2] === 0 && alamat[2] === 0 && telepon[2] === 0 && jabatan[2] === 0) ?
                // proses ubah data (panggil fungsi editData)
                    editData(document.querySelector("#txt_nik").value, document.querySelector("#txt_nama").value, 
                    document.querySelector("#txt_alamat").value, document.querySelector("#txt_telepon").value,
                    document.querySelector("#txt_jabatan").value)
                : 
                ""
            }

            // buat fungsi ubah data (Metode async/await)
            const editData = async(nik, nama, alamat, telepon,jabatan) => {
                // Collecting data
                let data = {
                    "nik_karyawan" : nik,
                    "nama_karyawan" : nama,
                    "alamat_karyawan" : alamat,
                    "telepon_karyawan" : telepon,
                    "jabatan_karyawan" : jabatan,
                    // "nik_karyawan" : "01210",
                    // "nama_karyawan" : "Andi",
                    // "alamat_karyawan" : "jalan",
                    // "telepon_karyawan" : "08929897947",
                    // "jabatan_karyawan" : "IT",
                }
                // proses kirim data
                try {
                    // kirim data ke controller
                    // await fetch(url,atribut)
                    let response = await fetch("{{url('/edit')}}/"+kode_lama, {
                        method: "PUT",
                        headers: {
                            'Content-type':'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="_token"]').content
                        },
                        body:JSON.stringify(data)
                    })
                    // baca hasil dari controller
                    let result = await response.json()
                    alert(result.pesan)
                    // refresh data (panggil method refresh/batal)
                    document.querySelector("#btn_batal").click()

                } catch (error) {
                    alert("Data Gagal Dikirim !")
                }
            }
        </script>
    </body>
@endsection
