<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- seo start -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{!! $meta_desc ?? '' !!}">
    <meta name="author" content="{!! $meta_author ?? '' !!}">
    <meta name="keywords" content="{!! $meta_keywords ?? '' !!}">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" type="text/css" href="{{ $meta_canonical ?? '' }}">
    <!-- seo -->
    <!-- chia sẻ fb -->
    <meta property="og:image" content="" />  
      <meta property="og:site_name" content="http://dientu1989.local/" />
      <meta property="og:description" content="{!! $meta_desc ?? '' !!}" />
      <meta property="og:title" content="{!! $title_page ?? '' !!}" />
      <meta property="og:url" content="{{ $meta_canonical ?? '' }}" />
      <meta property="og:type" content="website" />
    <!-- end chia sẻ -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>{{ $title_page ?? "Đồ án"}}</title>
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="/frontend/css/price-range.css" rel="stylesheet">
    <link href="/frontend/css/animate.css" rel="stylesheet">
    <link href="/frontend/css/main.css" rel="stylesheet">
    <link href="/frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/frontend/js/html5shiv.js"></script>
    <script src="/frontend/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/frontend/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/frontend/images/ico/apple-touch-icon-57-precomposed.png">

    <!-- sweetalert -->
    <link href="/frontend/css/sweetalert.css" rel="stylesheet">

    <style type="text/css">
        .mainmenu ul li a{
            color: white;
        }
    </style>

    <!--/thông báo-->
                    @if (Session::has('alert'))
                        <div role="alert" class="alert alert-success text-center" style="font-size: 20px; color: blue;margin-bottom: 0px;">{{Session::get('alert')}}</div>
                    @endif

    @yield('css')

</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="{{ route('get.static.VeChungToi') }}" class="">Giới thiệu</a></li>
                                <li><a href="{{ route('get.contact') }}" class="">Liên hệ</a></li>
                                <li><a href="{{ route('get.news.list') }}">Tin tức về rượu</a>
                                </li>
                                <li style="margin-top: 5px;">
                                    <div class="fb-share-button" data-href="http://dientu1989.local" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $meta_canonical }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                </li>
                                <!-- <li style="margin-top: 5px;">
                                    <div class="fb-like" data-href="{{ $meta_canonical }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row" style="margin-bottom: 0px;padding: 0px">
                    <div class="col-sm-6">
                        <div class="row" style="padding: 0px;border-bottom: 0px">
                        <div class="logo pull-left col-xs-12 col-sm-4">
                            <a href="{{ route('get.home')}}"><img src="{{ asset( $home->logo )}}" alt="" /></a>
                        </div>
                        <div class="btn-group col-xs-12 col-sm-8" style="margin-top: 45px">
                            <nav class="navbar navbar-light bg-light">
                              <form action="{{ route('search.product')}}" method="post" class="form-inline" style="display: flex;">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" placeholder="Nhập tên sản phẩm cần tìm..." aria-label="Search" name="key">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                              </form>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-top: 40px">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('get.shopping.list') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                @if( !Session::get('user_id') )                               
                                    <li><a href="{{ route('get.login') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                    <li><a href="{{ route('get.register') }}"><i class="fa fa-user"></i> Đăng ký</a></li>
                                @else    
                                    <li><a href=""><i class="fa fa-user"></i> Xin chào: <i style="color: blue">{{Session::get('user_name')}}</i></a></li>
                                    <li><a href="{{ route('get.user.index') }}">Quản lý tài khoản</a></li>
                                    <li><a href="{{ route('get.logout') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom" style="padding: 10px 0px; background: #FE980F"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mainmenu">
                            <ul style="display: flex;width: 100%;" class="nav navbar-nav collapse navbar-collapse">
                                <li class="col-xs-4 col-sm-3 col-sm-2" style="text-align: center;">
                                    <a style="text-align: center;font-size: 15px;" href="{{route('get.home')}}">Trang chủ</a>
                                </li>
                                @foreach( $categories as $item )
                                <li class="col-xs-4 col-sm-3 col-lg-2" style="text-align: center;"><a style="font-size: 15px;" href="{{ route('get.ProductByCategory', $item->c_slug.'-'.$item->id)}}">{{ $item->c_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                     @yield('content')
                </div>
            </div>
        </div>
    </section>
    <section style="padding: 20px; background: #f5f4f4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 text-center">
                         <h2 style="color: #FE980F">TƯ VẤN MIỄN PHÍ</h2>   
                         <h4 style="margin-top: 10px">Quý khách đừng ngần ngại liên hệ với Siêu thị rượu nhập ngoại để nhận được tư vấn miễn phí khi mua hàng.</h4>
                         <div>
                            <p class="btn btn-lg btn-primary">HOTLINE: 0942 005 988</p>
                         </div>     
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Siêu thị rượu nhập ngoại</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><span>Địa chỉ: {!! $home->address !!}</span></li>
                                <li><span>Hotline: {{ $home->hotline }}</span></li>
                                <li><span>Email: {{ $home->email }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Thông tin chung</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{ route('get.static.VeChungToi') }}" class="">Giới thiệu</a></li>
                                <li><a href="{{ route('get.contact') }}" class="">Liên hệ</a></li>
                                <li><a href="{{ route('get.news.list') }}">Tin tức về rượu</a>
                                <li><a href="{{ route('get.register')}}">Đăng ký</a></li>
                                <li><a href="{{ route('get.login')}}">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Fanpage của chúng tôi</h2>
                            <div class="fb-page" data-href="https://www.facebook.com/RuouVangQuocTe" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RuouVangQuocTe" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RuouVangQuocTe">Shop rượu ngoại</a></blockquote></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="/frontend/js/jquery.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <script src="/frontend/js/jquery.scrollUp.min.js"></script>
    <script src="/frontend/js/price-range.js"></script>
    <script src="/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="/frontend/js/main.js"></script>
    <!-- chia sẻ facebook -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
    <!-- lazyload -->
    <script type="text/javascript" src="/frontend/js/jquery-1.11.3.min.js"></script>    
    <script type="text/javascript" src="/frontend/js/jquery.lazyload.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("img.img-lazyload").lazyload({
                effect : "fadeIn",
                 threshold: 200,
            });
        });
    </script>

    @yield('script')

    <!-- Load Facebook SDK for JavaScript tạo tin nhắn cho web-->
      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="113458890377101"
          theme_color="#0084ff"
          logged_in_greeting="Rượu nhập ngoại kính chào Qúy khách"
          logged_out_greeting="Rượu nhập ngoại kính chào Qúy khách">
      </div>

</body>
</html>