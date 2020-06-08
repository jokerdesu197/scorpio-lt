@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form list <small>News</small></h2>
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
                        @if(count($news) > 0)
                        <div>
                            <form class="form-horizontal form-label-left" method="POST">
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="height: auto;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>News date</th>
                                            <th>Source</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($news as $item)
                                        <tr class='my-row'>
                                            <td><?=$i++?></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{date('Y-m-d', strtotime($item->news_date))}}</td>
                                            <td>{{$item->source}}</td>
                                            <td>{{$item->tags}}</td>
                                            <td>{{$item->status == "1" ? 'Active' : 'Un-Active' }}</td>
                                            <td>
                                                <a href="{{route('news-update',$item->id )}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Update </a>
                                                <a href="{{route('news-delete', $item->id )}}" id="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($news->count())
                                    <div class="text-center">{{$news->appends($_GET)->links()}}</div>
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