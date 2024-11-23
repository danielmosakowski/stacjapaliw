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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dane klienta</h2>
                <p>{{$customer->name}}</p>
                <p>{{$customer->address}}</p>
                <p>{{$customer->nip}}</p>                
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista faktur powiązanych</h2>
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
      <th scope="col">Numer faktury</th>
      <th scope="col">Data</th>
      <th scope="col">Kwota</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customer->invoices as $invoice)
    <tr>
      <th scope="row">{{$invoice->id}}</th>
      <td>{{$invoice->number}}</td>
      <td>{{$invoice->date}}</td>
      <td>{{$invoice->total}}</td>
      <td><a href="{{route('invoices.edit', ['id'=>$invoice->id])}}" class="btn btn-primary">Edytuj</a>
      <form method="POST" action="{{route('invoices.delete', ['id'=>$invoice->id])}}">
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