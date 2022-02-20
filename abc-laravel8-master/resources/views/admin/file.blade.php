@extends('layouts.admin')

@section('title', 'Quản lý file')

@section('content')

<iframe src="{{url('filemanager/dialog.php')}}" style="width:100%; height:500px; overflow-y:auto; border:none">
</iframe>

@endsection
