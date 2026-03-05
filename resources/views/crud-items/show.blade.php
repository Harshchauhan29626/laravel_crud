@extends('layouts.app')

@section('title', 'CRUD Item Details')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h4 mb-4">CRUD Item Details</h1>

            <div class="row mb-3">
                <div class="col-sm-3 fw-semibold">Title</div>
                <div class="col-sm-9">{{ $crudItem->title }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-semibold">Category</div>
                <div class="col-sm-9">{{ $crudItem->category ?: '—' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 fw-semibold">Status</div>
                <div class="col-sm-9">
                    <span class="badge text-bg-{{ $crudItem->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($crudItem->status) }}
                    </span>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold">Notes</div>
                <div class="col-sm-9">{{ $crudItem->notes ?: '—' }}</div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('crud-items.edit', $crudItem) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('crud-items.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
