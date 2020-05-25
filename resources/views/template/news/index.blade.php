
  @extends('template.master')
  @section('content')
  @include('template.slide')
  <hr/>

  <div class="main-category">
      <div class="container">
          <div class="home-category">
              <ul>
                {{--
                  @foreach($news as $nw)
                      <li><a href="{{$nw->link}}" title="{!!$nw->title!!}">{{$nw->news_type}}</a></li>
                  @endforeach
                --}}
              </ul>
          </div><!-- home-category -->
      </div>
  </div><!-- main-category -->
  <div class="main-content">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="box">
                      <div class="box-content">
                          <div class="home-news-top">
                              <div class="grid">
                                {{--
                                  @foreach($news as $nw)

                                      <div class="img">
                                          <a href="" title="{!!$nw->title!!}">
                                              <img src="Data/images/Bantin/{{$nw->image}}" alt="{!!$nw->title!!}" />
                                          </a>
                                      </div>
                                      <div class="g-content">
                                          <div class="g-row">
                                              <a class="g-category" href="Data/tintuc/{{$nw->link}}" title="Tin tức">
                                                  Tin tức
                                              </a>
                                              <div class="g-time"><i class="fa fa-calendar-o"></i>{{$nw->date_update}}</div>
                                          </div>
                                          <div class="g-row">
                                              <a class="g-title" href="Data/tintuc/{{$nw->link}}" title="{!!$nw->title!!}">
                                                  {!!$nw->title!!}
                                              </a>
                                          </div>
                                          <div class="g-row g-desc">
                                              {!!$nw->content!!}
                                          </div>
                                      </div>
                                  @endforeach
                                  
                              --}}
                              </div><!-- grid -->
                              {{--
                              <div class="row">{{$news->links()}}</div>
                              --}}
                          </div><!-- home-news-top -->

                          <div class="news-grid">
                              <ul class="clearfix">
                                {{--
                                  @foreach($news_line as $nw)

                                      <li>
                                          <div class="grid">
                                              <div class="img">
                                                  <a href="Data/tintuc/{{$nw->link}}" title="{!!$nw->title!!}">
                                                      <img src="Data/images/Bantin/{{$nw->image}}" alt="{!!$nw->title!!}" />
                                                  </a>
                                              </div>
                                              <div class="g-content">
                                                  <div class="g-row">
                                                      <a class="g-category" href="Data/tintuc/{{$nw->link}}" title="Tin tức">
                                                          {!!$nw->title!!}
                                                      </a>
                                                      <div class="g-time"><i class="fa fa-calendar-o"></i>{{$nw->date_update}}</div>
                                                  </div>
                                                  <div class="g-row">
                                                      <a class="g-title" href="Data/tintuc/{{$nw->link}}" title="{!!$nw->title!!}">
                                                          {!!$nw->content!!}
                                                      </a>
                                                  </div>
                                              </div>
                                          </div><!-- grid -->
                                      </li>
                                  @endforeach
                                  --}}

                              </ul>
                              
                          </div><!-- news-grid -->
{{-- 
                         <div class="row">{{$news->links()}}</div>--}}
                          <!-- box-page -->
                      </div><!-- box-content -->
                  </div><!-- box -->
              </div><!-- col -->

              <div class="col-md-4">
                  <div class="box sidebar-box">
                      <div class="box-title"><div class="box-title-name">Điểm Tin Nhanh</div></div>
                      <div class="box-content">
                          <div class="news-featured">
                              <!--where tags= tin nhanh -->
                              {{-- 
                              @foreach($flashnews as $new)

                                  <div class="grid">
                                      
                                      <div class="g-content">
                                          <div class="g-row">
                                              <div class="g-time"><i class="fa fa-calendar-o"></i>{{$new->date_update}}</div>
                                          </div>
                                          <div class="g-row">
                                              <a class="g-title" href="Data/image/Bantin/{{$new->link}}" title="{!!$new->title!!}">
                                                  {!!$new->title!!}
                                              </a>
                                          </div>
                                      </div>
                                  </div><!-- grid -->
                              @endforeach
                              <div class="row">{{$news->links()}}</div>
                            --}}
                          </div><!-- news-featured -->
                      </div><!-- box-content -->
                  </div><!-- box -->
                  <div class="box sidebar-box">
                      <div class="box-title"><div class="box-title-name">Dược Phẩm Hay</div></div>
                      <div class="box-content">
                          <div class="news-featured">
                            {{-- 
                              @foreach($pharmacy_news as $pn)

                                  <div class="grid">
                                      
                                          <dir>{!!$pn->content!!}</dir>
                                      
                                      <div class="g-content">

                                          <div class="g-row">
                                              <div class="g-time"><i class="fa fa-calendar-o"></i>{{$pn->date_update}}</div>
                                          </div>
                                          
                                      </div>
                                  </div><!-- grid -->
                              @endforeach
                              <div class="row">{{$news->links()}}</div>
                              --}}
                          </div><!-- news-featured -->
                      </div><!-- box-content -->
                  </div><!-- box -->


                  <div class="box-banner">
                      <div id="sidebarbanner" class="owl-carousel">
                          <div class="bb-item">
                              <a href="javascript:void(0);" title="Cebraton trang tin tuc">
                                  <iframe class="mediaContent__animation" scrolling="no" src="" frameborder="0" width="300" height="250"></iframe>
                              </a>
                          </div>
                      </div><!-- owl-carousel -->
                  </div><!-- box-banner -->

              </div><!-- col -->
          </div><!-- row -->
      </div><!-- container -->
  </div><!-- home-news -->

  @endsection
