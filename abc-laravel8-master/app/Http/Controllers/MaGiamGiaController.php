<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magiamgia;

class MaGiamGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($key=request()->key){
            $data = Magiamgia::where('ten', 'like', '%'.$key.'%')->orderby('phan_tram','DESC')->paginate(5);
        }
        else {
            $data = Magiamgia::orderby('phan_tram','DESC')->paginate(5);
        }
        return view('admin.magiamgia.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.magiamgia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'ten_ma'=>'required',
            'phan_tram'=>'required',
            'note'=>'required',
            'ngay_het_han'=>'required',

        ],
        [
            'ten_ma.required' => 'Cần nhập tên nhóm sản phẩm',
            'phan_tram.required' => 'Phần trăm giảm giá',
            'note.required' => "Cần nhập hạn sử dụng",
            'ngay_het_han.required' => "Cần nhập mức độ ưu tiên",

        ]
        );

        if (Magiamgia::create($request->all())){
            return redirect()->route('admin.magiamgia.index')->with('success','Thêm mới thành công.');
        }
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
        $magiamgia = Magiamgia::find($id);

        return view('admin.magiamgia.edit',compact('magiamgia'));
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
       dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $magiamgia = Magiamgia::find($id);
       $magiamgia->delete();//returns true/false
        return redirect()->route('admin.magiamgia.index')->with('success','Xóa bản ghi thành công.');
    }
}
