<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class QuanLyNguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=User::paginate(15);

        if ($key=request()->key){
            $data=User::where('name','like','%'.$key.'%')->paginate(15);
        }

        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => 'required',
                "email" => 'required|email|unique:users',
                "password" => 'required|confirmed',
            ],
            [
                "name.required" => "Tên không được để trống",
                "email.required" => "Email không được để trống",
                "email.unique" => "Email đã tồn tại nhé baby",
                "email.email" => "Email không đúng định dạng",
                "password.required" => "Mật khẩu không được để trống",
                "password.confirmed" => "Nhập lại mật khẩu không chính xác",
            ]
        );
        $password = bcrypt($request->password);
        $request->merge(['password' => $password,
                            // 'test' => '12312', thêm parameter vào trong parameters
                        ]);

        $dataArray = array(
            "name" => $request->name,
            "email" => $request->email,

            "password" => $request->password
        );

        $user = User::create($dataArray);
        auth()->login($user);
        return redirect()->route('home');;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

       return view('admin.user.edit',compact('user'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->email = $request->email;

        $user->name = $request->name;
        $user->password= $request->password;

        $user->save();
        return redirect()->route('admin.usermanagement.index')->with('success','Cập nhật thông tin thành công.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.usermanagement.index')->with('success','Xóa thông tin thành công.');
    }
}
