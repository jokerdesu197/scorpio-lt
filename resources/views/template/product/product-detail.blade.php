@extends('template.master')
@section('content')
<div class="product-detail bg-gray">
    <div class="container">
        <div class="product-detail-inner clearfix">
            <div class="product-detail-left">
                <div class="product-detail-img">
                    <div class="tb-table">
                        <div class="tb-row">
                            <div class="tb-cell">
                                <img width="500" src="/Data/files/db67855fec1f17414e0e.jpg" alt="SuboZen">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-detail-thumb">
                    <ul>
                        <li class="active"><a href="/Data/files/db67855fec1f17414e0e.jpg" title="SuboZen"><img src="/Data/files/db67855fec1f17414e0e.jpg" alt="SuboZen"></a></li>
                        
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="product-detail-right">
                <div class="product-detail-row">
                    <div class="product-detail-title"><h1>SuboZen</h1></div>
                </div>
                <div class="product-detail-row">
                    <div class="product-detail-desc"><p>*** CÔNG DỤNG :</p>

						<p>Hỗ trợ tăng cường sức khỏe, nâng cao sức đề kháng, giảm nguy cơ mắc bệnh đường hô hấp trên như viêm mũi họng, viêm phế quản</p>

						<p>*** ĐỐI TƯỢNG</p>

						<p>Người lớn&nbsp;và trẻ em có sức đề&nbsp;kháng kém, hay mắc viêm mũi, viêm họng, viêm phế quản</p>
					</div>
                </div>
            </div>
        </div>
        <div class="product-tabs">
            <ul role="tablist">
                <li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#tab1">Thông tin chi tiết</a></li>
                
            </ul>
        </div>
    </div>
</div>
<div class="product-content bg-white">
    <div class="container">
        <div role="tabpanel" class="product-pane active" id="tab1">
            <div class="product-content-list">
                <div class="product-content-item clearfix active">
                    <label>Nội dung:</label>
                    <div class="maincontent">
                        <div style="text-align: justify;">
                            <p>*** THÀNH PHẦN :&nbsp;</p>

							<p>Chiết xuất Quả cơm cháy 3000mg</p>

							<p>Chiết xuất Cúc tím 2000mg</p>

							<p>Chiết xuất Tỏi đen 2000mg</p>

							<p>Chiết xuất Cỏ xạ hương 2000mg</p>

							<p>Chiết xuất Keo ong 1600mg</p>

							<p>Thymomodulin 800mg</p>

							<p>Whey protein (Đạm thủy phân từ sữa) 400mg</p>

							<p>Kẽm gluconat 400mg</p>

							<p>Immune nov (Chiết xuất từ thành tế bào Lactobacillus rhamnosus) 200mg</p>

							<p>Vitamin C (Acid L-ascorbic) 200mg &nbsp;</p>

							<p>Vitamin B1 (Thiamin hydroclorid) 20mg</p>

							<p>Vitamin PP (Nicotinamid) 20mg</p>

							<p>Vitamin B6 (Pyridoxin hydroclorid) 20mg</p>

							<p>Phụ liệu: Đường kính, nước tinh khiết vừa đủ 200ml&nbsp;</p>
                        </div>
                    </div>
                </div><!-- product-content-item -->
            </div><!-- product-content-list -->
            <div class="product-content-more" style="display: none;"><a href="#"><span class="pcm-icon"><i class="icon20-double-down"></i></span>Xem thêm</a></div>
        </div><!-- product-pane -->
        <div class="product-other-outer bg-white">
            <div class="container">
                <div class="box">
                    <div class="box-title"><div class="box-title-name no-border">Sản phẩm cùng loại</div></div>
                    <div class="box-content">
                        <div class="product-other">
                            <div id="poslider" class="owl-carousel owl-loaded owl-drag">    
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2331px;"><div class="owl-item active" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/bio-helokidsplus-28" title="Bio Helokids-Plus">
                                                <img src="/Data/files/helokids%202_2.png" alt="Bio Helokids-Plus">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/bio-helokidsplus-28" title="Bio Helokids-Plus">Bio Helokids-Plus</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/khang-phe-nhi-35" title="KHANG PHẾ NHI">
                                                <img src="/Data/images/H%E1%BB%99p%20thu%E1%BB%91c/khang-phe-nhi(1).png" alt="KHANG PHẾ NHI">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/khang-phe-nhi-35" title="KHANG PHẾ NHI">KHANG PHẾ NHI</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/bao-an-nhi--chi-khai-lo-36" title="BẢO AN NHI – CHỈ KHÁI LỘ">
                                                <img src="/Data/images/H%E1%BB%99p%20thu%E1%BB%91c/bao-an-nhi(1).png" alt="BẢO AN NHI – CHỈ KHÁI LỘ">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/bao-an-nhi--chi-khai-lo-36" title="BẢO AN NHI – CHỈ KHÁI LỘ">BẢO AN NHI – CHỈ KHÁI LỘ</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item active" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/binh-nieu-nhi-43" title="BÌNH NIỆU NHI">
                                                <img src="/Data/images/H%E1%BB%99p%20thu%E1%BB%91c/binh-nieu-nhi(1).png" alt="BÌNH NIỆU NHI">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/binh-nieu-nhi-43" title="BÌNH NIỆU NHI">BÌNH NIỆU NHI</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/siro-an-ngon-nobikids-46" title="SIRO ĂN NGON- NOBIKIDS">
                                                <img src="/Data/files/IMG_3092.JPG" alt="SIRO ĂN NGON- NOBIKIDS">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/siro-an-ngon-nobikids-46" title="SIRO ĂN NGON- NOBIKIDS">SIRO ĂN NGON- NOBIKIDS</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/tra-loi-sua-maxsua-49" title="Trà lợi sữa Maxsua">
                                                <img src="/Data/files/Untitled-1.jpg" alt="Trà lợi sữa Maxsua">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/tra-loi-sua-maxsua-49" title="Trà lợi sữa Maxsua">Trà lợi sữa Maxsua</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/canxi-cafokids-53" title="Canxi cafokids">
                                                <img src="/Data/files/IMG_3096.JPG" alt="Canxi cafokids">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/canxi-cafokids-53" title="Canxi cafokids">Canxi cafokids</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/novakids-54" title="Novakids">
                                                <img src="/Data/files/0ae46c93413fa761fe2e.jpg" alt="Novakids">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/novakids-54" title="Novakids">Novakids</a></div>
                                            
                                        </div>
                                    </div></div><div class="owl-item" style="width: 229px; margin-right: 30px;"><div class="product-item">
                                        <div class="pi-thumb">
                                            <a href="/san-pham/aquakids--mk7-55" title="AQUAKIDS – MK7">
                                                <img src="/Data/files/Ho%CC%A3%CC%82pAquakids.jpg" alt="AQUAKIDS – MK7">
                                            </a>
                                            <!--<span class="icon-no1"></span>-->
                                        </div>
                                        <div class="pi-content">
                                            <div class="pi-row"><a class="pi-title" href="/san-pham/aquakids--mk7-55" title="AQUAKIDS – MK7">AQUAKIDS – MK7</a></div>
                                            
                                        </div>
                                    </div></div></div></div><div class="owl-nav disabled"><div class="owl-prev"></div><div class="owl-next"></div></div><div class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div></div><div class="owl-thumbs"></div></div><!-- owl-carousel -->
                        </div><!-- product-other -->
                    </div><!-- box-content -->
                </div><!-- box -->
            </div><!-- container -->
        </div><!-- product-other-outer -->

        <div class="product-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-title"><div class="box-title-name">Khỏe từ thiên nhiên</div></div>
                            <div class="box-content">
                                <div class="news-featured">
                                        <div class="grid">
                                            <div class="img">
                                                <a href="/tin-tuc/chuong-trinh-tet-trung-thu-dac-biet-dem-trang-co-tich-58" title="CHƯƠNG TRÌNH TẾT TRUNG THU ĐẶC BIỆT: ĐÊM TRĂNG CỔ TÍCH">
                                                    <img src="/Data/images/%5E6CAB1F2AF487F00F80692BE9CFB414D308DD5452EABD8EE5E3%5Epimgpsh_fullsize_distr.png" alt="CHƯƠNG TRÌNH TẾT TRUNG THU ĐẶC BIỆT: ĐÊM TRĂNG CỔ TÍCH">
                                                </a>
                                            </div>
                                            <div class="g-content">
                                                <div class="g-row">
                                                    <div class="g-time"><i class="fa fa-calendar-o"></i>28/10/2017</div>
                                                </div>
                                                <div class="g-row">
                                                    <a class="g-title" href="/tin-tuc/chuong-trinh-tet-trung-thu-dac-biet-dem-trang-co-tich-58" title="CHƯƠNG TRÌNH TẾT TRUNG THU ĐẶC BIỆT: ĐÊM TRĂNG CỔ TÍCH">
                                                        CHƯƠNG TRÌNH TẾT TRUNG THU ĐẶC BIỆT: ĐÊM TRĂNG CỔ TÍCH
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- grid -->
                                        <div class="grid">
                                            <div class="img">
                                                <a href="/tin-tuc/sai-lam-tri-bieng-an-cho-con--may-man-me-tim-ra-giai-phap-kip-thoi-57" title="SAI LẦM TRỊ BIẾNG ĂN CHO CON - MAY MẮN MẸ TÌM RA GIẢI PHÁP KỊP THỜI">
                                                    <img src="/Data/images/Tintuc/18582097_1246355685477901_1603023899424355632_n.jpg" alt="SAI LẦM TRỊ BIẾNG ĂN CHO CON - MAY MẮN MẸ TÌM RA GIẢI PHÁP KỊP THỜI">
                                                </a>
                                            </div>
                                            <div class="g-content">
                                                <div class="g-row">
                                                    <div class="g-time"><i class="fa fa-calendar-o"></i>26/10/2017</div>
                                                </div>
                                                <div class="g-row">
                                                    <a class="g-title" href="/tin-tuc/sai-lam-tri-bieng-an-cho-con--may-man-me-tim-ra-giai-phap-kip-thoi-57" title="SAI LẦM TRỊ BIẾNG ĂN CHO CON - MAY MẮN MẸ TÌM RA GIẢI PHÁP KỊP THỜI">
                                                        SAI LẦM TRỊ BIẾNG ĂN CHO CON - MAY MẮN MẸ TÌM RA GIẢI PHÁP KỊP THỜI
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- grid -->
                                        <div class="grid">
                                            <div class="img">
                                                <a href="/tin-tuc/nguoi-lon-cung-bi-bieng-an-giai-phap-dieu-tri-hoan-toan-moi-55" title="NGƯỜI LỚN CŨNG BỊ BIẾNG ĂN??? GIẢI PHÁP ĐIỀU TRỊ HOÀN TOÀN MỚI">
                                                    <img src="/Data/images/vi-sao-nguoi-lon-cung-chan-an_51550.jpg" alt="NGƯỜI LỚN CŨNG BỊ BIẾNG ĂN??? GIẢI PHÁP ĐIỀU TRỊ HOÀN TOÀN MỚI">
                                                </a>
                                            </div>
                                            <div class="g-content">
                                                <div class="g-row">
                                                    <div class="g-time"><i class="fa fa-calendar-o"></i>25/10/2017</div>
                                                </div>
                                                <div class="g-row">
                                                    <a class="g-title" href="/tin-tuc/nguoi-lon-cung-bi-bieng-an-giai-phap-dieu-tri-hoan-toan-moi-55" title="NGƯỜI LỚN CŨNG BỊ BIẾNG ĂN??? GIẢI PHÁP ĐIỀU TRỊ HOÀN TOÀN MỚI">
                                                        NGƯỜI LỚN CŨNG BỊ BIẾNG ĂN??? GIẢI PHÁP ĐIỀU TRỊ HOÀN TOÀN MỚI
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- grid -->
                                </div><!-- news-featured -->
                            </div><!-- box-content -->
                        </div><!-- box -->
                    </div><!-- col -->

                    <div class="col-md-8">
                        <div class="product-banner">
                            <a href="" title="" target="_blank">
                                <img src="/assets/Client/upload/banner/thumbs/63ef41ca2752a833d6619a0d963c7589.jpg" alt="Cebraton CTSP">
                            </a>
                        </div><!-- product-banner -->
                    </div><!-- col -->

                </div><!-- row -->
            </div><!-- container -->
        </div><!-- product-news -->
    </div>
</div>
@endsection