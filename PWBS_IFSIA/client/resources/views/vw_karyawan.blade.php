@extends('main_tamplate')

@section('title_tamplate')
    <title>Tampil Data Karyawan</title>
@endsection

@section('body_tamplate')

    <body class="m-5">
        {{-- buat navigasi --}}
        <nav class="text-center mb-5">
            <button id="btn_tambah" class="bg-teal-600 h-12 w-28 rounded-full text-white uppercase font-bold"
                onclick="gotoAdd()">Tambah</button>
            <button id="btn_refresh"
                class="bg-stone-200 h-12 w-28 rounded-full text-teal-600 uppercase font-bold">Refresh</button>
        </nav>
        {{-- buat table --}}
        <table class="w-full">
            {{-- judul table --}}
            <thead>
                <tr class="h-12">
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-1/12">Aksi</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-1/12">NIK</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-2/12">Nama Karyawan</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-3/12">Alamat </th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-1/12">Telepon</th>
                    <th class="border-solid text-white border-2 border-teal-600 bg-teal-500 w-2/12">Jabatan</th>
                </tr>
            </thead>

            {{-- isi table --}}
            <tbody>
                @foreach ($result->karyawan as $output)
                    <tr>
                        <td class="border-solid border-2 border-teal-600 bg-transparent text-center px-2.5">
                            <button id="btn_ubah" class="bg-sky-600 text-white w-10 h-8 rounded-lg"
                                onclick="gotoUpdate('{{ base64_encode($output->kode_karyawan) }}')"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button id="btn_hapus" class="bg-red-600 text-white w-10 h-8 rounded-lg"
                                onclick="gotoDelete('{{ $output->kode_karyawan }}')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent text-center px-2.5">
                            {{ $output->kode_karyawan }}</td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent px-2.5">{{ $output->nama_karyawan }}
                        </td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent px-2.5">
                            {{ $output->alamat_karyawan }}</td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent text-center px-2.5">
                            {{ $output->telepon_karyawan }}</td>
                        <td class="border-solid border-2 border-teal-600 bg-transparent px-2.5">
                            {{ $output->jabatan_karyawan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- @foreach ($result->karyawan as $output)
        <p>{{ $output->nama_karyawan }}</p>
    @endforeach --}}

        {{-- Custom JS --}}
        <script>
            // Buat Fungsi Untuk Link Tambah Data
            function gotoAdd() {
                location.href = '{{ url('/add') }}';
            }

            // Buat Fungsi Untuk Btn Refresh
            document.getElementById("btn_refresh").addEventListener('click', function() {
                location.href = '{{ url('') }}'
            })

            // fungsi untuk link ke halaman ubah data
            function gotoUpdate(kode) {
                location.href = '{{ url('/update') }}/' + kode;
            }

            // fungsi untuk link hapus data
            function gotoDelete(kode) {
                if (confirm("NIK : " + kode + " Ingin Dihapus ?") === true) {
                    // panggil fungsi "deleteData"
                    deleteData(kode)
                }
                // else {
                //     alert("Tombol Cencel")
                // }
            }

            function deleteData(kode) {
                const url = '{{ url('/delete') }}/' + kode;

                // let data = {
                //     kode: kode
                // }

                // proses async (fetch)
                fetch(url, {
                        method: "DELETE",
                        headers: {
                            'X-CSRF-Token': document.querySelector('meta[name="_token"]').content
                        }
                        // body: JSON.stringify(data)
                    })
                    // .then((response) => response.json())
                    // .then(alert("Data Gagal Dikirim !"))

                    // ini untuk membaca respon dari fetch
                    .then((respons) => respons.json())

                    // yang ini untuk menampilkan hasil dari then sebelumnya
                    .then((result) => {
                        alert(result.pesan)
                        document.querySelector("#btn_refresh").click()
                    }) // kurung kurawal {} menandakan adanya lebih dari satu proses

                    // jika terjadi error dari pada saat fetch data
                    .catch((error) => alert("Data gagal dikirim"))
            }
        </script>


    </body>
@endsection

{{-- note 

    syncronus
    metodenya pararel dikerjakan berunut dari a hingga z
    
    asyncronus
    metodenya seri dekerjakan bersamaan 
        fetch merupakan salah satu proses asyncronus 
    
--}}
