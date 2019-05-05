@extends('backstage.manager.layouts.master')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <font color="#000000" face="微軟正黑體"><i class="fa fa-users"></i> 人員管理 <small>所有人員列表</small></font>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align:right">
    <div class="col-lg-12">
        <a href="{{ route('backstage.manager.staff.create') }}" class="btn btn-success"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-plus-circle"></i> 新增人員</font></a>
    </div>
</div>
<!-- /.row -->
<font color="#000000" face="微軟正黑體" style="text-align: center">
<div class="row">
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" style="border:3px #9BA2AB solid;">
                <thead style="border:2px #9BA2AB solid;">
                    <tr style="background-color: lightgrey;">
                        <th width="80" style="text-align: center">姓名</th>
                        <th width="80" style="text-align: center">職稱</th>
                        <th width="120" style="text-align: center">信箱</th>
                        <th width="120" style="text-align: center">電話</th>
                        <th width="200" style="text-align: center">地址</th>
                        <th width="100" style="text-align: center">修改</th>
                        <th width="100" style="text-align: center">刪除</th>
                    </tr>
                </thead>
                <tbody style="border:3px #9BA2AB solid;">
                @foreach($staff as $sf)
                    <tr>
                        <td>{{$sf->name}}</td>
                        <td>{{$sf->position}}</td>
                        <td>{{$sf->email}}</td>
                        <td>{{$sf->phone}}</td>
                        <td>{{$sf->address}}</td>
                        <td><a href="{{ route('backstage.manager.staff.edit',$sf->id) }}" class="btn btn-info" style="text-decoration:none;"><i class="fa fa-edit"></i> 修改</a></td>
                        <td><form action="{{ route('backstage.manager.staff.destroy', $sf->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button  class="btn btn-danger"><i class="fa fa-trash"></i> 刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</font>

<script>
    function ConfirmDelete()
    {
        var x = confirm("確定要刪除該人員帳號嗎?");
        if (x)
            return true;
        else
            return false;
    }
</script>
<!-- /.row -->
@endsection
