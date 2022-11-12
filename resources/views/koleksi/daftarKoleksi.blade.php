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
                    <div class="contrainer">
                        <div class="row form-inline">
                             <table class="table table-striped table-hover" id="datatable">
                                <thead>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Opsi</th>
                                </thead>
                                <tbody>
                            </tbody>
                            </table>   
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
