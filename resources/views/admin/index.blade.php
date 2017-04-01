@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div>
            <ul class="list-group">
                @if(null !== $price)
                    <li class="list-group-item">
                        Прайс:  <span>{{ $price->name }}</span>
                        <span>{{ $price->user->name }}</span>
                        <span>{{ $price->created_at }}</span>
                    </li>
                @endif
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
    </div>

</div>

@endsection
