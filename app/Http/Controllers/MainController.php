<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Category;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home()
    {
        // https://lumen.laravel.com/docs/6.x/database#basic-usage

        //$results = DB::select("SELECT * FROM tasks");
        //dump($results);

        $category = new Category();

        // https://laravel.com/docs/6.x/eloquent#retrieving-models

        // dump($category::all());
        // dump toutes les catégories

        // dump($category::find(2));
        // dump la catégorie dont l'id est 2

        // dump($category::find([1,4]));
        // dump les catégories dont l'id est 1 et 4

        // dump($category::where('id', 4)->get());
        // dump la catégorie dont l'id est 4

        //$category->name = 'new category YATA 2';
        //$category->status = 2;
        //$category->save();
        // créé une nouvelle catégorie ayant le statut 2

        // $category::destroy([5,6]);
        // supprime les catégories dont l'id est 5 et 6
    }

    //
}
