@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Items Management</h2>
                <a class="btn btn-success" href="{{ route('items.create') }}">Create New Item</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="25%">Name</th>
                    <th width="45%">Description</th>
                    <th width="25%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ Str::limit($item->description, 50) }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('items.show',$item->id) }}" class="btn btn-info btn-sm mr-2">
                                <i class="fas fa-eye"></i> Show
                            </a>
                            <a href="{{ route('items.edit',$item->id) }}" class="btn btn-primary btn-sm mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('items.destroy',$item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Are you sure to delete this item?')">
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

    <div class="mt-4">
        {!! $items->links() !!}
    </div>
</div>
@endsection