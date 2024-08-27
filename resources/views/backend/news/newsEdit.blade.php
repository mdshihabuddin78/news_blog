

@extends('backend.layouts.master')

@section('header')
    <link href="{{asset('backend/plugin/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@endsection

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
                    <h1 class="h5 mb-2 text-gray-800">News Edit</h1>
                </div>
                <div class="col-md-6 text-right mb-2">
                    <a href="{{route('news.index')}}" class="btn btn-primary">News List</a>

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

                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <span class="tect-success">  {{\Illuminate\Support\Facades\Session::has('success')?\Illuminate\Support\Facades\Session::get('success'):''}}</span>
                            <input type="hidden"name="id" value="{{$news->id}}">
                            <div class="form-group">

                                <label>Category Name</label>
                                <select class="form-control category_select" name='category_id'>
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $news->category_id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    {{$errors->has('category_name') ? $errors->first('category_name') :''}}</span>

                            </div>
                            <div class="form-group">
                                <label style="width: 100px">Title</label>
                                <input class="form-control" name='title' value="{{$news->title}}">
                                <span class="text-danger">
                                    {{$errors->has('title') ? $errors->first('title') :''}}</span>
                            </div>

                            <div class="form-group">
                                <label>Details</label>
                                <textarea id="mytextarea" class="form-control" name='details'>{{$news->details}}</textarea>
                                <span class="text-danger">
                                    {{$errors->has('details') ? $errors->first('details') :''}}</span>

                            </div>
                        <div class="form-group">
                                <label>thumbnail</label>
                                <input type="file" name='thumbnail'{{$news->thumbnail}}>
                                <span class="text-danger">
                                    {{$errors->has('thumbnail') ? $errors->first('thumbnail') :''}}</span>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--/span-->

        </div><!--/row-->
    </div>

@endsection

@section('script')
    <script src="{{asset('backend/plugin/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('backend/plugin/select2/dist/js/select2.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            menubar:false,
            statusbar: false,
            plugins: "powerpaste advcode searchreplace autolink directionality code visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave",
            toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat | code",
            height: "700px",
        });
    </script>
    <script>
        $('.category_select').select2();
    </script>
@endsection



