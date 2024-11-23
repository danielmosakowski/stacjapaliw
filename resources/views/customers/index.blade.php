@extends('layouts.app')

@section('content')
        <!-- Portfolio Section-->
        <section class="masthead page-section portfolio" id="portfolio">
            <div class="container">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista klientów</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Numer klienta</th>
      <th scope="col">Adres</th>
      <th scope="col">NIP</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td><a href="{{route('customers.show', ['klienci'=>$customer->id])}}" >{{$customer->name}}</a></td>
      <td>{{$customer->address}}</td>
      <td>{{$customer->nip}}</td>
      <td><a href="{{route('customers.edit', ['klienci'=>$customer->id])}}" class="btn btn-primary">Edytuj</a>
      <form method="POST" action="{{route('customers.destroy', ['klienci'=>$customer->id])}}">
      @csrf
      @method('delete')

      <button class="btn btn-danger">Usuń</button></form></td>
    </tr>
    @endforeach

 
  </tbody>
</table>
            </div>
        </section>
@endsection    