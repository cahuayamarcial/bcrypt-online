@extends('admin.layouts.app')
@section('title', 'Logs')
@section('active-logs', 'active')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover table-border-top">
                <div class="card-header ">
                    <h4 class="card-title">Logs</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th width="70">ID</th>
                            <th>Usuario</th>
                            <th>Actividad</th>
                            <th>Dirección ip</th>
                            <th class="text-center" width="180">Fecha y hora</th>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                            	<tr>
	                                <td>{{ $log->id }}</td>
	                                <td>
                                        <a class="user-color" href="{{ url('usuario') }}/{{ $log->user_id }}">
    	                                	<div class="profile-user">
    	                                		<img src="{{ $log->user->profile }}" alt="" class="img-fluid rounded-circle">
    	                                	</div>
    	                                	<p class="name-user">{{ $log->user->name }}</p>
                                        </a>
	                                </td>
	                                <td>{{ $log->detail }}</td>
	                                <td>{{ $log->ip }}</td>
                                    <td class="text-center">{{ $log->created_at }}</td>
	                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate-ml pull-right">
                    	{!! $logs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection