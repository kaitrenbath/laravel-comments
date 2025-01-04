<x-layout>
    <h1 class="text-xl text-slate-800">{{ $post->title }}</h1>
    <section class="border border-slate-200 mt-12">
        <header class="py-1 px-3 border-b border-slate-100 bg-slate-50">
            <span class="text-sm font-medium text-slate-800">Comments</span>
        </header>
        @if ($post->comments->isNotEmpty())
            <ul class="divide-y divide-slate-100">
                @foreach($post->comments as $comment)
                    <x-comment-item :comment="$comment" />
                @endforeach
            </ul>
        @endif;
    </section>
</x-layout>
