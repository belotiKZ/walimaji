<?php

namespace App\Http\Controllers;

use App\Models\ProductInput;
use Illuminate\Http\Request;

class ProductInputController extends Controller
{
    //

    //enregistrement
    public function store(Request $request)
    {
        $product_input=new ProductInput($request->all(),[
                'type' => 'required',
                'designation' => 'required',
                'description' => 'required',
                'provider_id' => 'required',
                'initial_quantity' => 'required',
                'current_quantity' => 'required',
                'entry_date' => 'required'
        ]);

        $product_input->save();

        return view('/home');
    }

    //suppression
    public function delete($id)
    {
        $product_input=ProductInput::findOrFail($id);
        $product_input->delete();
        return view('/home');//vue de la page a retourner apres suppression
    }

    //affichage
    public function show()
    {
        return view('/voir',['productsInputs'=> ProductInput::all()]);

    }

    public function show_by_id($id)
    {
        return view('/voir',['productInput'=> ProductInput::where('id', $id)->get()]);

    }

    public function show_by_low_price()
    {
        return view('/voir',ProductInput::all()->orderBy('price','asc')->get());
    }

    public function show_by_higth_price()
    {
        return view('/voir',ProductInput::all()->orderBy('price','desc')->get());
    }




}
