@extends('kader.layouts.template')

@section('content')
    <form action="{{url('kader/bayi')}}" method="post">
        @csrf
        <div class="flex flex-col bg-white mx-5 my-5 shadow-[0_-4px_0_0_rgba(248,113,113,1)] rounded-md">
            <div class="flex justify-between items-center w-full py-2 border-b">
                <p class="text-lg mx-10">Form Pemeriksaan Bayi</p>
            </div>

            <div class="grid grid-cols-2 my-[30px] mx-10 gap-x-[101px]">
                <div class="col-span-1 flex flex-col gap-[23px]">
                    <div class="flex flex-col w-full h-fill gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950">Nama Bayi<span class="text-red-400">*</span></p>
                        <select name="nama" id="nama" class="w-100 border text-gray-300 border-stone-400 text-sm font-normal pl-[10px] py-[10px] rounded-[5px] focus:outline-none">
                            <option value="" class="">Masukkan nama balita</option>
                            @foreach($bayisData as $bayi)
                                <option value="{{ $bayi->NIK }}">{{ $bayi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                        <p class="text-base text-neutral-950">Bulan Penimbangan<span class="text-red-400">*</span></p>
                        <div class="grid grid-cols-3 gap-5">
                            <select name="date" id="date" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] px-[31px] py-[10px] rounded-[5px] focus:outline-none">
                                <option value="" class="text-gray-300">Tanggal</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}" name="" class="text-neutral-950">{{$i}}</option>
                                @endfor
                            </select>
                            <select name="month" id="month" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] px-[31px] py-[10px] rounded-[5px] focus:outline-none">
                                <option value="">Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" name="" class="text-neutral-950">{{$i}}</option>
                                @endfor
                            </select>
                            <select name="year" id="year" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] px-[31px] py-[10px] rounded-[5px] focus:outline-none">
                                <option value="">Tahun</option>
                                @for ($i = 2000; $i <= 2050; $i++)
                                    <option value="{{ $i }}" name="" class="text-neutral-950">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950">Usia<span class="text-red-400">*</span></p>
                        <input type="text" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan usia balita" value="" disabled>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                        <p class="text-base text-neutral-950">Usia<span class="text-red-400">*</span></p>
                        <input type="text" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan usia balita" disabled>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950">Nama Ibu<span class="text-red-400">*</span></p>
                        <input type="text" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan nama ibu" disabled>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                        <p class="text-base text-neutral-950">Berat Badan<span class="text-red-400">*</span></p>
                        <input type="text" name="berat_badan" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan berat badan">
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950 pr-[10px]">Nama Ayah<span class="text-red-400">*</span></p>
                        <input type="text" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan nama ayah" disabled>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950 pr-[10px]">Alamat<span class="text-red-400">*</span></p>
                        <input type="text" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan alamat" disabled>
                    </div>
                </div>

                <div class="col-span-1 flex flex-col gap-[23px]">
                    <div class="flex flex-col w-full h-fill gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950">Tanggal Kunjungan<span class="text-red-400">*</span></p>
                        <div class="grid grid-cols-3 gap-5">
                            <select name="date" id="date" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] px-[31px] py-[10px] rounded-[5px] focus:outline-none" disabled>
                                <option value="" class="text-gray-300">Tanggal</option>
                                    <option value="" name="" class="text-neutral-950" selected></option>
                            </select>
                            <select name="month" id="month" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] px-[31px] py-[10px] rounded-[5px] focus:outline-none" disabled>
                                <option value="">Bulan</option>
                                    <option value="" name="" class="text-neutral-950" selected></option>

                            </select>
                            <select name="year" id="year" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] px-[31px] py-[10px] rounded-[5px] focus:outline-none" disabled>
                                <option value="">Tahun</option>
                                    <option value="" name="" class="text-neutral-950" selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                        <p class="text-base text-neutral-950 pr-[10px]">Lingkar Lengan<span class="text-red-400">*</span></p>
                        <input type="text" name="lingkar_lengan" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan lingkar lengan">
                    </div>
                    <div class="flex flex-col w-full h-full gap-[20px]" id="page_1">
                        <p class="text-base text-neutral-950 pr-[10px]">Respon Pengunjung<span class="text-red-400">*</span></p>
                        <textarea type="text" name="respon" id="comment" class="text-sm font-normal border border-stone-400 px-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" rows="5" maxlength="200" placeholder="Masukkan respon pengunjung"></textarea>
                        <p class="text-xs font-normal text-stone-400 mt-[-10px]" id="counter">0/200</p>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                        <p class="text-base text-neutral-950 pr-[10px]">Apakah Ada Kenaikan?<span class="text-red-400">*</span></p>
                        <div class="flex gap-10">
                            <input type="radio" class="indeterminate:outline-2 indeterminate:outline-stone-400 indeterminate:w-4 indeterminate:py-[20px] rounded-[5px] checked:w-4 checked:outline-2 checked:bg-red-400 checked:border-transparent -mr-[25px]" name="kenaikan" id="option1"><span>Ya</span>
                            <input type="radio" class="indeterminate:outline-2 indeterminate:outline-stone-400 indeterminate:w-4 indeterminate:py-[20px] checked:w-4 checked:outline-2 -mr-[25px]" name="kenaikan" id="option2"><span>Tidak</span>
                        </div>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                        <p class="text-base text-neutral-950 pr-[10px]">ASI Eksklusif?<span class="text-red-400">*</span></p>
                        <div class="flex gap-10">
                            <input type="radio" class="indeterminate:outline-2 indeterminate:outline-stone-400 indeterminate:w-4 indeterminate:py-[20px] rounded-[5px] checked:w-4 checked:outline-2 checked:bg-red-400 checked:border-transparent -mr-[25px]" name="asi" id="option1"><span>Ya</span>
                            <input type="radio" class="indeterminate:outline-2 indeterminate:outline-stone-400 indeterminate:w-4 indeterminate:py-[20px] checked:w-4 checked:outline-2 -mr-[25px]" name="asi" id="option2"><span>Tidak</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 mx-10 gap-x-[101px] pb-[30px]">
                <div class="col-span-1 flex flex-col w-full h-fill gap-[20px]" id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Data KB<span class="text-red-400">*</span></p>
                    <input name="filter" id="filter" class="w-100 border border-stone-400 text-gray-300 text-sm font-normal pl-[10px] py-[10px] rounded-[5px] focus:outline-none">
                </div>
                <div class="flex flex-col w-full h-fill gap-[20px] hidden" id="page_2">
                    <p class="text-base text-neutral-950 pr-[10px]">Tinggi Badan<span class="text-red-400">*</span></p>
                    <input type="text" name="tinggi_badan" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan tinggi badan">
                </div>
                <div class="col-span-1 flex justify-end items-center gap-[26px] pt-10 w-full">
                    <p class="text-xs"><span class="text-red-400">*</span>Wajib diisi</p>
                    <a href="{{ url('kader/bayi')}}" class="bg-gray-300 text-neutral-950 font-bold text-base py-[5px] px-[19px] rounded-[5px]" id="page_1">Kembali</a>
                    <button type="button" class="bg-gray-300 text-neutral-950 font-bold text-base py-[5px] px-[19px] rounded-[5px] hidden back" id="page_2">Kembali</button>
                    <button type="button" class="bg-blue-700 text-white font-bold text-base py-[5px] px-[19px] rounded-[5px]" id="next">Lanjut</button>
                    <button type="submit" class="bg-blue-700 text-white font-bold text-base py-[5px] px-[19px] rounded-[5px] hidden" id="page_2">Simpan Data</button>
{{--                    <button type="submit" class="bg-blue-700 text-white font-bold text-base py-[5px] px-[19px] rounded-[5px] hidden" id="save_button">Simpan Data</button>--}}
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
        let counter = document.getElementById('counter')
        let total = document.getElementById('comment')
        let character = 0;

        function full(){
            if(character === 200){
                counter.classList.remove("text-stone-400");
                counter.classList.add("text-red-400");
            } else {
                counter.classList.remove("text-red-400");
                counter.classList.add("text-stone-400");
            }
        }

        total.addEventListener("input", function() {
            character = total.value.length
            counter.innerText = character+"/200";
            full();
        });

        function togglePages(page1, page2) {
            page1.forEach(function(page) {
                page.classList.toggle('hidden');
            });
            page2.forEach(function(page) {
                page.classList.toggle('hidden');
            });
        }

        let button = document.getElementById('next');
        let back = document.querySelector('.back');
        let page1 = document.querySelectorAll('#page_1');
        let page2 = document.querySelectorAll('#page_2');

        button.addEventListener("click", function () {
            button.classList.add('hidden');
            togglePages(page1, page2);
        });

        back.addEventListener("click", function () {
            button.classList.remove('hidden');
            togglePages(page1, page2);
        });
    </script>
    <script>
        let dataBayi = {{ json_encode($bayisData) }}
        // Tangani peristiwa saat nilai nama balita berubah
        document.getElementById('nama').addEventListener('change', function() {
            // Dapatkan nilai yang dipilih dari nama balita
            var selectedName = this.value;

            $bayi = dataBayi.filter(function (bayi) {
                // return
            })

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Tanggapi balik dari server
                        var responseData = JSON.parse(xhr.responseText);

                        // Update elemen-elemen formulir dengan data yang diterima
                        document.getElementById('usia').value = responseData.usia;
                        document.getElementById('nama_ibu').value = responseData.nama_ibu;
                        // Update elemen-elemen formulir lainnya sesuai kebutuhan
                    } else {
                        // Tangani kesalahan jika terjadi
                        console.error('Error:', xhr.status);
                    }
                }
            };

            xhr.send();
        });
    </script>

@endpush