@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Add New Product</h1>
        <a href="{{ route('products.index') }}" class="btn btn-outline">Back to Products</a>
    </div>

    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter product title" required value="{{ old('title') }}">
                @error('title') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" placeholder="0.00" required value="{{ old('price') }}">
                @error('price') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" placeholder="0" required value="{{ old('stock') }}">
                @error('stock') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <div style="margin-bottom: 0.5rem; display: none;" id="image-preview-container">
                    <img id="image-preview" src="#" alt="Preview" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <input type="file" name="image" id="image" accept="image/*" required onchange="previewImage(this)">
                @error('image') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="des">Description</label>
                <textarea name="des" id="des" cols="30" rows="5" placeholder="Enter product description">{{ old('des') }}</textarea>
                @error('des') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <button type="reset" class="btn btn-outline">Reset</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                previewImage.src = '#';
                previewContainer.style.display = 'none';
            }
        }
    </script>
@endsection