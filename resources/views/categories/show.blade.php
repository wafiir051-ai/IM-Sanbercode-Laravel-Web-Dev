@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="card">
    <div class="breadcrumb">Category Details</div>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title">{{ $category->name }}</h1>
            <p class="page-subtitle">Detailed information about this category</p>
        </div>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <div class="grid-2">
        <div class="form-group">
            <label class="form-label">Category Name</label>
            <div class="form-input" style="background-color: #f9fafb; border: none;">
                {{ $category->name }}
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Category ID</label>
            <div class="form-input" style="background-color: #f9fafb; border: none;">
                {{ $category->id }}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Description</label>
        <div class="form-input" style="background-color: #f9fafb; border: none; min-height: auto;">
            {{ $category->description ?? 'No description provided' }}
        </div>
    </div>

    <div class="grid-2">
        <div class="form-group">
            <label class="form-label">Created At</label>
            <div class="form-input" style="background-color: #f9fafb; border: none;">
                {{ $category->created_at->format('d F Y, H:i:s') }}
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Last Updated</label>
            <div class="form-input" style="background-color: #f9fafb; border: none;">
                {{ $category->updated_at->format('d F Y, H:i:s') }}
            </div>
        </div>
    </div>

    <div class="d-flex gap-3 mt-4">
        <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit Category
        </a>
        <form action="{{ route('category.destroy', $category) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                <i class="fas fa-trash"></i> Delete Category
            </button>
        </form>
    </div>
</div>

<style>
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }
    
    @media (max-width: 768px) {
        .grid-2 {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection