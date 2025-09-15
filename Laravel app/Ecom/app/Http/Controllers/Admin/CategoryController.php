<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 



use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories= DB::table('catgory')->get();
         return view('Admin.Category.index',["catData"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'categoryname'=>'required',
            'categoryimage'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $file = $request->file('categoryimage');
         $fileOriginalName = $file->getClientOriginalExtension();
        $fileNewName = time() .'.'. $fileOriginalName;
        $file->storeAs('uploads/category', $fileNewName, 'public');
         
         $result= DB::table('catgory')->insert([
            'cname'=>$request->categoryname,
            'cimage'=> $fileNewName,
          
         ]);

         if($result){
              return redirect()->route('category.index');
         }





    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $singleCat = DB::table('catgory')->where('id',$id)->first();
          return view('Admin.Category.edit',['singleCat'=>$singleCat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validate = $request->validate([
            'categoryname'=>'required',
        ]);
          $fileNewName="";
        if($file = $request->file('categoryimage')){
            $filePath = public_path('uploads/category/'.$request->img1); // Example path

            File::delete($filePath); 
                 $fileOriginalName = $file->getClientOriginalExtension();
                $fileNewName = time() .'.'. $fileOriginalName;
                $file->storeAs('uploads/category', $fileNewName, 'public');
         
        }
        else {
            $fileNewName = $request->img1;
        }
        
         $result= DB::table('catgory')->where('id',$id)->update([
            'cname'=>$request->categoryname,
            'cimage'=> $fileNewName,
          
         ]);

         if($result){
              return redirect()->route('category.index');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('catgory')->where('id',$id)->delete();
        return redirect()->route('category.index');
    }
}
