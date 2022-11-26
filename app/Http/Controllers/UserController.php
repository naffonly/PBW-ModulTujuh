<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.daftarPengguna');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address'=> ['required', 'string', 'max:255'],
            'phoneNumber'=> ['required'],
            'birthdate'=> ['required', 'date','before:today']
        ],
        [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username telah digunakan',
            'birthdate.before' => 'Tanggal lahir harus sebelum hari ini'
        ]);
        $user =[
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'birthdate' => $request->birthdate,
        ];

        DB::table('users')->insert($user);
        return view('user.daftarPengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    
     public function show(User $user)
    {
        //
        return view('user.infoPengguna',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request )
    {
        //
        $request->validate([
            'username'      => ['required'],
            'fullname'      => ['required'],
            'email'         => ['required'],
            'address'       => ['required'],
            'phoneNumber'   => ['required'],
            'birthdate'     => ['required', 'before:today']
        ]);
        
        $affected = DB::table('users')  
        ->where('id', $request->id)
        ->update([
            'username'      => $request->username,
            'fullname'      => $request->fullname,
            'email'         => $request->email,
            'address'       => $request->address,
            'phoneNumber'   => $request->phoneNumber,
            'birthdate'     => $request->birthdate,
        ]);

        return view('user.daftarPengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getAllUsers()
    {
        $users = DB::table('users')
            ->select(
                'id as id',
                'fullname as fullname',
                'address as alamat',
                'birthdate as birthdate',
                'phoneNumber as phoneNumber')
            ->orderBy('id', 'asc')
            ->get();

            return DataTables::of($users)
            ->addColumn('action', function($user) {
                $html = '
                <a class="btn btn-info" href="/userView/'.$user->id.'">Show</a>
                ';
                return $html;
            })
            ->make(true);
    }
}
