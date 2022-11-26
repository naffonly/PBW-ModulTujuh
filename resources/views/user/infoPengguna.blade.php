<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                
                <form method="POST" action="{{ route('user.update') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">id</label>
                            <input  id="id" name="id" type="text" class="form-control"  autocomplete="off" value="{{$user->id}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">username</label>
                            <input  id="username" name="username" type="text" class="form-control" autocomplete="off" value="{{$user->username}}" >
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">fullname</label>
                            <input  id="fullname" name="fullname" type="text" class="form-control" autocomplete="off" value="{{$user->fullname}}" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input  id="email" name="email" type="email" class="form-control" autocomplete="off" value="{{$user->email}}" >
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <input  id="address" name="address" type="text" class="form-control" autocomplete="off" value="{{$user->address}}" >
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">phoneNumber</label>
                            <input  id="phoneNumber" name="phoneNumber" type="text" class="form-control" autocomplete="off" value="{{$user->phoneNumber}}" >
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">phoneNumber</label>
                            <input  id="birthdate" name="birthdate" type="date" class="form-control" autocomplete="off" value="{{$user->birthdate}}" >
                        </div>
                        <button type="submit" class="btn btn-info">Reset</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
