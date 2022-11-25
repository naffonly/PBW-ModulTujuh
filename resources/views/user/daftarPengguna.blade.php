<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <div class="container mt-2">
                <div class="row">
                <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
                <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Tambah</a>
                </div>
                </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                <table class="table table-bordered" id="datatable">
                <thead>
                <tr>
                <th>Id</th>
                <th>fullname</th>
                <th>alamat</th>
                <th>birthdate</th>
                <th>phoneNumber</th>
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
processing: true,
serverSide: true,
ajax: "{{ url('getAllUsers') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'fullname', name: 'fullname' },
{ data: 'alamat', name: 'alamat' },
{ data: 'birthdate', name: 'birthdate' },
{ data: 'phoneNumber', name: 'phoneNumber' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
</script>
</x-app-layout>
