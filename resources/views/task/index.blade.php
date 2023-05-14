<x-layout>
    <div class="container">
        <h1>Pusher Data Fetch</h1>
        <div class="container text-center">
            <div class="row row-cols-3 gap-4">
                @foreach($tasks as $task)
                    <x-task-card :task="$task">
                    </x-task-card>
                @endforeach
            </div>
        </div>
    </div>
    <script type="module">
        console.log("Hello")
        console.log(Echo.channel("task-added"))
        Echo.channel('task-added').listen('.task-event', (e) => {
            console.log(e)
        })
    </script>
</x-layout>

