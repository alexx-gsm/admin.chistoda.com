@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>прайс</h2>
            </div>

            <div class="card-block">
                <form method="POST" action="{{ url('/admin/price/save') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="price-title" class="col-2 col-form-label">Заголовок</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Прайс" id="price-title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-2 col-form-label">Файл</label>
                        <div class="col-10">
                            <input type="file" class="form-control-file" id="price" aria-describedby="fileHelp" name="price" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">Сохранить</button>
                </form>
            </div>
            <hr>
            <div class="list-group">
                @if($prices !== null)
                    @foreach($prices as $price)
                        <a href="{{ asset($price->link) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $price->title }}</h5>
                                <span>{{ $price->name }}</span>
                                <span>
                                    <small>{{ $price->user->name }}</small>
                                    |
                                    <small>{{ $price->created_at }}</small>
                                </span>
                            </div>
                        </a>
                    @endforeach
                @endif

        </div>
    </div>



</div>

@endsection
