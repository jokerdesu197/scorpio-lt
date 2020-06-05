@extends('admin.index')
@section('content')
<div class="right_col">
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
                        <div class="form-group" style="display: none;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-9 pb-2">
                                <a id="check-role"><b>Chọn role có sẵn</b></a>
                                <input id="choose_role" type="checkbox" name="choose_role">
                                <!-- <label>Chọn role có sẵn</label> -->
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Role name</label>
                            <div class="col-sm-9 pb-2">
                                <input class="form-control role-no" type="text" name="name">
                                <select name="role_id" class="form-control role-yes" style="display: none;">
                                    <option value="">-- Choose role --</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-9 pb-2">
                                <textarea rows="6" cols="50" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Permissions</label>
                            <div class="col-sm-9 pb-2">
                                <div class="table-responsive table-wrapper-scroll-y color">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <!-- quyền thứ 1 -->
                                                <td class="table-light">
                                                    <input id="permission-1" data="1" type="checkbox" class="i-checks check-permission-1" name="permission[]"  value="1" onclick="checkAllJquery('permission-1', 'check-permission-1');">
                                                    <span class="m-l-xs">Access Control List </span>
                                                </td>
                                                <td class="table-active"></td>
                                            </tr>
                                            @foreach ($permissions['ACL'] as $perm)
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
                                                    <span class="m-l-xs">User Control</span>
                                                </td>
                                                <td class="table-active"></td>
                                            </tr>
                                            @foreach ($permissions['users'] as $perm)
                                            <tr>
                                                <td class="table-active"></td>
                                                <td class="table-light">
                                                    <input id="permission-4" data="2" type="checkbox" class="i-checks check-permission-2" name="permission_id[]"  value="{{$perm->id}}">
                                                    <span class="m-l-xs">{{$perm->description}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <!-- quyền thứ 3 -->
                                                <td class="table-light">
                                                    <input id="permission-5" data="1" type="checkbox" class="i-checks check-permission-3" name="permission[]"  value="1" onclick="checkAllJquery('permission-5', 'check-permission-3');">
                                                    <span class="m-l-xs">Role Control</span>
                                                </td>
                                                <td class="table-active"></td>
                                            </tr>
                                            @foreach ($permissions['roles'] as $perm)
                                            <tr>
                                                <td class="table-active"></td>
                                                <td class="table-light">
                                                    <input id="permission-6" data="2" type="checkbox" class="i-checks check-permission-3" name="permission_id[]"  value="{{$perm->id}}">
                                                    <span class="m-l-xs">{{$perm->description}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <!-- quyền thứ 4 -->
                                                <td class="table-light">
                                                    <input id="permission-7" data="1" type="checkbox" class="i-checks check-permission-4" name="permission[]"  value="1" onclick="checkAllJquery('permission-7', 'check-permission-4');">
                                                    <span class="m-l-xs">Products Control</span>
                                                </td>
                                                <td class="table-active"></td>
                                            </tr>
                                            @foreach ($permissions['products'] as $perm)
                                            <tr>
                                                <td class="table-active"></td>
                                                <td class="table-light">
                                                    <input id="permission-8" data="2" type="checkbox" class="i-checks check-permission-4" name="permission_id[]"  value="{{$perm->id}}">
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
                $('.role-yes').removeAttr("style");
                $('.role-no').css("display","none");
            }else{
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