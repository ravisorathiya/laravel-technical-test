@props(['task'])
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $task->title  }}</h5>
        <p class="card-text">{{ $task->description }}</p>
        <h5 class="card-footer">By ~ {{ $task->username }}</h5>
    </div>
</div>
