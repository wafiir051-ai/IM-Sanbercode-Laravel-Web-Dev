@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="card">
    <div class="breadcrumb">Edit Category</div>
    <h1 class="page-title">Edit Category: {{ $category->name }}</h1>
    <p class="page-subtitle">Update the category information below.</p>

    <div class="mb-4">
        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <form action="{{ route('category.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        
        
        <div class="form-group">
            <label class="form-label">Category Name *</label>
            <input type="text" class="form-input @error('name') is-invalid @enderror" 
                   name="name" value="{{ old('name', $category->name) }}" 
                   placeholder="Enter category name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-input @error('description') is-invalid @enderror" 
                      name="description" rows="4"
                      placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="d-flex gap-3 mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Category
            </button>
            <a href="{{ route('category.show', $category) }}" class="btn btn-info">
                <i class="fas fa-eye"></i> View Details
            </a>
        </div>
    </form>
</div>
@endsection