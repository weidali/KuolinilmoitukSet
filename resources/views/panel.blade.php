@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            

            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">phone</th>
      <th scope="col">Created at</th>
      <th scope="col">Status</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach($leads as $lead)
        <tr>
          <th scope="row">{{ $lead->id }}</th>
          <td>{{ $lead->name }}</td> {{--  ?? '' --}}
          <td>{{ $lead->phone }}</td>
          <td>{{ $lead->created_at }}</td>
          <td>{{ $lead->status }}</td>
          <td><a href="#" class="btn btn-sm btn-primary">Open</a></td>
        </tr>
    @endforeach

    
    
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
