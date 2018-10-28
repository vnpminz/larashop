<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Category;
use App\Brand;

class ProductController extends Controller
{
    public function getDanhSach()
   {
       $product = Product::orderBy('id', 'DESC')->get();
       return view('admin.product.list', ['product'=>$product]);
   }

   public function getThem()
   {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.add',['category'=>$category,'brand'=>$brand]);
   }

   public function postThem(Request $request)
   {
        $this->validate($request, 
            [
                'brand_name' =>'required',
                'product_name' => 'required|unique:products,name|min:3|max:100',
                'product_description'=>'required'
            ],
            [
                'product_name.required' => 'Bạn chưa nhập tên loại sản phẩm',
                'product_name.unique' => 'Tên loại sản phẩm đã tồn tại',
                'product_name.min' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự',
                'product_name.max' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự',
                'product_description.required'=>'Bạn phải nhập mô tả cho sản phẩm',
                'brand_name.required'=>'Bạn chưa chọn thương hiệu'
            ]);
        $product = new Product;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->id_brand = $request->brand_name;
        $product->id_category = $request->category_name;
        $product->size = $request->product_size;
        $product->price = $request->product_price;
        $product->color = $request->product_color;
        $product->publication_status = $request->publication_status;

        if($request->hasFile('product_image')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('product_image'); // Nhận file hình ảnh người dùng upload lên server
            
            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
            {
                return redirect('admin/product/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while(file_exists('upload/product_image/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = str_random(4).'_'.$img_file_name;
            }
            echo $random_file_name;

            $img_file->move('upload/product_image/',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $product->image = $random_file_name;
        }
        else
            $product->image = ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $product->save();

        return redirect('admin/product/them')->with('thongbao','Product đã được thêm thành công');
   }

   public function getSua($id)
   {
        $category = Category::all();
        $brand = Brand::all();
        $product = Product::find($id);
        return view('admin.product.edit', ['product'=>$product,'category'=>$category,'brand'=>$brand]);
   }

   public function postSua(Request $request,$id)
   {
       $product = Product::find($id);
       $this->validate($request, 
            [
                'product_name'=>'required|unique:categories,name|min:3|max:100'
            ],
            [
                'product_name.required' => 'Bạn chưa nhập tên loại sản phẩm',
                'product_name.unique' => 'Tên loại sản phẩm đã tồn tại',
                'product_name.min' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự',
                'product_name.max' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 100 kí tự'
            ]);
            $product->name = $request->product_name;
            $product->description = $request->product_description;
            $product->id_brand = $request->brand_name;
            $product->id_category = $request->category_name;
            $product->size = $request->product_size;
            $product->price = $request->product_price;
            $product->color = $request->product_color;
    
            if($request->hasFile('product_image')) // Kiểm tra xem người dùng có upload hình hay không
            {
                $img_file = $request->file('product_image'); // Nhận file hình ảnh người dùng upload lên server
                
                $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh
    
                if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
                {
                    return redirect('admin/product/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
                }
    
                $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh
    
                $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
                while(file_exists('upload/product_image/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
                {
                    $random_file_name = str_random(4).'_'.$img_file_name;
                }
                echo $random_file_name;
    
                $img_file->move('upload/product_image/',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
                $product->image = $random_file_name;
            }
            else
                $product->image = ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng
    
            $product->save();

        return redirect('admin/product/sua/'.$id)->with('thongbao','Product đã được sửa thành công');
   }

   public function getXoa($id)
   {
       $product = Product::find($id);
       $product->delete();
       return redirect('admin/product/danhsach')->with('thongbao','Product đã xóa thành công');
   }
   public function unactive($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['publication_status'=> 2]);
            return redirect('admin/product/danhsach')->with('thongbao','Product đã kích hoạt thành công');
    }   

    public function active($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['publication_status'=> 1]);
            return redirect('admin/product/danhsach')->with('thongbao','Product đã hủy kích hoạt thành công');
    }
}
