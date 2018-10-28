<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use DB;
use App\Category;

class BrandController extends Controller
{
   public function getDanhSach()
   {
       $brand = Brand::all();
       return view('admin.brand.list', ['brand'=>$brand]);
   }

   public function getThem()
   {
        $category = Category::all();
        return view('admin.brand.add',['category'=>$category]);
   }

   public function postThem(Request $request)
   {
        $this->validate($request, 
            [
                'brand_name' => 'required|unique:brands,name|min:3|max:100',
                'category_name'=>'required'
            ],
            [
                'brand_name.required' => 'Bạn chưa nhập tên thương hiệu',
                'brand_name.unique' => 'Tên thương hiệu đã tồn tại',
                'brand_name.min' => 'Tên thương hiệu phải có độ dài từ 3 đến 100 kí tự',
                'brand_name.max' => 'Tên thương hiệu phải có độ dài từ 3 đến 100 kí tự',
                'category_name'=> 'Bạn chưa chọn Category'
            ]);
        
        $brand = new Brand;
        $brand->name = $request->brand_name;
        $brand->id_category = $request->category_name;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        return redirect('admin/brand/them')->with('thongbao','Brand đã được thêm thành công');
   }

   public function getSua($id)
   {    
        $category = Category::all();
        $brand = Brand::find($id);
        return view('admin.brand.edit', ['brand'=>$brand,'category'=>$category]);
   }

   public function postSua(Request $request,$id)
   {
        $category = Category::all();
        $brand = Brand::find($id);
        $this->validate($request, 
            [
                'brand_name'=>'required|unique:brands,name|min:3|max:100',
                'category_name'=>'required'
            ],
            [
                'brand_name.required' => 'Bạn chưa nhập tên thương hiệu',
                'brand_name.unique' => 'Tên thương hiệu đã tồn tại',
                'brand_name.min' => 'Tên thương hiệu phải có độ dài từ 3 đến 100 kí tự',
                'brand_name.max' => 'Tên thương hiệu phải có độ dài từ 3 đến 100 kí tự',
                'category_name'=> 'Bạn chưa chọn Category'
            ]);
        $brand->name = $request->brand_name;
        $brand->id_category = $request->category_name;
        $brand->save();

        return redirect('admin/brand/sua/'.$id)->with('thongbao','Brand đã được sửa thành công');
   }

   public function getXoa($id)
   {
       $brand = Brand::find($id);
       $brand->delete();
       return redirect('admin/brand/danhsach')->with('thongbao','Brand đã xóa thành công');
   }
   public function unactive($id)
    {
        DB::table('brands')
            ->where('id', $id)
            ->update(['publication_status'=> 2]);
            return redirect('admin/brand/danhsach')->with('thongbao','Brand đã kích hoạt thành công');
    }   

    public function active($id)
    {
        DB::table('brands')
            ->where('id', $id)
            ->update(['publication_status'=> 1]);
            return redirect('admin/brand/danhsach')->with('thongbao','Brand đã hủy kích hoạt thành công');
    }
} 