@extends('./master')
@section('content')
    <form action=" {{ route('todos.update', $todo->id) }} " method="POST">
        @csrf
        @method('PUT')
        <div class="row my-4">
            <div class="col-xl-6 m-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">Update Todo</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Todo Title" value="{{ $todo->name }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" placeholder="Todo Description">{{ $todo->description }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="completed">Completed <span class="text-danger">*</span></label>
                            <select class="form-select" name="completed" id="completed">
                                <option value="" selected disabled>Select Status</option>
                                <option value="1" @if ($todo->is_completed == 1)
                                    selected
                                @endif>Completed</option>
                                <option value="0" @if ($todo->is_completed == 0)
                                    selected
                                @endif>Pending</option>
                            </select>
                            @error('completed')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        <div class="form-group mb-2">
                            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
