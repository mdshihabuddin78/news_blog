
@extends('backend.layouts.master')

@section('dashboard_content')


    <div id="content" class="span10">

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Tables</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1 class="h5 mb-2 text-gray-800" style="padding: 20px;">Category Add  </h1>
                </div>
                <div class="col-md-6 text-right mb-2">
                    <a href="{{route('admin_catelist')}}" class="btn btn-primary">Category List</a>

                </div>

            </div>


            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>

                </div>


                <div class="box-content">

                    <div class="card-body">
                        <form method="post" action="{{route('cat.submit')}}">
                            {{csrf_field()}}
                            <span class="text-success">  {{\Illuminate\Support\Facades\Session::has('Success')?\Illuminate\Support\Facades\Session::get('Success'):''}}</span>
                            <div class="form-group">
                                <label style="width: 100px">Category Name</label>
                                <input class="form-control" name='category_name'>
                                <span class="text-danger">
                                    {{$errors->has('category_name') ? $errors->first('category_name') :''}}</span>

                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <textarea class="form-control" name="details"></textarea>
                                <span class="text-danger">
                                    {{$errors->has('details') ? $errors->first('details') :''}}</span>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection

