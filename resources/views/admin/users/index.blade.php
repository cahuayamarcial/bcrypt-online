@extends('admin.layouts.app')
@section('title', 'Usuarios')
@section('active-users', 'active')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover table-border-top">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="card-title">Usuarios</h4>
                        </div>
                        <div class="col-lg-4">
                            <form action="{{ url('admin/usuarios') }}" method="GET">
                                <div class="input-group form-group-ml">
                                    <input type="text" name="name" class="form-control" placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <button class="btn btn-orange pointer b-radius-right" type="submit">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th width="70">ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Provinencia</th>
                            <th width="140" class="text-center">Tipo de usuario</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            	<tr>
	                                <td>{{ $user->id }}</td>
	                                <td>
	                                	<div class="profile-user">
	                                		<img src="{{ $user->profile }}" alt="" class="img-fluid rounded-circle">
	                                	</div>
	                                	<p class="name-user">{{ $user->name }}</p>
	                                </td>
	                                <td>{{ $user->email }}</td>
	                                <td>{{ $user->provider }}</td>
	                                <td class="text-center">
	                                	@if ($user->rol == 'admin')
	                                		<span class="badge badge-primary">Administrador</span>
	                                	@else
	                                		<span class="badge badge-secondary">Usuario</span>
	                                	@endif
	                                </td>
	                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate-ml pull-right">
                    	{!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection