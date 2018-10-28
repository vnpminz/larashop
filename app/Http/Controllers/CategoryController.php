<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    public function getDanhSach()
   {
        $category = Category::all();
        return view('admin.category.list', ['category'=>$category]);
   }

   public function getThem()
   {
        return view('admin.category.add');
   }

   public function postThem(Request $request)
   {
        $this->validate($request, 
            [
                'category_name' => 'required|unique:categories,name|min:3|max:100'
            ],
            [
                'category_name.required' => 'Bạn chưa nhập tên loại sản phẩm',
                'category_name.unique' => 'Tên loại sản phẩm đã tồn tại',
                'category_name.min' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự',
                'category_name.max' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự'
            ]);
        
        $category = new Category;
        $category->name = $request->category_name;
        $category->description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        return redirect('admin/category/them')->with('thongbao','Category đã được thêm thành công');
   }

   public function getSua($id)
   {
        $category = Category::find($id);
        return view('admin.category.edit', ['category'=>$category]);
   }

   public function postSua(Request $request,$id)
   {
       $category = Category::find($id);
       $this->validate($request, 
            [
                'category_name'=>'required|unique:categories,name|min:3|max:100'
            ],
            [
                'category_name.required' => 'Bạn chưa nhập tên loại sản phẩm',
                'category_name.unique' => 'Tên loại sản phẩm đã tồn tại',
                'category_name.min' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự',
                'category_name.max' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự'
            ]);
        $category->name = $request->category_name;
        $category->description = $request->category_description;
        $category->save();

        return redirect('admin/category/sua/'.$id)->with('thongbao','Category đã được sửa thành công');
   }

   public function getXoa($id)
   {
       $category = Category::find($id);
       $category->delete();
       return redirect('admin/category/danhsach')->with('thongbao','Category đã xóa thành công');
   }
   public function unactive($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['publication_status'=> 2]);
            return redirect('admin/category/danhsach')->with('thongbao','Category đã kích hoạt thành công');
    }   

    public function active($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['publication_status'=> 1]);
            return redirect('admin/category/danhsach')->with('thongbao','Category đã hủy kích hoạt thành công');
    }
}
