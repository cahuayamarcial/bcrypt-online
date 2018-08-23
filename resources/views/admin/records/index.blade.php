@extends('admin.layouts.app')
@section('title', 'Encriptaciones')
@section('active-records', 'active')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover table-border-top">
                <div class="card-header ">
                    <h4 class="card-title">Encriptaciones</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th width="70">ID</th>
                            <th>Usuario</th>
                            <th>texto</th>
                            <th>Hash</th>
                            <th width="140" class="text-center">Estado</th>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            	<tr>
	                                <td>{{ $record->id }}</td>
	                                <td>
	                                	@if (empty($record->user_id))
                                            <div class="profile-user">
                                                <img src="https://image.prntscr.com/image/0HvfieK0R6CVaRAeVKPLsA.png" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <p class="name-user">Anónimo</p>
                                        @else
                                            <div class="profile-user">
                                                <img src="{{ $record->user->profile }}" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <p class="name-user">{{ $record->user->name }}</p>
                                        @endif
	                                </td>
	                                <td>{{ $record->text }}</td>
	                                <td><input class="form-control" type="text" value="{{ $record->hash }}"></td>
	                                <td class="text-center">
	                                	@if ($record->state == '1')
	                                		<span class="badge badge-primary">Activo</span>
	                                	@else
	                                		<span class="badge badge-danger">Eliminado</span>
	                                	@endif
	                                </td>
	                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate-ml pull-right">
                    	{!! $records->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection