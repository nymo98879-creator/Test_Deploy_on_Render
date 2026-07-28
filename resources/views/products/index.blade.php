@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add Product</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-thumbnail">
                                @else
                                    <span style="color: #9CA3AF; font-style: italic;">No Image</span>
                                @endif
                            </td>
                            <td><strong>{{ $product->title }}</strong></td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ Str::limit($product->des ?? $product->description, 50) }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline">Edit</a>
                                    <form action="{{ route('products.delete', $product->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                No products found. Click "Add Product" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection