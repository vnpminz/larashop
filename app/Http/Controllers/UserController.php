<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }

    public function getThem()
    {
        return view('admin.user.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'user_name'=>'required|min:3',
            'user_email'=>'required|email|unique:users,email',
            'user_password'=>'required|min:3|max:32',
            'user_passwordagain'=>'required|same:user_password'
        ],
        [
            'user_name.required'=>'Bạn chưa nhập tên người dùng',
            'user_name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
            'user_email.required'=>'Bạn chưa nhập email',
            'user_email.email'=>'Bạn chưa nhập đúng định dạng email',
            'user_email.unique'=>'Email đã tồn tại',
            'user_password.required'=>'Bạn chưa nhập mật khẩu',
            'user_password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'user_password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
            'user_passwordagain.required'=>'Bạn chưa nhập lại mật khẩu',
            'user_passwordagain.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);

        $user = new User;
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->password = bcrypt($request->user_password);
        $user->status = $request->status;
        $user->permission = $request->level;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'user_name'=>'required|min:3',
        ],
        [
            'user_name.required'=>'Bạn chưa nhập tên người dùng',
            'user_name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
        ]);

        $user = User::find($id);
        $user->name = $request->user_name;

        if($request->changePassword == "on")
        {
            $this->validate($request,
        [
            'user_password'=>'required|min:3|max:32',
            'user_passwordagain'=>'required|same:user_password'
        ],
        [
            'user_password.required'=>'Bạn chưa nhập mật khẩu',
            'user_password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'user_password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
            'user_passwordagain.required'=>'Bạn chưa nhập lại mật khẩu',
            'user_passwordagain.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
            $user->password = bcrypt($request->user_password);
        }
        $user->permission = $request->level;
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

    public function getXoa($id)
    {
        $product = User::find($id);
        $product->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
    public function unactive($id)
     {
         DB::table('users')
             ->where('id', $id)
             ->update(['status'=> 2]);
             return redirect('admin/user/danhsach')->with('thongbao','User đã kích hoạt thành công');
     }   
 
     public function active($id)
     {
         DB::table('users')
             ->where('id', $id)
             ->update(['status'=> 1]);
             return redirect('admin/user/danhsach')->with('thongbao','User đã hủy kích hoạt thành công');
     }

     public function getLoginAdmin()
     {
        return view('admin.login');
     }

     public function postLoginAdmin(Request $request)
     {
        $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu không được ít hơn 3 ký tự',
            'password.max'=>'Mật khẩu không được lớn hơn 32 ký tự'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
           return redirect('admin/category/danhsach'); 
        }
        else
        {
            return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
        }
     }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
} 