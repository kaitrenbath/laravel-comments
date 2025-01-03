<x-layout>
    <h1 class="text-xl text-slate-800">{{ $post->title }}</h1>
    <section class="border border-slate-200 mt-12">
        <header class="py-1 px-3 border-b border-slate-100 bg-slate-50">
            <span class="text-sm font-medium text-slate-800">Comments</span>
        </header>
        <ul class="divide-y divide-slate-100">
            @foreach($post->comments as $comment)
                <li class="flex items-start gap-x-4 p-3">
                    <span class="block size-8 mt-0.5 rounded-md bg-slate-100"></span>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">{{ $comment->user->name }}</p>
                        <p class="text-slate-800 mt-1">{{ $comment->body }}</p>
                        @if ($comment->replies_count)
                            <button type="button" class="text-xs font-semibold text-slate-500">Show {{ $comment->replies_count }} replies</button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</x-layout>
