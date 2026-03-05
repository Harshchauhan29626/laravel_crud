@extends('layouts.app')

@section('title', 'Create CRUD Item')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h4 mb-4">Create CRUD Item</h1>

            @include('partials.form-errors')

            <form action="{{ route('crud-items.store') }}" method="POST">
                @include('crud-items._form')

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('crud-items.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
