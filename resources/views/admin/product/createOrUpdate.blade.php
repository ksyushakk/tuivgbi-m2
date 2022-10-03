@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="col-6">
                    <form action="{{route('admin.product.store')}}">
                        @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    </form>
                    <div class="col"></div>
            </div>
        </div>
    </div>

@endsection
