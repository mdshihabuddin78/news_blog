@extends('frontend.master')
@section('content')
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                @if(count($news)>0)
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">category: {{$category->category_name}}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="/">View All</a>
                            </div>
                        </div>
                        @foreach($news as $new)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{env('STORAGE_PATH')}}/{{$new->thumbnail}}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">
                                                {{@$new->category->category_name}}</a>
                                            <a class="text-body" href=""><small>{{date('M d, Y', strtotime($new->date))}}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $new->id)}}">{!!substr_replace($new->title, "...", 25) !!}</a>
                                        <p class="m-0">{!!substr_replace($new->details, "...", 100) !!}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{asset('frontend/img/Sh.png')}}" width="25" height="25" alt="">
                                            <small>{{@$new->author->name}}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$new->view_count}}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                @else
                        <!-- 404 Not Found Design -->
                        <div class="error-page text-center py-5" style="min-height: 60vh;">
                            <h1 class="display-1 font-weight-bold text-danger">404</h1>
                            <h2 class="text-uppercase font-weight-bold mb-3">Oops! Page Not Found</h2>
                            <p class="text-muted mb-4">
                                Sorry, we couldn't find the page you were looking for. It might have been moved or deleted.
                            </p>
                            <a href="{{ url('/') }}" class="btn btn-primary btn-lg text-uppercase">
                                <i class="fas fa-home mr-2"></i>Back to Home
                            </a>
                        </div>
                    @endif

                <div class="row">
                    <div class="col-12">
                        <div>{{ $news->links('pagination::bootstrap-5') }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection