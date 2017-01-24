<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use Validator;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions=Transactions::with('Customers')->orderBy('created_at')->paginate(10);
        return $transactions;
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
        $validate = Validator::make($request->all(), ['name'=>'required|min:5|max:16',
        'amount'=>'required|min:5|max:16', 'customer_id'/*=>'required|customer_id|unique:transactions,customer_id'*/,]);

       if ($validate->fails()) {
           return response(['menssage'=>'El formulario contiene errores !! ', 'error'=>$validate->errors(),], 401);
       }

       //ya los datos estan validados
       //crea el cliente
       $transaction=transactions::create($request->all());

       //si se crea con exito el cliente en la base de datos
       if ($transaction) {
           //responde ok.
           //
           return response(['menssage'=>'El cliente se creo satisfactoriamente', 'error' =>$transaction->id,], 200);
       }
       //n se crea con exito el cliente
       return response(['menssage'=>'El cliente no se pudo crear',], 500);
       //return response(['menssage'=>trans('El cliente no se pudo crear'),], 500);
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
        $validate = Validator::make($request->all(), ['name'=>'required|min:5|max:16',
        'amount'=>'required|min:5|max:16', 'customer_id'/*=>'required|customer_id|unique:transactions,customer_id'*/,]);

       if ($validate->fails()) {
           return response(['menssage'=>'El formulario contiene errores !! ', 'error'=>$validate->errors(),], 401);
       }

      
       //ya los datos estan validados
       //crea el cliente
       $transaction=Transactions::find($id);

       //si se crea con exito el cliente en la base de datos
       if ($transaction) {
           //responde ok.
           //
           $update = $transaction->update($request->all());
           return response(['menssage'=>'El cliente actualizo satisfactoriamente', 'error' =>$transaction->id,], 200);
       }
       //n se crea con exito el cliente
       return response(['menssage'=>'El cliente no se pudo actualizar',], 500);
       //return response(['menssage'=>trans('El cliente no se pudo crear'),], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $transaction=Transactions::destroy($id);

       //si se crea con exito el cliente en la base de datos
       if ($transaction) {
           return response(['menssage'=>'El cliente se elimino satisfactoriamente', 'id' =>$id,], 200);
       }
       //n se crea con exito el cliente
       return response(['menssage'=>'El cliente no se pudo eliminar','id' =>$id,], 401);
       //return response(['menssage'=>trans('El cliente no se pudo crear'),], 500);
    }
}
