@extends('kader.layouts.template')

@section('content')
<div class="flex flex-col bg-white mx-5 mt-5 shadow-[0_-4px_0_0_rgba(248,113,113,1)] rounded-md">
    <div class="flex justify-between items-center w-full py-2 border-b">
        <p class="text-lg ml-10">Daftar Kegiatan</p>
    </div>
    <div class="flex mt-[30px] mx-10 gap-[30px]">
        <div class="flex w-fit h-full items-center align-middle">
            <x-input.search-input name="search" placeholder="Cari nama atau tempat kegiatan">Search</x-input.search-input>
        </div>
        <div class="flex w-full h-full items-center align-middle">
        </div>
    </div>
    <div class="flex w-full justify-center items-center my-4" id="message">
        @if(session('success'))
            <div class="flex w-3/4 h-full items-center p-2 mb-1 border-2 border-green-500 bg-green-100 text-green-700 rounded-md" id="message">
                <p class="mr-4"> <b>BERHASIL </b> {{ session('success') }}</p>
                <button id="close" class="ml-auto bg-transparent text-green-700 hover:text-green-900">
                    <span>&times;</span>
                </button>
            </div>
        @elseif(session('error'))
            <div class="flex w-3/4 h-full items-center p-4 mb-4 border-2 border-red-500 bg-red-100 text-red-700 rounded-md" id="message">
                <p class="mr-4">{{ session('error') }}</p>
                <button id="close" class="ml-auto bg-transparent text-red-700 hover:text-red-900">
                    <span>&times;</span>
                </button>
            </div>
        @endif
    </div>

    <input type="hidden" name="model" id="model" value="{{encrypt('App\Models\Kegiatan')}}">
    <input type="hidden" name="url" id="url" value="{{encrypt('/kader/informasi/kegiatan/')}}">
    <input type="hidden" name="filterName" id="filterName" value="{{encrypt('kegiatan_id')}}">

    <div class="mx-10 my-[30px] overflow-x-auto lg:overflow-hidden">
        <x-table.data-table :dt="$kegiatans"
                            :headers="['Nama Kegiatan', 'Tanggal Pelaksanan', 'Pukul', 'Tempat Pelaksanaan', 'Aksi']">
            @php
                $no = ($kegiatans->currentPage() - 1) * $kegiatans->perPage() + 1;
            @endphp
            @foreach ($kegiatans as $kd)
            <x-table.table-row>
                <td class="tableBody">{{$kd->nama}}</td>
                <td class="tableBody">{{ date('d-M-Y', strtotime($kd->tgl_kegiatan))}}</td>
                <td class="tableBody">{{ date('H:i', strtotime($kd->jam_mulai)) }} - Selesai</td>
                <td class="tableBody">{{$kd->tempat}}</td>
                <td class="tableBody">
                    {{-- <form action="kegiatan/{{$kd->kegiatan_id}}" method="post" class="flex items-center gap-2">
                        @php
                            $queryString = http_build_query(request()->query());
                            session(['urlPagination' => $queryString ? '?' . $queryString : '']);
                        @endphp
                        <a href="kegiatan/{{$kd->kegiatan_id}}/edit" class="bg-yellow-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-yellow-300">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="updated_at" value="{{ $kd->updated_at }}">
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="bg-red-400 text-[12px] text-neutral-950 py-[6px] px-2 rounded-sm hover:bg-red-600 hover:text-white">Hapus</button>
                    </form> --}}

                    <form id="delete-form-{{$kd->kegiatan_id}}" action="kegiatan/{{$kd->kegiatan_id}}" method="post" class="flex items-center gap-2">
                        @php
                            $queryString = http_build_query(request()->query());
                            session(['urlPagination' => $queryString ? '?' . $queryString : '']);
                        @endphp
                        <a href="kegiatan/{{$kd->kegiatan_id}}/edit" class="bg-yellow-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-yellow-300">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="updated_at" value="{{ $kd->updated_at }}">
                        <button type="button" data-id="{{$kd->kegiatan_id}}" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="delete-btn bg-red-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-red-600 hover:text-white">Hapus</button>
                    </form>
                    
                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden top-0 left-0 fixed z-50 justify-center items-center w-full md:inset-0 h-screen">
                        <div class="relative p-4 w-full h-screen flex justify-center items-center backdrop-blur-sm">
                            <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin ingin menghapus data ini?</h3>
                                    <button id="confirm-delete" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Ya
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </x-table.table-row>
            @php
                $no++;
            @endphp
            @endforeach
        </x-table.data-table>
    </div>
</div>
@endsection

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
            document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            let deleteFormId;
    
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    deleteFormId = this.getAttribute('data-id');
                });
            });
    
            document.getElementById('confirm-delete').addEventListener('click', function() {
                document.getElementById('delete-form-' + deleteFormId).submit();
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');
        const modals = document.querySelectorAll('.fixed');

        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const modalId = toggle.getAttribute('data-modal-target');
                const modal = document.getElementById(modalId);
                if (modal.classList.contains('hidden')) {
                    modal.classList.remove('hidden');
                } else {
                    modal.classList.add('hidden');
                }
            });
        });

        const modalHides = document.querySelectorAll('[data-modal-hide]');
        modalHides.forEach(hide => {
            hide.addEventListener('click', function () {
                const modalId = hide.getAttribute('data-modal-hide');
                const modal = document.getElementById(modalId);
                if (!modal.classList.contains('hidden')) {
                    modal.classList.add('hidden');
                }
            });
        });
    });

    $(document).ready(function (){
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 3000);
    })

    function formatDate(dateString) {
        const date = new Date(dateString);

        const day = date.getDate().toString().padStart(2, '0'); // Pad single digit days with a leading zero
        const month = date.toLocaleString('en-US', { month: 'short' }); // Get short month name
        const year = date.getFullYear();

        return `${day}-${month}-${year}`;
    }

    function formatTime(timeString) {
        const [hour, minute, second] = timeString.split(':');

        const formattedHour = hour.padStart(2, '0');
        const formattedMinute = minute.padStart(2, '0');

        return `${formattedHour}:${formattedMinute}`;
    }

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
                        <td class="tableBody">${item.nama}</td>
                        <td class="tableBody">${formatDate(item.tgl_kegiatan)}</td>
                        <td class="tableBody">${formatTime(item.jam_mulai)} - Selesai</td>
                        <td class="tableBody">${item.tempat}</td>
                        <td class="tableBody">
                            <form action="informasi/${item.kegiatan_id}" method="post" class="flex items-center gap-2">
                                <a href="informasi/${item.kegiatan_id}" class="bg-blue-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-blue-600">Detail</a>
                                <a href="informasi/${item.kegiatan_id}/edit" class="bg-yellow-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-blue-600">Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="bg-red-400 text-[12px] text-neutral-950 py-[5px] px-2 rounded-sm hover:bg-blue-600">Hapus</button>
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
                const response = await fetch(`/api/informasi/search?search=${search}`, {
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
                console.error('Fetch error:', error);
                // console.log(error);
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
