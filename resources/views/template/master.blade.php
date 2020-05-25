<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="vi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="author" content="Template" />
    <meta name="COPYRIGHT" content="&copy; Template" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name="google" content="notranslate" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Scorpio LT</title>
    <base href="{{asset('')}}">
    <link href="{{ asset('favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />

    <!-- Core CSS -->
    <link href="{{ asset('client/assets/7802a60d/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/fotorama.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/7802a60d/custom/mine.css') }}" rel="stylesheet" />

</head>
<body>
@include('template.nav')

@yield('content')
<hr/>
<div class="banner-center-outer">
    <div class="container">
        <div class="banner-center">
            <div class="banner-center-item">
                <a href="/" title="Trang chủ">
                    <img src="{{ asset('client/upload/banner/thumbs/bannertc.jpg') }}" alt="Trang chủ" />
                </a>
            </div>
        </div><!-- banner-center -->
    </div><!-- container -->
</div><!-- banner-center-outer -->
<div class="home-product bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-title">
                        <div class="box-title-name">Sản phẩm</div>
                    </div>
                    <div class="box-content">
                        <div class="home-product-slider">
                            <div id="hpslider" class="owl-carousel">
                               {{--@foreach($product_list as $pr)
                                    <div class="home-product-item">
                                        <div class="hpi-img"><a href="{{route('chi-tiet',$pr->id)}}"><img src="Data/images/Sanpham/{{$pr->image}}" alt="{{$pr->product_name}}" /></a></div>
                                        <div class="hpi-content">
                                            <div class="hpi-title">{{$pr->product_name}}</div>
                                            <div class="hpi" style="height:140px;">{!!$pr->information!!}</div><br>
                                            <a class="btn btn-success pt-5" href="{{route('chi-tiet',$pr->id)}}">Xem thêm<i class="icon-right icon16-double-right"></i></a>
                                        </div>
                                    </div><!-- home-product-item -->
                                @endforeach--}}
                            </div><!-- owl-carousel -->
                        </div><!-- home-product-slider -->
                        <div class="home-category">
                            <ul>
                                <li><a href="" title="Xem toàn bộ sản phẩm">Xem toàn bộ sản phẩm &Gt;</a></li>
                            </ul>
                        </div><!-- home-category -->
                    </div><!-- box-content -->
                </div><!-- box -->
            </div><!-- col -->

            <div class="col-md-4">
                <div class="box">
                    <div class="box-title hidden visible-xs"><div class="box-title-name">Hệ thống phân phối</div></div>
                    <div class="box-content">
                        <div class="box-area">
                            <div class="box-area-map">
                                <a class="area-point area-top" href="#mienbac"></a><a class="area-point area-top-center" href="#mienbacmientrung"></a><a class="area-point area-center" href="#mientrung"></a><a class="area-point area-bottom" href="#miennam"></a>
                            </div><!-- box-area-map -->
                            <div class="box-area-content">
                                <div class="box-area-pane active">
                                    <div class="box-area-title">Hệ thống phân phối <br /><span>Trên toàn quốc</span></div>
                                    <ul>
                                            <li>2 Công ty con phân phối</li>
                                            <li>24 Chi nhánh</li>
                                            <li>Hơn 26000 khách hàng bán lẻ</li>
                                        </ul>
                                </div><!-- box-area-pane -->

                                <div class="box-area-pane" id="mienbac">
                                    <div class="box-area-title">Hệ thống phân phối <span>Miền Bắc</span></div>
                                    <ul>
                                            <li>Thanh H&oacute;a, Nam Định, Hải Dương, Hải Ph&ograve;ng, Quảng Ninh, Ph&uacute; Thọ, Bắc Giang, Hưng Y&ecirc;n, Th&aacute;i Nguy&ecirc;n, Y&ecirc;n B&aacute;i</li>
                                        </ul>
                                </div><!-- box-area-pane -->
                                <div class="box-area-pane" id="mienbacmientrung">
                                    <div class="box-area-title">Hệ thống phân phối <span>Bắc Miền Trung</span></div>
                                    <ul>
                                            <li>Chi nh&aacute;nh Nghệ An</li>
                                        </ul>
                                </div><!-- box-area-pane -->
                                <div class="box-area-pane" id="mientrung">
                                    <div class="box-area-title">Hệ thống phân phối <span>Miền Trung</span></div>
                                    <ul>
                                            <li>Quảng Ng&atilde;i, Gia Lai, Kh&aacute;nh H&ograve;a</li>
                                        </ul>
                                </div><!-- box-area-pane -->
                                <div class="box-area-pane" id="miennam">
                                    <div class="box-area-title">Hệ thống phân phối <span>Miền Nam</span></div>
                                    <ul>
                                            <li>Hồ Ch&iacute; Minh, Vĩnh Long, B&igrave;nh Thuận, Đồng Nai, Cần Thơ, Tiền Giang, B&igrave;nh Dương</li>
                                        </ul>
                                </div><!-- box-area-pane -->

                                <a class="btn btn-success" href="phan-phoi" title="Xem thêm">Xem thêm<i class="icon-right icon16-double-right"></i></a>
                            </div><!-- box-area-content -->
                        </div><!-- box-area -->
                    </div><!-- box-content -->
                </div><!-- box -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- home-product -->
<div class="home-video" style="background-image: url({{ asset('client/upload/video/thumbs/bannerbot.png')}}); ">
    <img src="{{ asset('client/upload/video/thumbs/bannerbot.png') }}" alt="Con đường sức khỏe" />
    <div class="home-video-caption">
        <div class="container">
            <div class="tb-table">
                <div class="tb-row">
                    <div class="tb-cell">
                        <div class="home-video-title">Đồng hành cùng sức khỏe của bạn<span></span></div>
                        <a class="home-video-play" href="javascript:void(0);" onclick="loadPopupVideo(3);"></a>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- home-video-caption -->
</div><!-- home-video -->

@include('template.footer')
    <div class="go-top"><i class="icon16-arow-top"></i></div>

    <!-- Core JavaScript -->
    <script src="{{ asset('client/assets/7802a60d/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/fotorama.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/jquery.inview.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/jquery.countTo.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/swiper.min.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/js/common.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/custom/bootbox.min.js')}}"></script>
    <script src="{{ asset('client/assets/7802a60d/custom/mine.js')}}"></script>
    <!-- Js only video in homepage -->
    <script src="{{ asset('client/assets/7802a60d/js/jquery.videobackground.js')}}"></script>
    <script type="text/javascript">
        $(window).load(function () {
            sticky();
        })
        $('')
    </script>
    <script language="javascript">
        //function video background
        var homeVideo = function (source) {
            //console.log(source);
            $('.video-background').videobackground({
                //videoSource: ['/video/'+ source +'.mp4', 'video/mp4'],
                videoSource: [ {{ asset('client/upload/video/sources/fd60f900cecf2f93c4538ab4bffdcb2b.mp4')}}, 'video/mp4'],
                poster: {{ asset('client/assets/7802a60d/video/traphaco-intro.jpg')}},
                loadedCallback: function () {
                    $(this).videobackground('mute');
                },
                loop: true
            });
        };
        $(document).ready(function () {
            //video background init
            homeVideo('traphaco-intro');
        });
        $(window).on('resize', function () {
            //video background init
            homeVideo('traphaco-intro');
        });
    </script>
</body>
</html>