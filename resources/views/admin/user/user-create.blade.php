@extends('admin.index')
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
                        <h2>Form Create <small>create user</small></h2>
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
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('post-user-create')}}" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <span class="section" >Create User</span>

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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Login ID<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="login_id" class="form-control col-md-7 col-xs-12" value="{{ old('login_id') }}">
                                </div>
                                @if($errors->has('login_id'))
                                    <p style="color: red"> {{$errors->first('login_id')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone number<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="tel_num" class="form-control col-md-7 col-xs-12" value="{{ old('tel_num') }}">
                                </div>
                                @if($errors->has('tel_num'))
                                    <p style="color: red"> {{$errors->first('tel_num')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="mail" name="email" class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
                                </div>
                                @if($errors->has('email'))
                                    <p style="color: red"> {{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax<span></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="mail" name="fax" class="form-control col-md-7 col-xs-12" value="{{ old('fax') }}">
                                </div>
                                @if($errors->has('fax'))
                                    <p style="color: red"> {{$errors->first('fax')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Birth<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="birth" class="form-control col-md-7 col-xs-12" value="{{ old('birth') }}">
                                </div>
                                @if($errors->has('birth'))
                                    <p style="color: red"> {{$errors->first('birth')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sex<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label col-md-2 col-sm-31">Male:<span></span>
                                        <div class="iradio_flat-green" style="position: relative;">
                                            <input type="radio" class="flat" name="sex" id="genderM" value="0" checked="" required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                    </label>
                                    <label class="control-label col-md-3 col-sm-31"> Female:<span></span>
                                        <div class="iradio_flat-green" style="position: relative;">
                                            <input type="radio" class="flat" name="sex" id="genderF" value="1" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                    </label>
                                    <label class="control-label col-md-2 col-sm-31">Other:<span></span>
                                        <div class="iradio_flat-green" style="position: relative;">
                                            <input type="radio" class="flat" name="sex" id="genderO" value="2" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                    </label>
                                </div>
                                @if($errors->has('sex'))
                                    <p style="color: red"> {{$errors->first('sex')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="address" class="form-control col-md-7 col-xs-12" value="{{ old('address') }}">
                                </div>
                                @if($errors->has('address'))
                                    <p style="color: red"> {{$errors->first('address')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="Nhập password...">
                                </div>
                                @if($errors->has('password'))
                                    <p style="color: red"> {{$errors->first('password')}}</p>
                                @endif
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password confirm<span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="password_confirmation" class="form-control col-md-7 col-xs-12" placeholder="Nhập lại  password...">
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <p style="color: red"> {{$errors->first('password_confirmation')}}</p>
                                @endif
                            </div>
                            <div class="item form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Roles</label>
                                <!-- <input class="form-control" name="roles" placeholder="Nhập roles..." /> -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="role_id" class="form-control col-md-7 col-xs-12">
                                        <option value="">-- Chọn role --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Mod</option>
                                        <option value="3">Member</option>
                                     </select>
                                </div>
                                @if($errors->has('role_id'))
                                    <p style="color: red"> {{$errors->first('role_id')}}</p>
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
                                    <a class="btn btn-primary" href="{{route('user-list')}}">Cancel</a>
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