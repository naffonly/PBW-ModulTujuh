<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                
                <div class="form-group">
                    <label >Peminjaman</label>
                    <input type="text" class="form-control" name="peminjam"  autocomplete="off"
                    value="{{$transactions->peminjam}}"  readonly>
                </div>
                <div class="form-group">
                    <label>Petugas</label> 
                    <input type="text" class="form-control" name="petugas" autocomplete="off"
                    value="{{$transactions->petugas}}" readonly>
                </div>  
             

                <div class="card-body">
                <table class="table table-bordered" id="datatable">
                <thead>
                <tr>
                <th>Id</th>
                <th>Koleksi</th>
                <th>tanggal Pinjam</th>
                <th>tanggal Kembali</th>
                <th>status</th>
                <th>Action</th>
                </tr>
                </thead>
                </table>
                </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#datatable').DataTable({

ajax: "{{ url('getAllDetailTransactions') }}"+"/"+"{{$transactions->id}}",
processing: true,
serverSide: false,
deferRender:true,
type: 'GET',
destroy : true,
columns: [
{ data: 'id', name: 'id' },
{ data: 'koleksi', name: 'koleksi' },
{ data: 'tanggalPinjam', name: 'tanggalPinjam' },
{ data: 'tanggalKembali', name: 'tanggalKembali' },
{ data: 'status', name: 'status' },   
{data: 'action', name: 'action'}
]
});
});
</script>
</x-app-layout>
