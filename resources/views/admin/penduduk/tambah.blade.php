@extends('admin.layouts.template')

@section('content')
<form action="" method="POST">
    @csrf
    <div class="flex flex-col bg-white  mx-5 my-5 shadow-[0_-4px_0_0_rgba(29,78,216,1)] rounded-md">
        <div class="flex justify-between items-center w-full py-2 border-b">
            <p class="text-lg mx-10">Form Data Penduduk</p>
        </div>

        <div class="grid md:grid-cols-2 my-[30px] mx-10 gap-x-[101px]">

            {{-- KOLOM KANAN --}}
            <div class="md:col-span-1 flex flex-col gap-[23px] order-2">

                {{-- PENDIDIKAN --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Pendidikan<span class="text-red-400">*</span></p>
                    <select name="pendidikan" id="pendidikan" class="w-100 border border-stone-400 text-sm font-normal pl-[10px] py-[10px] rounded-[5px] focus:outline-none">
                        <option value="" disabled selected>Pilih Pendidikan</option>
                        <option value="Tidak Terpelajar">Tidak Terpelajar</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA/SMK</option>
                        <option value="S1">D4/S1</option>
                    </select>
                    @error('pendidikan')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END PENDIDIKAN --}}

                {{-- HUBUNGAN KELUARGA --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Hubungan Keluarga<span class="text-red-400">*</span></p>
                    <select name="hubungan_keluarga" id="hubungan_keluarga" class="w-100 border border-stone-400 text-sm font-normal pl-[10px] py-[10px] rounded-[5px] focus:outline-none">
                        <option value="" disabled selected>Pilih Pendidikan</option>
                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                    </select>
                    @error('hubungan_keluarga')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END HUBUNGAN KELUARGA --}}

                {{-- RT --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">RT<span class="text-red-400">*</span></p>
                    <select name="RT" id="RT" class="w-100 border border-stone-400 text-sm font-normal pl-[10px] py-[10px] rounded-[5px] focus:outline-none">
                        <option value="" disabled selected>Pilih RT</option>
                        @for ($i = 1; $i < 7; $i++)
                            <option value="RT 0{{$i}}">RT 0{{$i}}</option>
                        @endfor
                    </select>
                    @error('hubungan_keluarga')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END RT --}}

                {{-- ALAMAT --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Alamat<span class="text-red-400">*</span></p>
                    <textarea class="text-sm font-normal border border-stone-400 px-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" name="alamat" id="alamat" rows="1" maxlength="200" placeholder="Masukkan Alamat" required></textarea>
                    @error('alamat')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END ALAMAT --}}
                
                {{-- NOMOR TELEPON --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Nomor Telepon<span class="text-red-400">*</span></p>
                    <input type="number" step="any" name="no_telp" class="w-100 text-sm font-normal border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan Nomor Telepon" required>
                    @error('no_telp')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END NOMOR TELEPON --}}

            </div>
            {{-- END KOLOM KANAN --}}

            {{-- KOLOM KIRI --}}
            <div class="md:col-span-1 flex flex-col gap-[23px] max-md:mt-[23px] order-1">

                {{-- NIK --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">NIK<span class="text-red-400">*</span></p>
                    <input type="number" step="any" name="NIK" class="w-100 text-sm font-normal border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan NIK" required>
                    @error('NIK')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END NIK --}}

                {{-- NKK --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">NKK<span class="text-red-400">*</span></p>
                    <input type="number" step="any" name="NKK" class="w-100 text-sm font-normal border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan NKK" required>
                    @error('NKK')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END NKK --}}

                {{-- NAMA --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Nama<span class="text-red-400">*</span></p>
                    <input type="text" step="any" name="nama" class="w-100 text-sm font-normal border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan Nama Penduduk" required>
                    @error('nama')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END NAMA --}}

                {{-- TANGGAL LAHIR --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Tanggal Lahir<span class="text-red-400">*</span></p>
                    <input type="date" step="any" name="tgl_lahir" class="w-100 text-sm font-normal text-gray-300 border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none" id="tanggal" required>
                    @error('tgl_lahir')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END TANGGAL LAHIR --}}

                {{-- PENDAPATAN --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Pendapatan<span class="text-red-400">*</span></p>
                    <select name="pendapatan" id="pendapatan" class="w-100 border border-stone-400 text-sm font-normal pl-[10px] py-[10px] rounded-[5px] focus:outline-none">
                        <option value="" disabled selected>Pilih Rentang Pendapatan</option>
                        <option value="">Rp 0 - Rp 500.000</option>
                        <option value="">Rp 500.000 - Rp 1.000.000</option>
                        <option value="">Rp 1.000.000 - Rp 2.000.000</option>
                        <option value="">Rp 2.000.000 - Rp 3.000.000</option>
                        <option value="">Rp 3.000.000 - Keatas</option>
                    </select>
                    @error('pendapatn')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END PENDAPATAN --}}

                {{-- JENIS KELAMIN --}}
                <div class="flex flex-col w-full h-fill gap-[20px] " id="page_1">
                    <p class="text-base text-neutral-950 pr-[10px]">Jenis Kelamin<span class="text-red-400">*</span></p>
                    <div class="flex items-center gap-10">
                        <input type="radio" class="indeterminate:outline-2 indeterminate:outline-stone-400 indeterminate:w-4 indeterminate:py-[6px] checked:w-4 checked:outline-2 checked:border-transparent -mr-[25px]" name="jenis_kelamin" value="L" id="option1" required><span>Laki-laki</span>
                        <input type="radio" class="indeterminate:outline-2 indeterminate:outline-stone-400 indeterminate:w-4 indeterminate:py-[6px] checked:w-4 checked:outline-2 checked:bg-red-400 -mr-[25px]" name="jenis_kelamin" value="P" id="option2" required><span>Perempuan</span>
                    </div>
                    @error('jenis_kelamin')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                {{-- END JENIS KELAMIN --}}

            </div>
            {{-- END KOLOM KIRI --}}
        </div>
        <div class="grid md:grid-cols-2 mx-10 gap-x-[101px] pb-[30px]">
            <div class="col-span-2 flex justify-end items-center gap-[26px] w-full" id="">
                <p class="text-xs"><span class="text-red-400">*</span>Wajib diisi</p>
                {{-- <button type="button" class="bg-gray-300 text-neutral-950 font-bold text-base py-[5px] px-[19px] rounded-[5px] hidden back" id="page_2">Kembali</button> --}}
                <a href="{{ url('kader/bayi')}}" class="bg-gray-300 text-neutral-950 font-bold text-base py-[5px] px-[19px] rounded-[5px]" id="page_1">Kembali</a>
                <button type="submit" class="bg-blue-700 text-white font-bold text-base py-[5px] px-[19px] rounded-[5px]" id="page_2">Simpan Data</button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
<script>
    let date = document.querySelector('#tanggal');
    date.onchange = function () {
        date.classList.toggle('text-gray-300');
    }
</script>
@endpush