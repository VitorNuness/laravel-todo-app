@extends('./master')
@section('content')
    <div class="row my-4">
        <div class="col-xl-6 m-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Todo Details</h3>
                </div>

                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input readonly type="text" name="title" class="form-control" id="title" placeholder="Todo Title" value="{{ $todo->name }}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="title">Description <span class="text-danger">*</span></label>
                        <textarea readonly name="description" class="form-control" id="description" placeholder="Todo Description">{{ $todo->description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form-group mb-2">
                        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
