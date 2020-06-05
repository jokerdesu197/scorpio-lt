@extends('admin.index')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Create <small>Product class</small></h2>
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
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('post-product-class-create')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="product_id">
                                    	<option value="">--- Choose product ---</option>
                                    	@foreach($products as $product)
                                    	<option value="{{ $product->id}}">{{ $product->name}}</option>
                                    	@endforeach
                                    </select>
                                </div>
                                @if($errors->has('product_id'))
                                    <p style="color: red"> {{$errors->first('product_id')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Product Type<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="product_type_id">
                                    	<option value="">--- Choose product type---</option>
                                    	@foreach($product_types as $type)
                                    	<option value="{{ $type->id}}">{{ $type->name}}</option>
                                    	@endforeach
                                    </select>
                                </div>
                                @if($errors->has('product_type_id'))
                                    <p style="color: red"> {{$errors->first('product_type_id')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Stock <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="stock">
                                </div>
                                @if($errors->has('stock'))
                                    <p style="color: red"> {{$errors->first('stock')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Sale limit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="sale_limit">
                                </div>
                                @if($errors->has('sale_limit'))
                                    <p style="color: red"> {{$errors->first('sale_limit')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Cost price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="price01">
                                </div>
                                @if($errors->has('price01'))
                                    <p style="color: red"> {{$errors->first('price01')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Sale price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="price02">
                                </div>
                                @if($errors->has('price02'))
                                    <p style="color: red"> {{$errors->first('price02')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Delivery date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="text" name="delivery_date">
                                </div>
                                @if($errors->has('delivery_date'))
                                    <p style="color: red"> {{$errors->first('delivery_date')}}</p>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="{{route('product-class-list')}}">Cancel</a>
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