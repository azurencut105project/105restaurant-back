@extends('backstage.layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <font color="#000000" face="微軟正黑體"><i class="fa fa-plus-circle"></i>新增餐點 </font>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    @include('backstage.layouts.partials.validation')

    <!-- /.row -->
    <div class="row justify-content-center">
        <form action="{{ route('backstage.chef.meal.index') }}" method="POST" role="form">{{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{--名稱--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('名稱') }}</font></label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        {{--照片--}}
                        <div class="form-group row">
                            <label for="photo" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('照片') }}</font></label>
                            <div class="col-md-8">
                                <input id="photo" type="text" class="form-control" name="photo" required>
                            </div>
                        </div>
                        {{--原料說明--}}
                        <div class="form-group row">
                            <label for="ingredients" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('原料說明') }}</font></label>
                            <div class="col-md-8">
                                <input id="ingredients" type="text" class="form-control" name="ingredients" required>
                            </div>
                        </div>
                        {{--價錢--}}
                        <div class="form-group row">
                            <label for="price" class="col-md-4" style="text-align:right;line-height:30px;"><font color="#000000" face="微軟正黑體" size="5">{{ __('價錢') }}</font></label>
                            <div class="col-md-8">
                                <input id="price" type="text" class="form-control" name="price" required>
                            </div>
                        </div>
                        {{--新增--}}
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="text-align:center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('送出') }}
                                </button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </form>
    </div>

@endsection