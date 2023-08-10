<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 8 CRUD Tutorial From Scratch</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel 8 CRUD Example Tutorial</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('Sysadmin.create') }}"> Create Sysadmin</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Sysadmin Name</th>
<th>Sysadmin Email</th>
<th>Sysadmin Address</th>
<th width="280px">Action</th>
</tr>
@foreach ($Sysadmin as $Sysadmin)
<tr>
<td>{{ $Sysadmin->id }}</td>
<td>{{ $Sysadmin->name }}</td>
<td>{{ $Sysadmin->email }}</td>
<td>{{ $Sysadmin->address }}</td>
<td>
<form action="{{ route('Sysadmin.destroy',$Sysadmin->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('Sysadmin.edit',$Sysadmin->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $Sysadmin->links() !!}
</body>
</html>
