@extends('frontend.master')
@section('content')

    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">

                <div class="owl-carousel main-carousel position-relative">
                    @foreach($slides as $slide)
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="{{ env('STORAGE_PATH') }}/{{ $slide->thumbnail }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    @if($slide->category)
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                           href="{{ route('wb.cat', $slide->category->id) }}">
                                            {{ __('app.slide.' . strtoupper($slide->category->category_name)) }}
                                        </a>
                                    @endif
                                    <a class="text-white" href="">{{ date('M d, Y', strtotime($slide->date)) }}</a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                   @if($slide->category) href="{{ route('wb.cat', $slide->category->id) }}" @endif>
                                    {{ \Illuminate\Support\Str::limit($slide->title, 26, '....') }}
                                </a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach($news as $new)
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="{{ env('STORAGE_PATH') }}/{{ $new->thumbnail }}" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        @if($new->category)
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                               href="{{ route('wb.cat', $new->category->id) }}">
                                                {{ __('app.slide.' . strtoupper($new->category->category_name)) }}
                                            </a>
                                        @endif
                                        <a class="text-white" href="">
                                            <small>{{ date('M d, Y', strtotime($new->date)) }}</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                       href="{{ route('wb.news', $new->id) }}">
                                        {{ \Illuminate\Support\Str::limit($new->title, 26, '....') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">{{ __('app.Breaking News') }}</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                             style="width: calc(100% - 170px); padding-right: 90px;">
                            @foreach($slides as $slide)
                            <div class="text-truncate">
                                <a class="text-white text-uppercase font-weight-semi-bold" href="{{route('wb.news', @$slide->id)}}">{{substr_replace($slide->title,"....",150)}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">{{ __('app.FEATURED NEWS') }}</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach($slider as $slide)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="{{ env('STORAGE_PATH') }}/{{ $slide->thumbnail }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                @if($slide->category)
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                       href="{{ route('wb.cat', $slide->category->id) }}">
                                        {{ __('app.slides.' . strtoupper($slide->category->category_name)) }}
                                    </a>
                                @endif
                                <a class="text-white" href="">{{ \Carbon\Carbon::parse($slide->date)->format('M d, Y') }}</a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                               href="{{ route('wb.news', $slide->id) }}">
                                {{ \Illuminate\Support\Str::limit($slide->title, 26, '....') }}
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">


                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">{{ __('app.LATEST NEWS') }}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>

                        </div>
                        @foreach($slaide as $news)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" style="width: 100px; height: 150px"
                                         src="{{ env('STORAGE_PATH') }}/{{ $news->thumbnail }}"
                                         style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            @if($news->category)
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                   href="{{ route('wb.cat', $news->category->id) }}">
                                                    {{ __('app.news.' . strtoupper($news->category->category_name)) }}
                                                </a>
                                            @endif
                                            <a class="text-body" href="">
                                                {{ \Carbon\Carbon::parse($news->date)->format('M d, Y') }}
                                            </a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                           href="{{ route('wb.news', $news->id) }}">
                                            {{ \Illuminate\Support\Str::limit($news->title, 22, '....') }}
                                        </a>
                                        <p class="m-0">
                                            {!! \Illuminate\Support\Str::limit($news->details, 80, '....') !!}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset('frontend/img/Sh.png') }}"
                                                 width="25" height="25" alt="">
                                            <small>{{ optional($news->author)->name }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $news->view_count }}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{--                        @foreach($content_2 as $content)--}}
{{--                            <div class="col-lg-6">--}}

{{--                                <div class="position-relative mb-3">--}}
{{--                                    <img class="img-fluid w-100" style="height: 150px; width: 100px" src="{{env('STORAGE_PATH')}}/{{$content->thumbnail}}" style="object-fit: cover;">--}}
{{--                                    <div class="bg-white border border-top-0 p-4">--}}
{{--                                        <div class="mb-2">--}}
{{--                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"--}}
{{--                                               href="{{route('wb.cat', @$content->category->id)}}">{{@$content->category->category_name}}</a>--}}
{{--                                            <a class="text-body" href="">{{date('M d, Y', strtotime($content->date))}}</a>--}}
{{--                                        </div>--}}
{{--                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', @$content->id)}}">{{substr_replace($content->title,"....",25)}}</a>--}}
{{--                                        <p class="m-0">{!!substr_replace($content->details,"....",70)!!}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <img class="rounded-circle mr-2" src="{{asset('frontend/img/Sh.png') }}" width="25" height="25" alt="">--}}
{{--                                            <small>{{@$content->author->name}}</small>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$content->view_count}}</small>--}}
{{--                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        @endforeach--}}

                        @foreach($Slaider as $small)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid" style="width: 100px; height: 100px;"
                                         src="{{ env('STORAGE_PATH') }}/{{ $small->thumbnail }}" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            @if($small->category)
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                                   href="{{ route('wb.cat', $small->category->id) }}">
                                                    {{ __('app.small.' . strtoupper($small->category->category_name)) }}
                                                </a>
                                            @endif
                                            <a class="text-body" href="">
                                                <small>{{ \Carbon\Carbon::parse($small->date)->format('M d, Y') }}</small>
                                            </a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                           href="{{ route('wb.news', $small->id) }}">
                                            {{ \Illuminate\Support\Str::limit($small->title, 26, '....') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="{{asset('frontend/img/ads-728x90.png')}}" alt=""></a>
                        </div>

                        <div class="col-lg-12">

                            <div class="row news-lg mx-0 mb-3">
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="{{asset('frontend/img/news-700x435-5.jpg') }}" style="object-fit: cover;">
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                               href="">Business</a>
                                            <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{asset('frontend/img/user.jpg') }}" width="25" height="25" alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($Slaider as $small)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid" style="width: 100px; height: 100px;"
                                         src="{{ env('STORAGE_PATH') }}/{{ $small->thumbnail }}" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            @if($small->category)
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                                   href="{{ route('wb.cat', $small->category->id) }}">
                                                    {{ __('app.small.' . strtoupper($small->category->category_name)) }}
                                                </a>
                                            @endif
                                            <a class="text-body" href="">
                                                <small>{{ \Carbon\Carbon::parse($small->date)->format('M d, Y') }}</small>
                                            </a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                           href="{{ route('wb.news', $small->id) }}">
                                            {{ \Illuminate\Support\Str::limit($small->title, 26, '....') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">

                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('app.FOLLOW US') }}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl())}}&display=popup" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;" target="_blank">
                                <i class="fab fa-facebook text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on Facebook</span>
                            </a>
{{--                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;" target="_blank">--}}
{{--                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>--}}
{{--                                <span class="font-weight-medium">Share on Facebook</span>--}}
{{--                            </a>--}}
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;" target="_blank">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on Twitter</span>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;" target="_blank">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on LinkedIn</span>
                            </a>
                            <a href="https://www.instagram.com/" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;" target="_blank">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on Instagram</span>
                            </a>
                            <a href="https://www.youtube.com/" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;" target="_blank">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on YouTube</span>
                            </a>
                            <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode('Check this out!') }}" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #055570;" target="_blank">
                                <i class="fab fa-telegram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on Telegram</span>
                            </a>
                            <a href="https://www.facebook.com/dialog/send?link={{ urlencode(Request::fullUrl()) }}&app_id=YOUR_APP_ID" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0078FF;" target="_blank">
                                <i class="fab fa-facebook-messenger text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Share on Messenger</span>
                            </a>

                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('app.ADVERTISEMENT') }}</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href=""><img class="img-fluid" src="{{asset('frontend/img/news-800x500-2.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('app.ADVERTISEMENT') }}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
{{--                            @foreach($right_slaider as $slaider)--}}
{{--                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">--}}
{{--                                <img class="img-fluid" style="width: 100px; height: 100px" src="{{env('STORAGE_PATH')}}/{{$slaider->thumbnail}}" alt="">--}}
{{--                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">--}}
{{--                                    <div class="mb-2">--}}
{{--                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"--}}
{{--                                           href="{{route('wb.cat', @$slaider->category->id)}}">{{ __('app.slaider.' . strtoupper(@$slaider->category->category_name)) }}</a>--}}
{{--                                        <a class="text-body" href=""><small>{{date('M d, Y', strtotime($slaider->date))}}</small></a>--}}
{{--                                    </div>--}}
{{--                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{substr_replace($slaider->title,"....",26)}}</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
                            @foreach($right_slaider as $slaider)
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid" style="width: 100px; height: 100px"
                                         src="{{ env('STORAGE_PATH') }}/{{ $slaider->thumbnail }}" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            @if($slaider->category)
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                                   href="{{ route('wb.cat', $slaider->category->id) }}">
                                                    {{ __('app.slaider.' . strtoupper($slaider->category->category_name)) }}
                                                </a>
                                            @else
                                                <span class="badge badge-secondary p-1 mr-2">{{ __('No Category') }}</span>
                                            @endif
                                            <a class="text-body" href="">
                                                <small>{{ \Carbon\Carbon::parse($slaider->date)->format('M d, Y') }}</small>
                                            </a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                           href="{{ route('wb.news', $slaider->id) }}">
                                            {{ \Illuminate\Support\Str::limit($slaider->title, 26, '....') }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{__('app.NEWSLETTER')}}</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{__('app.TAGS')}}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
{{--                                <a href="{{route('wb.cat', @$slaider->category->id)}}" class="btn btn-sm btn-outline-secondary m-1">Politics</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>--}}
                                @foreach($categories as $category)
                                    <a href="{{ route('wb.cat', $category->id) }}" class="nav-item nav-link">
                                        {{ __('app.category.' . strtoupper($category->category_name)) ?: $category->category_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection