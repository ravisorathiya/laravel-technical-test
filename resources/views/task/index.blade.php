<x-layout>
    <div class="container">

        <h1>Pusher Data Fetch</h1>


            <div class="container">
                <div class="container text-center">
                    <div class="row row-cols-3 gap-4">
                        @foreach($tasks as $task)

                            <x-task-card :task="$task">

                            </x-task-card>
                        @endforeach
                    </div>
                </div>
            </div>


    </div>


</x-layout>