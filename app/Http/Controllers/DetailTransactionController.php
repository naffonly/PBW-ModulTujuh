<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DetailTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detailTransactionKembalikan()
    {
        return view('detailTransaction.detailTransactionKembalikan');
    }
    
    public function getAllDetailTransactions($transactionId)
    {
        $detailTransactions = DB::table('detailtransactions as dt')
        ->select(
            'dt.id as id',
           'dt.tanggalKembali as tanggalKembali',
           't.tanggalPinjam as tanggalPinjam',
           'dt.status as statusType',
           DB::raw('
           (CASE
           WHEN dt.status="1" THEN "Pinjam"
           WHEN dt.status="2" THEN "Kembali"
           WHEN dt.status="3" THEN "Hilang"
           END) as status
       '),
        'c.namaKoleksi as koleksi')
        ->join('collecions as c','c.id','=','collectionId')
        ->join('transactions as t','t.id','=','dt.transactionId')
        ->where('transaction','=',$transactionId)->get();

        return DataTables::of($detailTransactions)
        ->addColumn('action', function ($detailTransaction){
            $html = '';
            if ($detailTransaction->statusType == "1") {
               $html = '  
               <a class="btn btn-info" href="/detailTransactionKembalikan/'.$detailTransaction->id.'">Show</a>
               ';
            }
          
            return $html;
        })
            ->make(true);
    }
   
}
