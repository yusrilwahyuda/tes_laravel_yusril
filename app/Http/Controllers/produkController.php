<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class produkController extends Controller
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
            $data = products::where('name', 'like', "%$katakunci%")->paginate(3);
        }else{
        $data = products::orderBy('id','desc')->paginate(3);
        }
        return view('product.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $data =  [
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description
        ];
        products::create($data);
        return redirect()->to('product')->with('success', 'Berhasil menambahkan data');
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
        $data = products::where('id',$id)->first();
        return view('product.edit')->with('data',$data);
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
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $data =  [
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description
        ];
        products::where('id',$id)->update($data);
        return redirect()->to('product')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::where('id',$id)->delete();
        return redirect()->to('product');
    }

}
