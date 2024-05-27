<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>
@extends('admin.layouts.template')

@section('content')
    <div class="flex flex-col bg-white mx-5 my-5 shadow-[0_-4px_0_0_rgba(29,78,216,1)] rounded-md">
        <div class="flex justify-between items-center w-full py-2 border-b">
            <p class="text-sm md:text-lg ml-5 md:ml-10">Tampilan Alternatif Dari SPK</p>
        </div>
            @if(session('success'))
                <div class="flex items-center p-1 mb-1 border-2 border-green-500 bg-green-100 text-green-700 rounded-md" id="message">
                    <p class="mr-4"> <b>BERHASIL</b> {{ session('success') }}</p>
                    <button id="close" class="ml-auto bg-transparent text-green-700 hover:text-green-900">
                        <span>&times;</span>
                    </button>
                </div>
            @elseif(session('error'))
                <div class="flex items-center p-4 mb-4 border-2 border-red-500 bg-red-100 text-red-700 rounded-md" id="message">
                    <p class="mr-4">{{ session('error') }}</p>
                    <button id="close" class="ml-auto bg-transparent text-red-700 hover:text-red-900">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
        <form action="{{route('bantuan.saw')}}" method="post">
            @csrf
            <div class="mx-10 my-[30px]">
                <x-table.data-table :dt="$alternatifs"
                                    :headers="['Nama Balita', 'Berat Badan', 'Tinggi Badan', 'Lingkar Kepala', 'Lingkar Lengan', 'Total Pendapatan', 'Aksi']">
                    @foreach ($bayisData as $alt)
                        <x-table.table-row>
                            <td class="tableBody">
                                <input type="checkbox" name="penduduk_id[]" id="" value="{{$alt->penduduk_id}}">    
                                {{$alt->penduduk->nama}}
                            </td>
                            <td class="tableBody">{{$alt->berat_badan}}</td>
                            <td class="tableBody">{{$alt->tinggi_badan}}</td>
                            <td class="tableBody">{{$alt->pemeriksaan_bayi->lingkar_kepala}}</td>
                            <td class="tableBody">{{$alt->pemeriksaan_bayi->lingkar_lengan}}</td>
                            <td class="tableBody">Rp.300.000</td>
                            <td class="tableBody">
                                <a href="bantuan/{{$alt->kode}}" class="bg-blue-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-blue-600 hover:text-white">Detail</a>
                        </x-table.table-row>
                    @endforeach
                </x-table.data-table>
            </div>
            <div class="flex justify-end items-center w-full py-5 px-3 border-b">
                <a href="{{ url('admin/bantuan') }}" class="bg-gray-300 text-sm text-neutral-950 font-bold py-2 px-4 mr-5 md:mr-10 rounded">Kembali</a>
                <button type="submit" class="bg-blue-700 text-sm text-white font-bold py-2 px-4 mr-5 md:mr-10 rounded">Selanjutnya</button>
            </div>
        </form>
    </div>
@endsection

@push('js')
<script>
    function clearTable() {
        const table = document.getElementById('dataTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
        }
    }

    function addRowToTable(item) {
        const table = document.getElementById('dataTable');
        const row = table.insertRow(-1);

        row.innerHTML = `
        <x-table.table-row>
                    <td class="px-6 border-b lg:py-2 bg-white">${item.nama}</td>
                    <td class="tableBody">${item.NIK}</td>
                    <td class="tableBody">${item.NKK}</td>
                    <td class="px-6 lg:py-2 text-nowrap border-b bg-white">${item.tgl_lahir}</td>
                    <td class="tableBody">${item.jenis_kelamin}</td>
                    <td class="tableBody">${item.hubungan_keluarga}</td>
                    <td class="tableBody">
                        <form action="penduduk/${item.penduduk_id}" method="post" class="flex items-center gap-2">
                            <a href="penduduk/${item.penduduk_id}" class="bg-blue-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-blue-600 hover:text-white">Detail</a>
                            <a href="penduduk/${item.penduduk_id}/edit" class="bg-yellow-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-yellow-300">Ubah</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="confirm('Apakah anda yakin ingin menghapus data?')" class="bg-red-400 text-[12px] text-neutral-950 py-[6px] px-2 rounded-sm hover:bg-red-600 hover:text-white">Hapus</button>
                        </form>
                    </td>
        </x-table.table-row>
    `;
    }

    async function searchFunction() {
        let input;
        input = document.getElementById('searchInput');
        search = input.value;

        try {
            // Make a request to the server
            const response = await fetch(`/api/penduduk/search?search=${search}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            });

            const responseData = await response.json();

            clearTable();

            responseData[0].data.forEach(item => {
                addRowToTable(item);
            });


        } catch (error) {
            console.log(error);
            const table = document.getElementById('dataTable');

            clearTable();

            const row = table.insertRow(-1);
            row.innerHTML = `
                <td colspan="7" class="text-center p-6 bg-white border-b font-medium text-Neutral/60">Data tidak ditemukan</td>
                `;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        let div = document.getElementById('message');
        let button = document.getElementById('close');

        if (div && button) {
            button.addEventListener('click', function() {
                div.classList.add('hidden');
            });
        }
    });
</script>
@endpush