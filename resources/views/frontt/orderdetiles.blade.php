@extends('frontt.include.site')
@section('body')
<main>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach( $oreder->orderitem as $item  )
          <tr>
            <th scope="row">1</th>
            <td> {{ $item->protect->name  }} </td>
            <td> {{ $item->protect->name  }} </td>
            <td> {{ $item->protect->name  }} </td>
          </tr>
       @endforeach
        </tbody>
      </table>
  </main>

@endsection