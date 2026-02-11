@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="breadcrumb">Dashboard</div>
    <h1 class="page-title">Category Management</h1>
    <p class="page-subtitle">Manage your categories efficiently with full CRUD operations.</p>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="section-title">Category List</h2>
            <p>Total Categories: {{ $categories->count() }}</p>
        </div>
        <br>
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Category
        </a>
    </div>
    <br>

    @if($categories->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->description ?? '-' }}</td>
                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('category.show', $category) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $category) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-5">
            <h2 class="section-title">No Categories Found</h2>
            <p class="page-subtitle">Start by creating your first category</p>
            <a href="{{ route('category.create') }}" class="btn btn-primary mt-3">
                <i class="fas fa-plus"></i> Create First Category
            </a>
        </div>
    @endif
</div>
@endsection