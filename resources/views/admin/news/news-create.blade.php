@extends('admin.master')
@section('content')
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
                        <h2>Form Create <small>News</small></h2>
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
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('post-news-create')}}" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <span class="section">Create News</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" class="form-control col-md-7 col-xs-12" value="{{ old('name') }}">
                                </div>
                                @if($errors->has('name'))
                                    <p style="color: red"> {{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="title" class="form-control col-md-7 col-xs-12" value="{{ old('title') }}">
                                </div>
                                @if($errors->has('title'))
                                    <p style="color: red"> {{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News date<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="news_date" class="form-control col-md-7 col-xs-12" value="{{ old('news_date') }}">
                                </div>
                                @if($errors->has('news_date'))
                                    <p style="color: red"> {{$errors->first('news_date')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Search word<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="search_word" class="form-control col-md-7 col-xs-12" value="{{ old('search_word') }}">
                                </div>
                                @if($errors->has('search_word'))
                                    <p style="color: red"> {{$errors->first('search_word')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">News url<span></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="news_url" class="form-control col-md-7 col-xs-12" value="{{ old('news_url') }}">
                                </div>
                                @if($errors->has('news_url'))
                                    <p style="color: red"> {{$errors->first('news_url')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">description<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description" class="form-control col-md-7 col-xs-12">{{ old('description') }}</textarea>
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
                                        <option value="">-- Chọn type --</option>
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Chưa kích hoạt</option>
                                    </select>
                                </div>
                                @if($errors->has('news_type'))
                                    <p style="color: red"> {{$errors->first('news_type')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Source<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="source" class="form-control col-md-7 col-xs-12" value="{{ old('source') }}">
                                </div>
                                @if($errors->has('source'))
                                    <p style="color: red"> {{$errors->first('source')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="tags" class="form-control col-md-7 col-xs-12" value="{{ old('tags') }}">
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
                                        <option value="">-- Chọn status --</option>
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Chưa kích hoạt</option>
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