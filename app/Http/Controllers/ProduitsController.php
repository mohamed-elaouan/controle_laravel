<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Produits;
use App\Http\Requests\StoreProduitssRequest;
use App\Http\Requests\UpdateProduitssRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProduitsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only("name_Méthode");
        $this->middleware('auth')->except("index");
        //$this->middleware('auth'); //For all methodes
    }
    public function index()
    {
        //$ListArticle = Produits::paginate(2);
        $ListArticle = Produits::all();

        //dd(Auth::id()); // get id user
        return view("Pages.CRUD.Articles", compact("ListArticle"));
    }
    public function create()
    {
        return view("Pages.CRUD.AjtArt");
    }
    public function store(ProduitRequest $request) //StoreProduitsRequest $request
    {
        $formField = $request->validated();
        if ($request->hasFile('image3')) {
            $formField['image3'] = $request->file('image3')->store("ProduitsImages", "public");
        } else {
            $formField['images3'] = "not found";
        }
        if ($request->hasFile('image4')) {
            $formField['image4'] = $request->file('image4')->store("ProduitsImages", "public");
        } else {
            $formField['images4'] = "not found";
        }
        $formField['image1'] = $request->file('image1')->store("ProduitsImages", "public");
        $formField['image2'] = $request->file('image2')->store("ProduitsImages", "public");

        Produits::create($formField);
        return to_route("Produit.index")->with('Success', "Ajoutée bien Succee");
    }
    public function show($id)
    {
        $Art = Produits::find($id);
        return view("Pages.CRUD.Detail", compact("Art"));
    }

    public function edit($id)
    {
        $article = Produits::find($id);
        // if (Gate::allows('AccePers', $article)) {
        //     abort(403);
        // }
        //Gate::authorize('AccePers', $article);
        return view("Pages.CRUD.EditArt", compact("article"));
    }
    //UpdateProduitsRequest
    public function update(ProduitRequest $request)
    {

        $formField = $request->validated();
        if ($request->hasFile('image3')) {
            $formField['image3'] = $request->file('image3')->store("ProduitsImages", "public");
        } else {
            $formField['images3'] = "not found";
        }
        if ($request->hasFile('image4')) {
            $formField['image4'] = $request->file('image4')->store("ProduitsImages", "public");
        } else {
            $formField['images4'] = "not found";
        }
        $formField['image1'] = $request->file('image1')->store("ProduitsImages", "public");
        $formField['image2'] = $request->file('image2')->store("ProduitsImages", "public");

        $arti = Produits::find($request->id);
        dd(Auth::user()->role);
        $arti->prix = $formField['prix'];
        $arti->image1 = $formField['image1'];
        $arti->image2 = $formField['image2'];
        $arti->image3 = $formField['image3'];
        $arti->image4 = $formField['image4'];
        $arti->description = $formField['description'];
        $arti->save();
        return to_route("Produit.index")->with('Success', "Bien Modifier");
    }


    //!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /*remarque ne oublier pas mettre ça en model
        protected $fillable = [
            'name',
            'email',
            "password",
            'PhotoURL',
            'bio',
        ];*/
    public function destroy($id)
    {
        $article = Produits::find($id);
        $this->authorize("delete", $article);
        $article->delete();
        return redirect()->route("Produit.index")->with('Success', "Bien Suprimer");
    }
}
