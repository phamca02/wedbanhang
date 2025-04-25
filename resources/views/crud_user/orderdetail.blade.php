@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <th>{{ $item->product_id }}</th>
                        <th>{{ $item->product_name }}</th>
                        <th>{{ $item->price }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection