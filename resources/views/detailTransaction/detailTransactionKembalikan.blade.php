<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  
                
                <form method="POST" action="{{ route('transaksiStore') }}">
                 @csrf


                 <div class="form-group mb-2">
                 <label for="transaksi">ID  Transaksi</label>
                 <input type="text" class="form-control" name="idTransaksi" placeholder="Enter email" value="{{$detailTransaction->idTransaksi}}" readonly>
                 </div>

                 <div class="form-group mb-2">
                 <label for="peminjam">ID Detail Transaksi</label>
                 <input type="text" class="form-control" name="idDetailTransaksi" placeholder="Enter email" value="{{$detailTransaction->id}}" readonly>
                 </div>

                 <div class="form-group mb-2">
                 <label for="peminjam">Peminjam</label>
                 <input type="text" class="form-control" name="idPeminjam" placeholder="Enter email" value="{{$detailTransaction->namaPeminjam}}" disabled>
                 </div>

                 <div class="form-group mb-2">
                 <label for="Petugas">Petugas</label>
                 <input type="text" class="form-control" name="idPetugas" placeholder="Enter email" value="{{$detailTransaction->namaPetugas}}" disabled>
                 </div>

                 <div class="form-group mb-2">
                 <label for="Petugas">Koleksi</label>
                 <input type="text" class="form-control" name="koleksi" placeholder="Enter email" value="{{$detailTransaction->koleksi}}" disabled>
                 </div>

                <!-- Koleksi 3 -->
                <div class="form-group mb-2">
                 <label for="kolesi1">Koleksi 3</label>
                <select class="form-control" name="kolekssi3">
                    <option>-- Pilih Dahulu ---</option>
                    <option value="1" @if(old('status',$detailTransaction->status)== 1) seleted @endif>Pinjam</option>
                    <option value="2" @if(old('status',$detailTransaction->status)== 2) seleted @endif>Kembali</option>
                    <option value="3" @if(old('status',$detailTransaction->status)== 3) seleted @endif>Hilang</option>

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
