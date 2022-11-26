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
                  
                
                    <form method="POST" action="{{ route('collecion.update') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">id</label>
                            <input  id="id" name="id" type="text" class="form-control"  autocomplete="off" value="{{$collection->id}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul</label>
                            <input  id="judul" name="judul" type="text" class="form-control" autocomplete="off" value="{{$collection->namaKoleksi}}" readonly>
                        </div>
                        <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                            <select id="jenis" name="jenis" class="form-select" required>
                              <option value="-1" @if (old('jenis', $collection->jenis) == -1) selected @endif>Pilih satu</option>
                              <option value="1" @if (old('jenis', $collection->jenis) == 1) selected @endif>Buku</option>
                              <option value="2" @if (old('jenis', $collection->jenis) == 2) selected @endif>Majalah</option>
                              <option value="3" @if (old('jenis', $collection->jenis) == 3) selected @endif>Cakram Digital</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahAwal" class="form-label">Jumalah Awal</label>
                            <input  id="jumlahAwal" name="jumlahAwal" type="text" class="form-control" autocomplete="off" value="{{$collection->jumlahAwal}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahSisa" class="form-label">Jumalah Sisa</label>
                            <input  id="jumlahSisa" name="jumlahSisa" type="text" class="form-control" autocomplete="off" value="{{$collection->jumlahSisa}}" >
                        </div>
                        <div class="mb-3">
                            <label for="jumlahKeluar" class="form-label">Jumalah Keluar</label>
                            <input  id="jumlahKeluar" name="jumlahKeluar" type="text" class="form-control" autocomplete="off" value="{{$collection->jumlahKeluar}}" >
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
