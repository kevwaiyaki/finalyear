@extends('students.layout')
@section('content')
<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'egait');
	if (!$db) {
		echo "connection failed";
	}
?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a  class="btn btn-primary" href="{{ route('students.index') }}">Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('students.update',$student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email</strong>
                <input type="text" name="email" value="{{ $student->email }}" class="form-control" placeholder="email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>reg</strong>
                <input type="text" name="reg" value="{{ $student->reg }}" class="form-control" placeholder="reg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category</strong>
                <input type="text" name="category" value="{{ $student->category }}" class="form-control" placeholder="category">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>subject</strong>
                <input type="text" name="subject" value="{{ $student->subject }}" class="form-control" placeholder="subject">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>message</strong>
                <input type="text" name="message" value="{{ $student->message }}" class="form-control" placeholder="message">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <?php
                $query = mysqli_query($db, "select * from students");
                if ($row = mysqli_fetch_array($query)) {
            ?>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto; background-color: rgb(147, 221, 103)"><a href="<?php echo $row['id']; ?>) }}">Submit</a></button>
            <?php  } ?>
        </div>
    </div>
</form>
@endsection
