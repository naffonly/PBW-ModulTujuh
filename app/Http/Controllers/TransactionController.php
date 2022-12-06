<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\detailtransaction;
use App\Models\transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('transaction.daftarTransaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::get();
        $collections = Collection::where('jumlahSisa','>',0)->get();
        return view('transaction.transaksiTambah',compact('collections','users'));
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
            'idPeminjam' => 'required|integer|gt:0',
            'koleksi1' => 'required|integer|gt:0'
        ],[
            'idPeminjam.gt' => 'pilih salah satu',
            'koleksi1.gt' => 'Pilih jenis Item'
        ]);


        $transaction = new transaction;
        $transaction->userIdPeminjam = $request->idPeminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString();
        $transaction->save();

        $lastTransactionStrored = $transaction->id;

        $detailTransaksi1 = new detailtransaction;
        $detailTransaksi1->transactionId = $lastTransactionStrored;
        $detailTransaksi1->collectionId = $request->koleksi1;
        $detailTransaksi1->status = 1;
        $detailTransaksi1->save();
        DB::table('collections')->where('id',$request->koleksi1)->decrement('jumlahSisa');
        DB::table('collections')->where('id',$request->koleksi1)->increment('jumlahKeluar');

        if ($request->koleksi2 > 0) {
            $detailTransaksi2 = new detailtransaction;
            $detailTransaksi2->transactionId = $lastTransactionStrored;
            $detailTransaksi2->collectionId = $request->koleksi2;
            $detailTransaksi2->status = 1;
            $detailTransaksi2->save();
            DB::table('collections')->where('id',$request->koleksi2)->decrement('jumlahSisa');
            DB::table('collections')->where('id',$request->koleksi2)->increment('jumlahKeluar');
    
        }

        if ($request->koleksi3 > 0) {
            $detailTransaksi3 = new detailtransaction;
            $detailTransaksi3->transactionId = $lastTransactionStrored;
            $detailTransaksi3->collectionId = $request->koleksi3;
            $detailTransaksi3->status = 1;
            $detailTransaksi3->save();
            DB::table('collections')->where('id',$request->koleksi3)->decrement('jumlahSisa');
            DB::table('collections')->where('id',$request->koleksi3)->increment('jumlahKeluar');
    
        }

        return redirect()->route('transaksi.index')->with('status','Peminjaman Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        //
        $transactions = DB::table('transactions')
        ->select(
            'transactions.id as id',
            'u1.fullname as peminjam',
            'u2.fullname as petugas',
            'tanggalPinjam as tanggalPinjam',
            'tanggalSelesai as tanggalSelesai',
        )
        ->join('users as u1','userIdPeminjam','=','u1.id')
        ->join('users as u2','userIdPetugas','=','u2.id')
        ->where('transactions.id','=' ,$transaction->id)
        ->orderBy('tanggalPinjam','asc')
        ->first();
        return view('transaction.transaksiView', compact('transactions'));
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

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions')
        ->select(
            'transactions.id as id',
            'u1.fullname as peminjam',
            'u2.fullname as petugas',
            'tanggalPinjam as tanggalPinjam',
            'tanggalSelesai as tanggalSelesai',
        )
        ->join('users as u1','userIdPeminjam','=','u1.id')
        ->join('users as u2','userIdPetugas','=','u2.id')
        ->orderBy('tanggalPinjam','asc')
        ->get();

        return DataTables::of($transactions)
        ->addColumn('action', function ($transaction){
            $html = '
            <a class="btn btn-info" href="/transaksiView/'.$transaction->id.'">Show</a>
            ';
            return $html;
        })
            ->make(true);
    }
}
