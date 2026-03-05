@extends('layouts.app')

@section('title', 'CRUD Items')

@section('content')
    @include('partials.flash')

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
                <h1 class="h4 mb-0">CRUD Items</h1>
                <a href="{{ route('crud-items.create') }}" class="btn btn-primary">Create</a>
            </div>

            <form method="GET" action="{{ route('crud-items.index') }}" class="row g-2 mb-4">
                <div class="col-12 col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search title/category/notes"
                        value="{{ $search }}">
                </div>
                <div class="col-6 col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="active" @selected($status === 'active')>Active</option>
                        <option value="inactive" @selected($status === 'inactive')>Inactive</option>
                    </select>
                </div>
                <div class="col-6 col-md-3 d-grid">
                    <button type="submit" class="btn btn-outline-secondary">Filter</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($crudItems as $crudItem)
                            <tr>
                                <td>{{ $crudItem->title }}</td>
                                <td>{{ $crudItem->category ?: '—' }}</td>
                                <td>
                                    <span class="badge text-bg-{{ $crudItem->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($crudItem->status) }}
                                    </span>
                                </td>
                                <td>{{ $crudItem->created_at->format('Y-m-d H:i') }}</td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('crud-items.show', $crudItem) }}" class="btn btn-outline-info">View</a>
                                        <a href="{{ route('crud-items.edit', $crudItem) }}" class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('crud-items.destroy', $crudItem) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">No CRUD items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($crudItems->hasPages())
            <div class="card-footer bg-white">
                {{ $crudItems->links() }}
            </div>
        @endif
    </div>
@endsection
