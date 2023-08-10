@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
    $con = new mysqli('localhost','root','','egait');
    $query =mysqli_query($con, "SELECT
    category as category,
        COUNT(category) as numbers
    FROM students
    GROUP BY category");

    foreach ($query as $row) {
        $month[]=$row['category'];
        $amount[]=$row['numbers'];
    }


?>
<div style="width: 500px">
    <canvas id="myChart"></canvas>
</div>
<script>


    const labels = <?php echo json_encode($month)?>;
    const data = {
    labels: labels,
    datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($amount)?>,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
    };
    const config = {
        type: 'line',
        data: data,
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
@endsection

<div class="pull-left">
    <h1>Submit Ticket</h1>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('students.create') }}">submit a ticket </a>
        </div>
    </div>
</div>
@if ($message=Session::get('success'))
    <div class="aleart alert-success">
        <p>{{ $message }}</p>
    </div>

@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>email</th>
        <th>reg</th>
        <th>category</th>
        <th>subject</th>
        <th>message</th>
        <th width="280px">Action </th>
    </tr>
    @foreach ($students as $student )
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->reg }}</td>
            <td>{{ $student->category }}</td>
            <td>{{ $student->subject }}</td>
            <td>{{ $student->message }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    <a  class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                    <a  class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    {{ Auth::user()->name }}
