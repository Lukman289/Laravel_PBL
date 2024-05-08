@extends('kader.layouts.template')

@section('content')
    <form action="{{route('artikel.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col bg-white mx-5 my-5 rounded-md">
            <div class="grid md:grid-cols-3 my-[30px] mx-10 gap-x-[101px]">
                <div class="md:col-span-2 flex flex-col gap-[23px]">
                    <div class="flex flex-col w-full h-fill gap-[20px]">
                        <p class="text-base text-neutral-950">Judul Artikel</p>
                        <input type="text" name="judul" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" placeholder="Masukkan judul artikel">
                        <p class="text-xs font-normal text-stone-400 mt-[-10px]" id="counter">Judul harus sesuai dengan informasi yang dibagikan</p>
                    </div>
                    <div class="flex flex-col w-full h-fill gap-[20px]">
                        <p class="text-base text-neutral-950">Upload Foto</p>
                        <div id="uploadContainer" class="flex w-100 border border-stone-400 justify-between items-center py-[10px] px-[10px] rounded-[5px]">
                            <div id="label" class="">
                                <p id="file-upload" class=" text-sm text-gray-300">Pilih foto artikel</p>
                                <svg id="close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <input id="upload" type="file" accept=".jpeg, .jpg, .png, .gif, .svg" name="foto_artikel_path" class="w-100 text-sm font-normal border border-stone-400 pl-[10px] py-[10px] rounded-[5px] flex-row-reverse hidden focus:outline-none file:right-0 placeholder:text-gray-300" placeholder="Masukkan usia balita">
                            <label for="upload" class="text-[11px] text-white bg-blue-700 py-[2px] px-[5px] rounded-sm cursor-pointer">Pilih File</label>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1 flex flex-col gap-[23px] max-md:pt-[23px]">
                    <div class="flex flex-col w-full h-fill gap-[20px]">
                        <p class="text-base text-neutral-950">Tags</p>
                        <div class="flex flex-wrap h-fit gap-2.5">
                            <input type="checkbox" name="tag[]" id="kegiatan" class="hidden" value="kegiatan">
                            <label for="kegiatan" id="tags-label" class="text-neutral-950 text-sm bg-gray-200 px-[10px] py-[10px] rounded-full cursor-pointer">Kegiatan</label>

                            <input type="checkbox" name="tag[]" id="informasi" class="hidden" value="informasi">
                            <label for="informasi" id="tags-label2" class="text-neutral-950 text-sm bg-gray-200 px-[10px] py-[10px] rounded-full cursor-pointer">Informasi</label>

                            <input type="checkbox" name="tag[]" id="edukasi" class="hidden" value="edukasi">
                            <label for="edukasi" id="tags-label3" class="text-neutral-950 text-sm bg-gray-200 px-[10px] py-[10px] rounded-full cursor-pointer">Edukasi</label>

                            <input type="checkbox" name="tag[]" id="balita" class="hidden" value="balita">
                            <label for="balita" id="tags-label4" class="text-neutral-950 text-sm bg-gray-200 px-[10px] py-[10px] rounded-full cursor-pointer">Balita</label>

                            <input type="checkbox" name="tag[]" id="ibuMenyusui" class="hidden" value="ibu_menyusui">
                            <label for="ibuMenyusui" id="tags-label5" class="text-neutral-950 text-sm bg-gray-200 px-[10px] py-[10px] rounded-full cursor-pointer">Ibu Menyusui</label>

                            <input type="checkbox" name="tag[]" id="ibuHamil" class="hidden" value="ibu_hamil">
                            <label for="ibuHamil" id="tags-label6" class="text-neutral-950 text-sm bg-gray-200 px-[10px] py-[10px] rounded-full cursor-pointer">Ibu Hamil</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 mx-10 gap-x-[101px] pb-[30px]">
                <div class="flex flex-col col-span-3 md:col-span-2 w-full h-fill gap-[20px]">
                    <p class="text-base text-neutral-950">Isi Artikel</p>
                    <textarea type="text" name="isi" id="comment" class="text-sm font-normal border border-stone-400 px-[10px] py-[10px] rounded-[5px] focus:outline-none placeholder:text-gray-300" rows="10" placeholder="Tuliskan isi artikel"></textarea>
                    <p class="text-xs font-normal text-stone-400 mt-[-10px]">Demi menghindari berita hoax, kami akan mengulas tulisan anda sebelum mengunggahnya ke laman artikel/promosi</p>
                </div>
                <div class="col-span-3 flex  justify-end items-end gap-[26px] w-full h-full max-md:pt-[23px]">
                    <a href="{{ url('kader/info/')}}" class="bg-gray-300 text-neutral-950 font-bold text-base py-[10px] px-[10px] rounded-[5px]">Kembali</a>
                    <button type="submit" class="bg-blue-700 text-white font-bold text-base py-[10px] px-[10px] rounded-[5px]">Simpan</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('js')
<script>
    window.onload = function() {
    document.getElementById('upload').addEventListener('change', getFileName);
    }

    const getFileName = (event) => {
        let files = event.target.files;
        let fileName = files[0].name;
        console.log("file name: ", fileName);
        label.innerText = fileName;
        label.className = "rounded-full text-neutral-950 text-sm"
        labelDiv.className = "flex w-100 bg-gray-200 rounded-full py-[5px] px-[10px] gap-2.5"
        document.getElementById('uploadContainer').classList.remove("py-[10px]")
        document.getElementById('uploadContainer').classList.add("py-[5px]")
        document.getElementById('close').classList.remove('hidden')
        document.getElementById('close').classList.add('cursor-pointer')
    }
    let label = document.querySelector('#file-upload')
    let labelDiv = document.querySelector('#label')

    let kegiatanLabels = document.querySelectorAll('[id^="tags-label"]');
    kegiatanLabels.forEach(function(kegiatanLabel){
        kegiatanLabel.addEventListener('click', function() {
            let hasNeutralBg = kegiatanLabel.classList.contains('bg-neutral-950');

            if (hasNeutralBg) {
                kegiatanLabel.classList.remove('bg-neutral-950');
                kegiatanLabel.classList.remove('text-white');
            } else {
                kegiatanLabel.classList.add('bg-neutral-950');
                kegiatanLabel.classList.add('text-white');
            }
        });
    })
</script>
@endpush
