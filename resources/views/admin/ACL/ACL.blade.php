@extends('admin.index')
@section('content')
<div class="right_col">
    <!-- <div class="col-sm-10">
    </div>
    <div class="col-sm-2">
        <a href="{{URL::previous()}}" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Trở về</a>
    </div> -->
    <!-- <div class="page-title">
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
    </div> -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Create <small>| Role/Permissions</small></h2>
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
                    <form class="form-horizontal" method="post" action="{{route('post-ACL-create')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-9 pb-2">
                                <a id="check-role"><b>Chọn role có sẵn</b></a>
                                <input id="choose_role" type="checkbox" name="choose_role">
                                <!-- <label>Chọn role có sẵn</label> -->
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Tên quyền</label>
                            <div class="col-sm-9 pb-2">
                                <input class="form-control role-no" type="text" name="name">
                                <select name="role_id" class="form-control role-yes" style="display: none;">
                                    <option value="">-- Chọn role --</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-9 pb-2">
                                <textarea rows="6" cols="50" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Quyền hạn</label>
                            <div class="col-sm-9 pb-2">
                                <div class="table-responsive table-wrapper-scroll-y color">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <!-- quyền thứ 1 -->
                                                <td class="table-light">
                                                    <input id="permission-1" data="1" type="checkbox" class="i-checks check-permission-1" name="permission[]"  value="1" onclick="checkAllJquery('permission-1', 'check-permission-1');">
                                                    <span class="m-l-xs">Toàn quyền Role</span>
                                                </td>
                                                <td class="table-active"></td>
                                            </tr>
                                            @foreach ($permission_1 as $perm)
                                            <tr>
                                                <td class="table-active"></td>
                                                <td class="table-light">
                                                    <input id="permission-2" data="2" type="checkbox" class="i-checks check-permission-1" name="permission_id[]"  value="{{$perm->id}}">
                                                    <span class="m-l-xs">{{$perm->description}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <!-- quyền thứ 2 -->
                                                <td class="table-light">
                                                    <input id="permission-3" data="1" type="checkbox" class="i-checks check-permission-2" name="permission[]"  value="1" onclick="checkAllJquery('permission-3', 'check-permission-2');">
                                                    <span class="m-l-xs">Toàn quyền User</span>
                                                </td>
                                                <td class="table-active"></td>
                                            </tr>
                                            @foreach ($permission_2 as $perm)
                                            <tr>
                                                <td class="table-active"></td>
                                                <td class="table-light">
                                                    <input id="permission-4" data="2" type="checkbox" class="i-checks check-permission-2" name="permission_id[]"  value="{{$perm->id}}">
                                                    <span class="m-l-xs">{{$perm->description}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-9 text-center">
                                <button type="submit" class="btn btn-primary">Save <i class="glyphicon glyphicon-floppy-save"></i></button>
                                <a href="" class="btn btn-danger">Clear</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#choose_role').click(function() {
            var roleCheck = $('#choose_role').is(":checked");
            if (roleCheck) {
                console.log(1);
                $('.role-yes').removeAttr("style");
                $('.role-no').css("display","none");
            }else{console.log(2);
                $('.role-yes').css("display","none");
                $('.role-no').removeAttr("style");
            }
        });
    });
    function checkAllJquery(baseId, itemClass) {
        var baseCheck = $('#' + baseId).is(":checked");
        $('.' + itemClass).each(function() {
            if (!$(this).is(':disabled')) {
                $(this).prop('checked', baseCheck);
            }
        });
    }
</script>
<style type="text/css">
    .color{
        background-color: white;
    }
    .table-wrapper-scroll-y{
        display: block;
        max-height: 500px;
        overflow-y: auto;
    }
</style>
@endsection