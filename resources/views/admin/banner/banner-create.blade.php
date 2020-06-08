@extends('admin.master')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var count_add = 0;
        var sort_no = 1;
        
        //  fileupload
        $('#upload_file').fileupload({
            url: "{{ route('add-image') }}",
            type: "post",
            dataType: 'json',
            sequentialUploads: true,
            dropZone: $('.thumbnail'),
            done: function(e, data) {
                $('.progress').hide();
                $.each(data.result.files, function(index, file) {
                    var path = '{{ asset('temp_images') }}/' + file;
                    var images = '<div id="group-temp-image-'+index+'"><div class="image view view-first col-md-3" style="height: auto;"><img class="bg-image" src="'+path+'" alt="image"><div class="mask ml-1"><div class="tools tools-bottom" style="margin-top: 45%;"><a href="'+path+'"><i class="fa fa-link"></i></a><!-- <a href="#"><i class="fa fa-pencil"></i></a>--><a id="delete-group-'+index+'" onClick="deleteImage('+index+')" style="cursor: pointer;" name="delete_images[]" image-data=""><i class="fa fa-times"></i></a></div></div></div></div>';
                    var img = $('.thumbnail').append(images);
                    var img_val = $('.thumbnail').append('<input type="hidden" name="images[]"  value="'+file+'|'+sort_no+'">');
                    sort_no++;
                    count_add++;
                });
            },
            fail: function(e, data) {
                alert("Fail");
            },
            always: function(e, data) {
                $('.progress').hide();
                $('.progress .progress-bar').width('0%');
            },
            start: function(e, data) {
                $('.progress').show();
            },
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 10000000,
            maxNumberOfFiles: 4,
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('.progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            },
            processalways: function(e, data) {
                if (data.files.error) {
                    alert("");
                }
            }
        });
        $('#upload_image').click(function() {
            $('#upload_file').click();
        });
    });
    // delete image
    function deleteImage($obj) {
        $('#group-temp-image-'+$obj).remove();
    }
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Elements</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Create <small>Insert product</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" class="form-horizontal form-label-left" action="{{ route('post-product-create')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Product name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Image<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="thumbnail" style="height: auto;">
                                        
                                    </div> 
                                    <a id="upload_image" class="btn btn-primary mt-2" style="color: #FFF">Upload image</a>
                                    <input id="upload_file" class="form-control" type="file" name="image_upload[]" style="display: none;">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Product group <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="group_id" class="form-control">
                                        <option value="">-- Choose group --</option>
                                        @foreach ($product_groups as $group)
                                            <option value="{{ $group->id}}">{{ $group->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Search word<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="search_word">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Title<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="title">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Unit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="unit" class="form-control">
                                        <option value="">-- Choose unit --</option>
                                        <option value="1">Box</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                     </select>
                                </div>
                            </div> -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Brand <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="brand">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Supplier <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="supplier_id" class="form-control">
                                        <option value="">-- Choose supplier --</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tags <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="tags" placeholder="Keyword1 Keyword2 Keyword3">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="status" class="form-control">
                                        <option value="">-- Choose status --</option>
                                        <option value="0">Un-active</option>
                                        <option value="1">Active</option>
                                     </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection