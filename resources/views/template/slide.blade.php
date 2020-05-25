<div class="main-slider">
    <div class="video-outer">
        <div class="video-thumb-slider">
            <div id="heartslider" class="owl-carousel" data-slider-id="ms2">
               {{--@foreach($slide as $sl) 
                <a href="#">
                <img src="Data/images/Slide/{{$sl->hinhanh}}" alt="HinhAnh"/>
                </a>
                @endforeach--}}
            </div><!-- owl-carousel -->
            
            <div class="main-slider-dots">
                <ul class="owl-thumbs" data-slider-id="ms2">
                    <li class="owl-thumb-item hidden">
                        <a href="javascript:void(0);" title="">
                            <img class="step" src="{{ asset('client/assets/7802a60d/img/ms-step-1.png') }}" alt="step 1" />
                            <img class="step-hover" src="assets/Client/assets/7802a60d/img/ms-step-1-active.png" alt="step 1" />
                        </a>
                    </li>
                    <li class="owl-thumb-item">
                        <a href="javascript:void(0);" title="Vùng trồng">
                            <img class="step" src="{{ asset('client/assets/7802a60d/img/ms-step-1.png') }}" alt="step 2" />
                            <img class="step-hover" src="{{ asset('client/assets/7802a60d/img/ms-step-1-active.png') }}" alt="step 2" />
                        </a>
                    </li>
                    <li class="owl-thumb-item">
                        <a href="javascript:void(0);" title="Nhà máy">
                            <img class="step" src="{{ asset('client/assets/7802a60d/img/ms-step-2.png') }}" alt="step 3" />
                            <img class="step-hover" src="{{ asset('client/assets/7802a60d/img/ms-step-2-active.png') }}" alt="step 3" />
                        </a>
                    </li>
                    <li class="owl-thumb-item">
                        <a href="javascript:void(0);" title="Sản phẩm">
                            <img class="step" src="{{ asset('client/assets/7802a60d/img/ms-step-3.png') }}" alt="step 4" />
                            <img class="step-hover" src="{{ asset('client/assets/7802a60d/img/ms-step-3-active.png') }}" alt="step 4" />
                        </a>
                    </li>
                    <li class="owl-thumb-item">
                        <a href="javascript:void(0);" title="Phân phối">
                            <img class="step" src="{{ asset('client/assets/7802a60d/img/ms-step-4.png') }}" alt="step 5" />
                            <img class="step-hover" src="{{ asset('client/assets/7802a60d/img/ms-step-4-active.png') }}" alt="step 5" />
                        </a>
                    </li>
                </ul>
            </div><!-- main-slider-dots -->
        </div><!-- video-thumb-slider -->
    </div><!-- video-outer -->
    <a class="scroll-down" href="javascript:void(0);"><span class="text">Xem thêm</span><span class="scroll"></span></a>
</div><!-- main-slider -->