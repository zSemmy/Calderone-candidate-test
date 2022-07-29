@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Cost</th>
                <th scope="col">Tag</th>
                <th scope="col" colspan="2" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->title }}</td>
                <td>{{ $order->description }}</td>
                <td>{{ $order->cost }}</td>
                @foreach ($tags as $tag)
                    @if ($tag->id == $order->tag_id)
                        <td>{{ $tag->name }}</td>
                    @endif
                @endforeach
                <td><a href="{{ route('orders.restore', $order) }}">[Restore]</a></td>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
        {{ $orders->links() }}
        </div>
    </div>
@stop