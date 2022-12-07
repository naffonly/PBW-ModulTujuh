<?php

namespace App\Http\Controllers;

use App\DataTables\CollectionsDataTable;
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
            'namaKoleksi' => ['required', 'string', 'max:255', 'unique:collections'],
            'jenisKoleksi' => ['required', 'gt:0'],
            'jumlahAwal' => ['required', 'gt:0'],
        ],
        [
            'namaKoleksi.unique' => 'Nama koleksi tersebut ada'
        ]
        );

        $collection = [
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahAwal' => $request->jumlahAwal,
            'jumlahSisa' => $request->jumlahAwal ,
            'jumlahKeluar' => 0,
        ];
        DB::table('collections')->insert($collection);
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
        return view('koleksi.infoKoleksi', compact('collection'));
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
    public function update(Request $request)

    {
        //
// dd($request);
        $request->validate([
            'jenisKoleksi'         => ['required', 'gt:0'],
            'jumlahAwal'    => ['required', 'gt:0'],
            'jumlahSisa'    => ['required', 'gt:0'],
            'jumlahKeluar'  => ['required', 'gt:0'],
        ]);
        
        $affected = DB::table('collections')
        ->where('id', $request->id)
        ->update([
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahAwal' => $request->jumlahAwal,
            'jumlahSisa' => $request->jumlahSisa,
            'jumlahKeluar' => $request->jumlahKeluar,
        ]);

        return view('koleksi.daftarKoleksi');
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
            'jumlahAwal as jumlahAwal',
            'jumlahSisa as jumlahSisa',
            'jumlahKeluar as jumlahKeluar',
        )
        ->orderBy('namaKoleksi','asc')
        ->get();

        return DataTables::of($collections)
        ->addColumn('action', function ($collection){
            $html = '
            <a class="btn btn-info" href="/koleksiView/'.$collection->id.'">Show</a>
            ';
            return $html;
        })
            ->make(true);
    }
}
