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
	                    @if(count($users) > 0)
	                    <div>
		                    <form class="form-horizontal form-label-left" method="POST">
			                    <table id="datatable-buttons" class="table table-striped table-bordered" style="height: auto;">
			                        <thead>
			                          	<tr>
			                          		<th>#</th>
			                          		<th>Name</th>
			                          		<th>Login ID</th>
			                          		<th>Phone number</th>
			                          		<th>Email</th>
			                          		<th>Role</th>
			                          		<th>Status</th>
			                          		<th>Thao tác</th>
			                          	</tr>
			                        </thead>
			                        <tbody>
			                          	<?php $i = 1 ?>
			                          	@foreach($users as $user)
			                          	<tr class='my-row'>
			                           		<td><?=$i++?></td>
			                           		<td>{{$user->user_name}}</td>
			                           		<td>{{$user->login_id}}</td>
			                           		<td>{{$user->tel_num}}</td>
			                           		<td>{{$user->email}}</td>
			                           		<td>{{$user->role_name}}</td>
			                           		<td>{{ $user->status == "1" ? 'Active' : 'Un-Active' }}</td>
			                           		<td>
			                             		<a href="{{route('user-update',$user->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Update </a>
			                             		<a href="{{route('user-delete', $user->id )}}" id="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
			                            	</td>
			                         	</tr>
			                          	@endforeach
			                        </tbody>
			                    </table>
                                @if($users->count())
                                    <div class="text-center">{{$users->appends($_GET)->links()}}</div>
                                @endif
		                    </form>
	                    </div>
	                    @else
	                    <p>Data empty</p>
	                    @endif
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection