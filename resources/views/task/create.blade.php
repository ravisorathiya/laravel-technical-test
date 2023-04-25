<x-layout>
    <div class="container">


        <form  action="{{ route('task.store') }}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="email" class="form-control" name="title" id="title" placeholder="name@example.com">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>


            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit Task</button>
            </div>
        </form>


    </div>


</x-layout>