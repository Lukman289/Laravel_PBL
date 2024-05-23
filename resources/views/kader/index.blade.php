@extends('kader.layouts.template')

@section('content')
<div class="grid md:grid-cols-3 mx-5 mt-5 sm:mb-5 md:mb-5 gap-5">
    @php
        $golongan = ['Bayi', 'Lansia'];
    @endphp
    @for($i = 0; $i < 2; $i++)
        <div class="flex flex-col bg-white rounded-2xl pr-6 pl-7 gap-9">
            <div class="flex w-full justify-between pt-5">
                <p class="font-medium text-sm lg:text-base">Jumlah {{ $data['golongan_all'][$i]->golongan ?? $golongan[$i] }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </div>
            <h1 class="text-5xl font-medium">{{ $data['golongan_all'][$i]->total ?? 0}}</h1>
            <p class="text-xs text-stone-400 pb-4">Seluruhnya</p>
        </div>
        <div class="flex flex-col bg-white rounded-2xl pr-6 pl-7 gap-9">
            <div class="flex w-full justify-between pt-5">
                <p class="font-medium text-sm lg:text-base">Jumlah {{ $data['golongan_subMonth'][$i]->golongan ?? $golongan[$i] }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </div>
            <h1 class="text-5xl font-medium">{{ $data['golongan_subMonth'][$i]->total ?? 0}}</h1>
            <p class="text-xs text-stone-400 pb-4">Sebulan Terakhir</p>
        </div>
        <div class="flex flex-col bg-white rounded-2xl pr-6 pl-7 gap-9">
            <div class="flex w-full justify-between pt-5">
                <p class="font-medium text-sm lg:text-base">Jumlah {{ $data['status'][$i]->golongan ?? $golongan[$i]}} Sakit</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </div>
            {{-- {{ !empty($data['status'][$i]) ? $data['status'][$i]->total : 0}} --}}
            {{-- this bellow code same above code--}}
            <h1 class="text-5xl font-medium">{{ $data['status'][$i]->total ?? 0}}</h1>
            <p class="text-xs text-stone-400 pb-4">Sebulan Terakhir</p>
        </div>
    @endfor
</div>
<div class="grid grid-cols-3 mx-5 mt-5 mb-10 gap-5">

    {{-- Card Kunjungan Anggota --}}
    <div class="flex flex-col col-span-3 md:col-span-1 w-full bg-white rounded-2xl pr-6 pl-7 md:mb-10 gap-9">
        <div class="flex w-full justify-between pt-5">
            <p class="font-medium text-sm lg:text-base">Kunjungan Anggota</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
            </svg>
        </div>
        <div class="z-10">
            {!! $chart->container() !!}
        </div>
    </div>

    {{-- Card Agenda Posyandu --}}
    <div class="flex flex-col col-span-3 md:col-span-2 w-full bg-white rounded-2xl pr-6 pl-7 pb-9 gap-5 overflow-x-auto">
        <div class="flex w-full justify-between pt-6 align-middle">
            <p class="font-medium md:text-xl">Agenda Posyandu</p>
            <div class="flex gap-4">
                <x-input.search-input name="searchInput" placeholder="Cari nama atau tempat kegiatan"></x-input.search-input>
                <div class="border flex items-center rounded-full py-1 px-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="0A0A0A" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-3.5 h-3.5 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                      </svg>
                </div>
            </div>
        </div>
        <x-table.data-table :dt="$data['kegiatan']" 
                            :headers="['Nama Kegiatan', 'Tanggal Pelaksanan', 'Pukul', 'Tempat Pelaksanaan']">
            @php
                $no = ($data['kegiatan']->currentPage() - 1) * $data['kegiatan']->perPage() + 1;
            @endphp
            @foreach ($data['kegiatan'] as $kd)
                <x-table.table-row>
                    <td class="tableBody">{{$kd->nama}}</td>
                    <td class="tableBody">{{ date('d-M-Y', strtotime($kd->tgl_kegiatan))}}</td>
                    <td class="tableBody">{{ date('H:i', strtotime($kd->jam_mulai)) }} - Selesai</td>
                    <td class="tableBody">{{$kd->tempat}}</td>
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
<script>
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
    </script>
    <script src="{{ $chart->cdn() }}"></script>
    {{$chart->script() }}
@endpush