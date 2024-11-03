<?php

namespace App\Http\Controllers;

use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use App\Models\Category;
class AdminControlleer extends Controller
{
   public function view_category(){
    $data=Category::all();

    return view('admin.category',compact('data'));
   }

   public function add_category(Request $request){
  $category= new Category;

  $category->category_name = $request->category;

$category->save();
//toastr()->timeout(10000)->closeButton()->addWarning('Category added successfully')
Flasher::addSuccess('Category added successfully');
return redirect()->back();
   }

   public function delete_category($id){
    $data=Category::find($id);
    $data->delete();
   
    return redirect()->back();
    toastr()->timeout(10000)->closeButton()->addSuccess('Category added successfully');
   }

   public function edit_category($id,Request $request)
   {
    $data=Category::find($id);
    return view('admin.edit_category',compact('data'));
   }
}
