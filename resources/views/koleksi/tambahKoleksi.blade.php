<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrasi Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('koleksiStore') }}">
            @csrf
            <!-- namaKoleksi -->
            <div>
                <x-input-label for="namaKoleksi" :value="__('namaKoleksi')" />

                <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi')" required autofocus />

                <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
            </div>

<!-- jenis -->
<div>
                <x-input-label for="jenisKoleksi" :value="__('jenisKoleksi')" />

                <x-text-input id="jenisKoleksi" class="block mt-1 w-full" type="text" name="jenisKoleksi" :value="old('jenisKoleksi')" required autofocus />

                <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
            </div>

             <!-- jumlah Awal -->
             <div>
                <x-input-label for="jumlahawal" :value="__('jumlahawal')" />

                <x-text-input id="jumlahawal" class="block mt-1 w-full" type="text" name="jumlahAwal" :value="old('jumlahAwal')" required autofocus />

                <x-input-error :messages="$errors->get('jumlahKoleksi')" class="mt-2" />
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
</x-app-layout>
