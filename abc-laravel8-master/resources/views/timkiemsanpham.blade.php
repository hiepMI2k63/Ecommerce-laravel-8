
@extends('layouts.site')

@section('title','Sản phẩm')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-md-8">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" name="key" value="{{request()->key}}" class="form-control" placeholder="Từ khóa" aria-describedby="helpId">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Sanpham</th>
                <th>Đánh giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td scope="row">{{$d->tensampham}}</td>
                <td>{{$d->comment}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div >
    {{-- {{$data->appends(Request::all())->links()}} --}}

    {{-- <form id='formdelete' action="" method="post">
        @csrf @method('DELETE')
    </form> --}}
@endsection

{{-- @section('js')
<script>
    $(".btndelete").click(function(ev){
        ev.preventDefault();
        let _href=$(this).attr('href');
        $("form#formdelete").attr('action',_href);
        if (confirm('Bạn muốn xóa bản ghi này không?'))
        {
            $("form#formdelete").submit();
        }
    });
</script>
@endsection --}}
