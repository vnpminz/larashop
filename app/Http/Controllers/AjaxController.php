<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use DB;
use App\Category;

class AjaxController extends Controller
{
    public function getBrand($id_category)
    {
        $brand = Brand::where('id_category',$id_category)->get();
        foreach($brand as $br)
        {
            echo "<option value='".$br->id."'>".$br->name."</option>";
        }
    }
} 
?>