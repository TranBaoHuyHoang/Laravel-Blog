@extends('Frontend.layout.master')
@section('content')
<div class="page-content">

<div class="row my-5">
    <form action="{{route('contact.store')}}" method="POST" class="col-md-8">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h6 class="section-secondary-title">Contact Us :</h6>
        <div class="form-group">
            <input type="text" name="name" class="form-control" id="exampleFormControlInput2" placeholder="User Name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email address">
        </div>
        <div class="form-group">
            <input type="text" name="phone" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <input type="text" name="subject" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Enter subject">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Example textarea"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Send Message</button>
        </div>
    </form>
</div>
@endsection
