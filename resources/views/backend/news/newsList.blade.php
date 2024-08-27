
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
                    <h1 class="h5 mb-2 text-gray-800" style="padding: 20px;">News_List</h1>
                </div>
                <div class="col-md-6 text-right mb-2">
                    <a href="{{ route('news.create') }}" class="btn btn-primary">Add News</a>
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
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Si</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $key => $value)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th>{{ $value->title }}</th>
                                <th><img style="width: 50px" src="{{ env('STORAGE_PATH') }}/{{ $value->thumbnail }}"></th>
                                <th>{{ $value->date }}</th>
                                <th>{{ $value->user_name }}</th>
                                <th>
                                    <a href="{{ route('news.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('news.destroy', $value->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="box-content" >
                        <div class="table table-striped table-bordered">
                            <div>{{ $news->links() }}</div>
                        </div>
                    </div>
                </div>
            </div><!--/span-->
        </div><!--/row-->
    </div>
@endsection
