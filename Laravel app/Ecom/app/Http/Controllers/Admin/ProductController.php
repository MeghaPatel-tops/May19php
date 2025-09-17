<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('catgory','products.catid','=','catgory.id')
            ->get();

        return view('Admin.Product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryData = DB::table('catgory')->get();
       
        return view('Admin.Product.create',['category'=>$categoryData]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validate = $request->validate([
            'catid'=>'required',
            'pname'=>'required',
            'price'=>'required',
            'description'=>'required',
            'pimage'=>'required',
            
         ]);
          $file = $request->file('pimage');
         $fileOriginalName = $file->getClientOriginalExtension();
        $fileNewName = time() .'.'. $fileOriginalName;
        $file->storeAs('uploads/product', $fileNewName, 'public');

         $insertProduct = [
            'catid'=>$request->catid,
            'pname'=>$request->pname,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=> $fileNewName,
            
         ];

         $result = DB::table('products')->insert($insertProduct);
         return redirect('/admin/product')->with('msg',"Data successfully inserted");

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
        $singleProduct = DB::table('products')->where('pid',$id)->first();
        // echo "<pre>";
        // print_r($singleProduct);
         $categoryData = DB::table('catgory')->get();
        return view('Admin.Product.edit',['category'=>$categoryData,'product'=>$singleProduct]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $validate = $request->validate([
            'catid'=>'required',
            'pname'=>'required',
            'price'=>'required',
            'description'=>'required',
        
         ]);

          if($file = $request->file('pimage')){
            $filePath = public_path('uploads/product/'.$request->img1); // Example path

            File::delete($filePath); 
                 $fileOriginalName = $file->getClientOriginalExtension();
                $fileNewName = time() .'.'. $fileOriginalName;
                $file->storeAs('uploads/product', $fileNewName, 'public');
         
        }
        else {
            $fileNewName = $request->img1;
        }
          $insertProduct = [
            'catid'=>$request->catid,
            'pname'=>$request->pname,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=> $fileNewName,
            
         ];

         $result = DB::table('products')->where('pid',$id)->update($insertProduct);
         return redirect('/admin/product')->with('msg',"Data successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       DB::table('products')->where('pid',$id)->delete();
       return redirect('/admin/product')->with('msg',"Data successfully Deleted");

    }
}
