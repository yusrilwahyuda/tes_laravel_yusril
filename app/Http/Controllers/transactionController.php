<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\products;
use Illuminate\Support\Facades\DB;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if(strlen($katakunci)){
            $data= DB::table('transactions')->join('products','transactions.product_id','=','products.id')->select('transactions.reference_no', 'transactions.price', 'transactions.payment_amount', 'transactions.id as idT', 'products.id as idP', 'transactions.quantity','products.name')->where('products.name', 'like', "%$katakunci%")->paginate(3);
        }else{
            $data= DB::table('transactions')->join('products','transactions.product_id','=','products.id')->select('transactions.reference_no', 'transactions.price', 'transactions.payment_amount', 'transactions.id as idT', 'products.id as idP', 'transactions.quantity','products.name')->orderBy('transactions.id','DESC')->paginate(3);
        }
        return view('transaction.index')->with('data',$data);
        return response()->json([
            'data' => $data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = products::all();
        return view('transaction.create')->with('produk',$produk);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  [
            'reference_no'=>$request->reference_no,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'payment_amount'=>$request->price * $request->quantity ,
            'product_id' => $request->product_id
        ];
        transactions::create($data);
        return redirect()->to('transaksi')->with('success', 'Berhasil menambahkan data');
        return response()->json([
            'data'=>$data
        ]);
        //return redirect()->to('transaksi')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = products::all();
        $data = transactions::where('id',$id)->first();
        return view('transaction.edit', compact('produk','data'));
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
        $request->validate([
            'reference_no' => 'required',
            'price' => 'required|numeric',
            'product_id' => 'required',
            'payment_amount' => 'required',
        ]);

        $data =  [
            'reference_no'=>$request->reference_no,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'payment_amount'=>$request->price * $request->quantity,
            'product_id' => $request->product_id
        ];
        transactions::where('id',$id)->update($data);
        return redirect()->to('transaksi')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transactions::where('id',$id)->delete();
        return redirect()->to('transaksi');
    }

    public function awalan()
    {
        return view('auth.login');
    }
}