<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class CollectionController extends Controller
{
    public function collection_class(){

        //Create a new collection using Collection class
        $collection1 = new Collection([67,34,89,56,23]);
    
        //dump the variable content in the browser
        dd($collection1);
    }
}
