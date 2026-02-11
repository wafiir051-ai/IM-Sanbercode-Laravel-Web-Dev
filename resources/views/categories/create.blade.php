@extends('layouts.app')

@section('title', 'Form Input')

@section('content')
<div class="card">
    <div class="breadcrumb">Form Input</div>
    <h1 class="page-title">Create New Category</h1>
    <p class="page-subtitle">Fill the form below to add a new category to the system.</p>

    <div class="mb-4">
        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Category Name *</label>
            <input type="text" class="form-input @error('name') is-invalid @enderror" 
                   name="name" value="{{ old('name') }}" 
                   placeholder="Enter category name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-input @error('description') is-invalid @enderror" 
                      name="description" rows="4"
                      placeholder="Enter category description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="d-flex gap-3 mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Category
            </button>
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-redo"></i> Reset Form
            </button>
        </div>
    </form>
</div>
@endsection