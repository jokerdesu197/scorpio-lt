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
                    var images = '<div id="group-temp-image-'+index+'"><div class="image view view-first col-md-3" style="height: auto;"><img class="bg-image" src="'+path+'" alt="image"><div class="mask ml-1"><div class="tools tools-bottom" style="margin-top: 45%;"><a href="'+path+'"><i class="fa fa-link"></i></a><!-- <a href="#"><i class="fa fa-pencil"></i></a>--><a id="delete-group-'+index+'" onClick="deleteImage(0, '+index+')" style="cursor: pointer;" name="delete_images[]" image-data=""><i class="fa fa-times"></i></a></div></div></div></div>';
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
    function deleteImage(e, data) {
        $('#group-temp-image-'+data).remove();
        if (e) {
            var delete_id = '<input type="hidden" name="delete-images[]" value="'+data+'">';
            $('.thumbnail').append(delete_id);
        }
    }
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Update |<small>News</small></h2>
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
                        <p class="text-muted font-13 m-b-30"></p>
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('post-news-create', $news->id)}}" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <span class="section">Update News</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" class="form-control col-md-7 col-xs-12" value="{{ $news->name }}">
                                </div>
                                @if($errors->has('name'))
                                    <p style="color: red"> {{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="title" class="form-control col-md-7 col-xs-12" value="{{ $news->title }}">
                                </div>
                                @if($errors->has('title'))
                                    <p style="color: red"> {{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="thumbnail" style="height: auto;">
                                        @if(count($news_images) > 0)
                                            @foreach($news_images as $image)
                                                <div id="group-temp-image-{{ $image->id }}">
                                                    <div class="image view view-first col-md-3" style="height: auto;">
                                                        <img class="bg-image" src="{{ asset($image->path) }}/{{$image->file_name}}" alt="image">
                                                        <input type="hidden" name="data_images[]" value="{{$image->file_name}}|{{$image->sort_no}}">
                                                        <div class="mask ml-1">
                                                            <div class="tools tools-bottom" style="margin-top: 45%;">
                                                                <a href="{{ asset($image->path) }}{{$image->file_name}}"><i class="fa fa-link"></i></a><!-- <a href="#"><i class="fa fa-pencil"></i></a>--><a id="delete-group-{{ $image->id }}" onClick="deleteImage(1, {{ $image->id }})" style="cursor: pointer;" name="delete_images"><i class="fa fa-times"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div> 
                                    <a id="upload_image" class="btn btn-primary mt-2" style="color: #FFF">Upload image</a>
                                    <input id="upload_file" class="form-control" type="file" name="image_upload[]" style="display: none;">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News date<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="news_date" class="form-control col-md-7 col-xs-12" value="{{ date('Y-m-d', strtotime($news->news_date)) }}">
                                </div>
                                @if($errors->has('news_date'))
                                    <p style="color: red"> {{$errors->first('news_date')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Search word<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="search_word" class="form-control col-md-7 col-xs-12" value="{{ $news->search_word }}">
                                </div>
                                @if($errors->has('search_word'))
                                    <p style="color: red"> {{$errors->first('search_word')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News url<span></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="news_url" class="form-control col-md-7 col-xs-12" value="{{ $news->news_url }}">
                                </div>
                                @if($errors->has('news_url'))
                                    <p style="color: red"> {{$errors->first('news_url')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">description<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description" class="form-control col-md-7 col-xs-12">{{ $news->description }}</textarea>
                                </div>
                                @if($errors->has('description'))
                                    <p style="color: red"> {{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News type</label>
                                <!-- <input class="form-control" name="status" placeholder="Nhập status..." /> -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="news_type" class="form-control col-md-7 col-xs-12">
                                        <option value="">-- Choose type --</option>
                                        <option value="Flash News" {{ $news->news_type == "Flash News" ? 'selected' : null }}>Flash News</option>
                                        <option value="Domestic News" {{ $news->news_type == "Domestic News" ? 'selected' : null }}>Domestic News</option>
                                        <option value="International News" {{ $news->news_type == "International News" ? 'selected' : null }}>International News</option>
                                    </select>
                                </div>
                                @if($errors->has('news_type'))
                                    <p style="color: red"> {{$errors->first('news_type')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Source<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="source" class="form-control col-md-7 col-xs-12" value="{{ $news->source }}">
                                </div>
                                @if($errors->has('source'))
                                    <p style="color: red"> {{$errors->first('source')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="tags" class="form-control col-md-7 col-xs-12" value="{{ $news->tags }}">
                                </div>
                                @if($errors->has('tags'))
                                    <p style="color: red"> {{$errors->first('tags')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                <!-- <input class="form-control" name="status" placeholder="Nhập status..." /> -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="status" class="form-control col-md-7 col-xs-12">
                                        <option value="">-- Choose status --</option>
                                        <option value="1" {{ $news->status == "1" ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $news->status == "0" ? 'selected' : null }}>Un-Active</option>
                                    </select>
                                </div>
                                @if($errors->has('status'))
                                    <p style="color: red"> {{$errors->first('status')}}</p>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a class="btn btn-primary" href="{{route('news-list')}}">Cancel</a>
                                    <button name="send" type="submit" class="btn btn-success">Submit</button>
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