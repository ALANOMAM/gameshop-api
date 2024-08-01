


@extends('layouts.app')

@section('content')

 {{--@dd($lead)--}}

 <h1>lead page</h1>

 <p>
    <ul>
        <li>
            Da: {{$lead->customer_name}}
        </li>
        <li>
            Email: {{$lead->customer_email}}
        </li>
        <li>
            prezzo: <br>
            {{$lead->total_price }}
        </li>
    </ul>
</p>


    
@endsection