<div class="navigator">
    <div class="navigator-top">
        <div class="container">
            <button class="expand-menutop" type="button"><span></span></button>
            <div class="menu-top">
                <ul>
                    <li><a href="/tuyen-dung" title="Tuyển dụng">Tuyển dụng</a></li>
                    <li><a href="/tin-tuc/suc-khoe" title="Khỏe từ thiên nhiên">Khỏe từ thiên nhiên</a></li>
                    <li><a href="tel:02485877997" title="Liên hệ"><i style="font-size: 14px;margin-right: 3px;" class="fa fa-phone" aria-hidden="true"></i>Liên hệ: (033) 2750507</a></li>
                    <li><a data-toggle="modal" data-target="#myModal"><i style="font-size: 14px;margin-right: 3px;" class="fa fa-user" aria-hidden="true"></i>Đăng nhập</a></li>
                </ul>
                  <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <form class="form-horizontal form-label-left" method="post" action="" >
                            <div class="modal-content" style="width: 500px; height: 300px; border-radius: 7px;  margin-top: 50px; float: right;">
                                <div class="modal-header" style="width: 298px; height: 44px; ">
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                  <h4 class="modal-titler">ĐĂNG NHẬP</h4>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="item form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tên đăng nhập:</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="username" class="form-control col-md-7 col-xs-12" placeholder="Nhập username hoặc email">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Mật khẩu:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="Nhập mật khẩu" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p class="text-center h5">Bạn chưa có tài khoản ? Bấm vào nút <b><a href="">Đăng ký</a></b> bên dưới.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="text-center">
                                        <input type="submit" style="color: white;" class="btn btn-info" value="Đăng nhập">
                                        <a href="" class="btn btn-default" data-dismiss="modal" style="width: 74.75px; height: 32px; background-color: #33FF00; color: #FFFFFF; margin-right: 20px">Đăng ký</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-outer">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="scorpio" title="Trang chủ">
                    <img src="{{ asset('client/assets/7802a60d/custom/Newlogo3.png') }}" alt="logo" />
                </a>
            </div>
            <button class="expand-menu" type="button"><span></span></button>
            <div class="menu">
                <ul>
                    <li>
                        <a href="" title="Trang chủ">Trang chủ<span class="btn-submenu fa fa-plus"></span></a>
                    </li>
                    <li class="mega-menu-hover ">
                        <a href="/Scorpio.html" title="Scorpio">Nói về Scorpio<span class="btn-submenu fa fa-plus"></span></a>
                        <div class="mega-menu">
                            <div class="mega-menu-left">
                                <img src="assets/Client/upload/megaMenu/thumbs/nova.png" alt="Câu chuyện Traphaco" />
                            </div><!-- mega-menu-left -->
                            <div class="mega-menu-right">
                                <div class="mega-menu-content">
                                    <div class="mega-menu-product">
                                        <label>Scorpio</label>
                                        <p>Công ty Cổ phần Dược phẩm Quốc tế Scorpio là một doanh nghiệp trẻ năng động, hoạt động đa ngành nghề trên nhiều lĩnh vực khác nhau...</p>
                                        <a href="/gioithieu" title="Xem thêm">Xem thêm &Gt;</a>
                                    </div>
                                    <div class="mega-menu-list">
                                        <ul>
                                            <li class="full-list"><a href="/Scorpio" title="Tầm nhìn, sứ mệnh, giá trị cốt lõi">Tầm nhìn, sứ mệnh, giá trị cốt lõi</a></li>
                                            <li class="full-list"><a href="/Scorpio" title="Công ty liên kết">Công ty liên kết</a></li>
                                            <li class="full-list"><a href="/Scorpio" title="Danh hiệu giải thưởng">Danh hiệu giải thưởng</a></li>
                                            <li class="full-list"><a href="/Scorpio" title="Văn hóa doanh nghiệp">Văn hóa doanh nghiệp</a></li>
                                        </ul>
                                    </div>
                                </div><!-- mega-menu-content -->
                            </div><!-- mega-menu-right -->
                        </div><!-- mega-menu -->
                    </li>
                    <li class="mega-menu-hover ">
                        <a href="/tin-tuc" title="Tin tức">Tin tức<span class="btn-submenu fa fa-plus"></span></a>
                        <div class="mega-menu">
                            <div class="mega-menu-left">
                                <img src="assets/Client/upload/megaMenu/thumbs/news.png" alt="Tin tức" />
                            </div><!-- mega-menu-left -->
                            <div class="mega-menu-right">
                                <div class="mega-menu-content">
                                    <div class="mega-menu-product">
                                        <label>Tin tức</label>
                                        <p><p>Tin tức về hoạt động của c&ocirc;ng ty, nh&atilde;n h&agrave;ng v&agrave; b&aacute;o ch&iacute; viết về Traphaco</p></p>
                                        <a href="/tin-tuc" title="Xem thêm">Xem thêm &Gt;</a>
                                    </div>
                                    <div class="mega-menu-list">
                                        <ul>
                                            <li class="full-list"><a href="">Tin tức</a></li>
                                            <li class="full-list"><a href="/tin-tuc/su-kien">Sự kiện</a></li>
                                            <li class="full-list"><a href="/tin-tuc/suc-khoe">Sức khỏe cộng đồng</a></li>
                                            <li class="full-list"><a href="/tin-tuc/cham-soc-cong-dong">Chăm sóc cộng đồng</a></li>
                                            <li class="full-list"><a href="/tin-tuc/hoat-dong">Hoạt động</a></li>
                                        </ul>
                                    </div>
                                </div><!-- mega-menu-content -->
                            </div><!-- mega-menu-right -->
                        </div><!-- mega-menu -->
                    </li>
                    <li class="mega-menu-hover ">
                        <a href="" title="Sản phẩm">Sản phẩm<span class="btn-submenu fa fa-plus"></span></a>
                        <div class="mega-menu">
                            <div class="mega-menu-left">
                                <img src="assets/Client/upload/megaMenu/thumbs/6057e2de10e50ae6fa2221204b090bc1.jpg" alt="Sản phẩm" />
                            </div><!-- mega-menu-left -->
                            <div class="mega-menu-right">
                                <div class="mega-menu-content">
                                    <div class="mega-menu-product">
                                        <label>Sản phẩm</label>
                                        <p><p>Sản phẩm của Traphaco&nbsp;được đầu tư nghi&ecirc;n cứu, ph&aacute;t triển v&agrave; sản xuất một c&aacute;ch to&agrave;n diện, l&agrave; kết quả của c&aacute;c c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu khoa học đầy đủ v&agrave; b&agrave;i bản.</p></p>
                                        <a href="" title="Xem danh sách sản phẩm">Xem danh sách sản phẩm &Gt;</a>
                                    </div>
                                    <div class="mega-menu-list">
                                        <ul>
                                            <li class="full-list"><a href="">Sản phẩm</a></li>
                                            <li class="full-list"><a href="/san-pham/tre-em">Trẻ em</a></li>
                                            <li class="full-list"><a href="/san-pham/nguoi-lon">Người lớn</a></li>
                                            <li class="full-list"><a href="/san-pham/nguoi-gia">Người già</a></li>
                                            <li class="full-list"><a href="/san-pham/lam-dep">Làm đẹp</a></li>
                                            <li class="full-list"><a href="/san-pham/phu-nu-mang-thai">Phụ nữ mang thai</a></li>
                                        </ul>
                                    </div>
                                </div><!-- mega-menu-content -->
                            </div><!-- mega-menu-right -->
                        </div><!-- mega-menu -->
                    </li>
                    <li>
                        <a href="/phan-phoi" title="Phân phối">Phân phối<span class="btn-submenu fa fa-plus"></span></a>
                    </li>
                </ul>
            </div><!-- menu -->
        </div><!-- header -->
    </div><!-- container -->
</div><!-- header-outer -->
<div class="container">
	<div class="row">
		<div class="container">
        	<div class="row">
            	<a href="" class="intro-banner-vdo-play-btn pinkBg" target="_blank">
                    <i class="fa fa-heartbeat" aria-hidden="true"></i>
                    <span class="cart-count"></span>
                    <span class="ripple pinkBg"></span>
                    <span class="ripple pinkBg"></span>
                    <span class="ripple pinkBg"></span>
                </a>
        	</div>
        </div>
    </div>
</div>
