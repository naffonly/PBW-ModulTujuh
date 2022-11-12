<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Yajra\DataTables\Facades\DataTables;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('koleksi.daftarKoleksi');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('koleksi.tambahKoleksi');
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
            'namaKoleksi' => ['required', 'string', 'max:255'],
            'jenisKoleksi' => ['required', 'Integer', 'max:255'],
            'jumlahKoleksi' => ['required']
        ]);

        $collection = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
        ]);

        
        return view('koleksi.daftarKoleksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
        return view('koleksi.infoKoleksi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }

    public function getAllCollections(){
        $collections = DB::table('collections')
        ->select(
            'id as id',
            'namaKoleksi as judul',
            DB::raw('
                (CASE
                WHEN jenisKoleksi="1" THEN "Buku"
                WHEN jenisKoleksi="2" THEN "Majalah"
                WHEN jenisKoleksi="3" THEN "Cakram Digital"
                END) as jenis
            '),
            'jumlahKoleksi as jumlah'
        )
        ->orderBy('namaKoleksi','asc')
        ->get();

        return DataTables::of($collections)
        ->addColumn('action', function ($collection){
            $html = '
            <button data-rowid="" class="btn btn-xs btn-light" data-toggle="tooltip" data-placement="top"
                data-container="body" title="Edit Koleksi" onclick="infoKoleksi('."'".$collection->id."'".')">
                <i class="fa fa-edit"></i>
            ';
            return $html;
        })
            ->make(true);
    }
}