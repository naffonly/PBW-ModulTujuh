<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                <form method="POST" action="{{ route('transaksiStore') }}">
                 @csrf
                 <div class="form-group mb-2">
                 <label for="peminjam">Peminjam</label>
                <select class="form-control" name="idPeminjam">
                    <option>-- Pilih Dahulu ---</option>
                    @foreach ($users as $user)
                    @if ($user->id == old('userPeminjam'))
                    <option value="{{$user->id}}" selected>{{$user->fullname}}</option>
                    @else
                    <option value="{{$user->id}}">{{$user->fullname}}</option>
                    @endif
                    @endforeach
                </select>
                 </div>

                <!-- Koleksi 1 -->
                <div class="form-group mb-2">
                 <label for="kolesi1">Koleksi 1</label>
                <select class="form-control" name="koleksi1">
                    <option>-- Pilih Dahulu ---</option>
                    @foreach ($collections as $collection)
                    @if ($collection->id == old('koleksi1'))
                    <option value="{{$collection->id}}" selected>{{$collection->namaKoleksi}}</option>
                    @else
                    <option value="{{$collection->id}}">{{$collection->namaKoleksi}}</option>
                    @endif
                    @endforeach
                </select>
                </div>

                <!-- Koleksi 2 -->
                <div class="form-group mb-2">
                 <label for="kolesi1">Koleksi 2</label>
                <select class="form-control" name="koleksi2">
                    <option>-- Pilih Dahulu ---</option>
                    @foreach ($collections as $collection)
                    @if ($collection->id == old('koleksi2'))
                    <option value="{{$collection->id}}" selected>{{$collection->namaKoleksi}}</option>
                    @else
                    <option value="{{$collection->id}}">{{$collection->namaKoleksi}}</option>
                    @endif
                    @endforeach
                </select>
                </div>

                <!-- Koleksi 3 -->
                <div class="form-group mb-2">
                 <label for="kolesi1">Koleksi 3</label>
                <select class="form-control" name="koleksi3">
                    <option>-- Pilih Dahulu ---</option>
                    @foreach ($collections as $collection)
                    @if ($collection->id == old('koleksi3'))
                    <option value="{{$collection->id}}" selected>{{$collection->namaKoleksi}}</option>
                    @else
                    <option value="{{$collection->id}}">{{$collection->namaKoleksi}}</option>
                    @endif
                    @endforeach
                </select>
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
