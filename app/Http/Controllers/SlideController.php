<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use DB;

class SlideController extends Controller
{
    public function getDanhSach()
   {
       $slide = Slide::all();
       return view('admin.slide.list', ['slide'=>$slide]);
   }

   public function getThem()
   {
        $slide = Slide::all();
        return view('admin.slide.add',['slide'=>$slide]);
   }

   public function postThem(Request $request)
   {
        $this->validate($request, 
            [
                'slide_image' =>'required',
                'slide_name' =>'required'
            ],
            [
                'slide_image.required' => 'Bạn chưa chọn ảnh slide',
                'slide_name.required' => 'Bạn chưa nhập tên cho slide',
            ]);
        $slide = new Slide;
        $slide->publication_status = $request->publication_status;

        if($request->hasFile('slide_image')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('slide_image'); // Nhận file hình ảnh người dùng upload lên server
            
            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
            {
                return redirect('admin/slide/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while(file_exists('upload/slide_image/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = str_random(4).'_'.$img_file_name;
            }
            echo $random_file_name;

            $img_file->move('upload/slide_image/',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $slide->image = $random_file_name;
        }
        else
            $slide->image = ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $slide->save();

        return redirect('admin/slide/them')->with('thongbao','Slide đã được thêm thành công');
   }

   public function getSua($id)
   {
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide'=>$slide]);
   }

   public function postSua(Request $request,$id)
   {
       $this->validate($request, 
            [
                'slide_image' =>'required',
                'slide_name' =>'required'
            ],
            [
                'slide_image.required' => 'Bạn chưa chọn ảnh slide',
                'slide_name.required' => 'Bạn chưa nhập tên cho slide'
            ]);
            $slide = Slide::find($id);
            if($request->hasFile('slide_image')) // Kiểm tra xem người dùng có upload hình hay không
            {
                $img_file = $request->file('slide_image'); // Nhận file hình ảnh người dùng upload lên server
                
                $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh
    
                if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
                {
                    return redirect('admin/slide/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
                }
    
                $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh
    
                $random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
                while(file_exists('upload/slide_image/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
                {
                    $random_file_name = str_random(4).'_'.$img_file_name;
                }
                echo $random_file_name;
                unlink('upload/slide_image/'.$slide->image);
                $img_file->move('upload/slide_image/',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
                $slide->image = $random_file_name;
            }
    
            $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('thongbao','Slide đã được sửa thành công');
   }

   public function getXoa($id)
   {
       $slide = Slide::find($id);
       $slide->delete();
       return redirect('admin/slide/danhsach')->with('thongbao','Slide đã xóa thành công');
   }
   public function unactive($id)
    {
        DB::table('slides')
            ->where('id', $id)
            ->update(['publication_status'=> 2]);
            return redirect('admin/slide/danhsach')->with('thongbao','Slide đã kích hoạt thành công');
    }   

    public function active($id)
    {
        DB::table('slides')
            ->where('id', $id)
            ->update(['publication_status'=> 1]);
            return redirect('admin/slide/danhsach')->with('thongbao','Slide đã hủy kích hoạt thành công');
    }
}
