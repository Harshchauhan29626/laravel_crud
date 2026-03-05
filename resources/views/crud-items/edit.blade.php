@extends('layouts.app')

@section('title', 'Edit CRUD Item')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h4 mb-4">Edit CRUD Item</h1>

            @include('partials.form-errors')

            <form action="{{ route('crud-items.update', $crudItem) }}" method="POST">
                @method('PUT')
                @include('crud-items._form')

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('crud-items.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
