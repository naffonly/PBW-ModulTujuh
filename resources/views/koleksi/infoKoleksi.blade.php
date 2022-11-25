<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('koleksiStore') }}">
            @csrf
            <!-- ID -->
            <div>
                <x-input-label for="id" :value="__('id Koleksi')" />

                <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="{{$collection->id}}" readonly />

                <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
            </div>

            <!-- namaKoleksi -->
            <div>
                <x-input-label for="judul" :value="__('Nama Koleksi')" />

                <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="{{$collection->judul}}" readonly />

                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
            </div>

           

<!-- jenis -->
                    <div>
                        <x-input-label for="jenis" :value="__('Jenis')" />
        
                        <select id="jenis" name="jenis" class="form-select" required>
                              <option value="-1" @if (old('jenis', $collection->jenis) == -1) selected @endif> Pilih satu</option>
                              <option value="1" @if (old('jenis', $collection->jenis) == 1) selected @endif> Buku</option>
                              <option value="2" @if (old('jenis', $collection->jenis) == 2) selected @endif> Majalah</option>
                              <option value="3" @if (old('jenis', $collection->jenis) == 3) selected @endif> Cakram Digital</option>
                          </select>
        
                        <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                    </div>

                     <!-- jumlah awal -->
            <div>
                <x-input-label for="jumawal" :value="__('jumlah Awal')" />

                <x-text-input id="jumawal" class="block mt-1 w-full" type="text" name="jumawal" :value="{{$collection->jumlahawal}}" required autofocus />

                <x-input-error :messages="$errors->get('jumawal')" class="mt-2" />
            </div>

             <!-- jumlah sisa -->
             <div>
                <x-input-label for="jumsisa" :value="__('Jumlah Sisa')" />

                <x-text-input id="jumsisa" class="block mt-1 w-full" type="text" name="jumsisa" :value="{{$collection->jumlahsisa}}" required autofocus />

                <x-input-error :messages="$errors->get('jumsisa')" class="mt-2" />
            </div>

             <!-- jumlah keluar -->
             <div>
                <x-input-label for="jumkel" :value="__('jumlah keluar')" />

                <x-text-input id="jumkel" class="block mt-1 w-full" type="text" name="jumkel" :value="{{$collection->jumlahkeluar}}" required autofocus />

                <x-input-error :messages="$errors->get('jumkel')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" >
                    {{ __('Reset') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
                </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
