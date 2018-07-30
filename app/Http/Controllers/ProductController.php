<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //ajout un nouveau product
    public function store(Request $request)
    {
        $produc=new Product(
            $request->all()
        );

        $produc->save();

        return view('/home');//page de redirection apres ajout

    }

    //retourne tous les products
    public function show()
    {

        return view('/voir',['products'=> Product::all()]); //remplacer la vue par #voir par le nom de la vue a retourner
    }

    //retourne un product sur base de son id
    public function show_by_id_user($id_user)
    {
        view('/voir',['product'=> Product::where('id', $id_user)->get()]);//remplacer la vue par #voir par le nom de la vue a retourner page du product
    }


    //supprimer un product
    public function destroy($id_user)
    {
        $product=Product::findOrFail($id_user);
        $product->delete();
        return view('/home');//vue de la page a retourner apres suppression
    }

    public function update(Request $request,$id_user)
    {
        $product=Product::findOrFail($id_user);
        $input = $request->all();

        $product->fill($input)->save();

        return view('/home'); //changer home par la vue a retourner


    }

}
