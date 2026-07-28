@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Edit Product</h1>
        <a href="{{ route('products.index') }}" class="btn btn-outline">Back to Products</a>
    </div>

    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required>
                @error('title') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                @error('price') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
                @error('stock') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="image">Product Image (Leave empty to keep current image)</label>
                @if($product->image)
                    <div style="margin-bottom: 0.5rem;" id="image-preview-container">
                        <img id="image-preview" src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                @else
                    <div style="margin-bottom: 0.5rem; display: none;" id="image-preview-container">
                        <img id="image-preview" src="#" alt="Preview" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)">
                @error('image') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="des">Description</label>
                <textarea name="des" id="des" cols="30" rows="5">{{ old('des', $product->des ?? $product->description) }}</textarea>
                @error('des') <span style="color: var(--danger); font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline" style="text-decoration: none;">Cancel</a>
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
                // If there was an old image on load, we should ideally keep it if user cancels file selection, 
                // but since browsers don't easily clear file inputs unless done manually, 
                // this simple logic is fine for basic CRUD.
                @if(!$product->image)
                    previewImage.src = '#';
                    previewContainer.style.display = 'none';
                @else
                    previewImage.src = "{{ asset('storage/' . $product->image) }}";
                    previewContainer.style.display = 'block';
                @endif
            }
        }
    </script>
@endsection