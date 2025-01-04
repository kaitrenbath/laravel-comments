<li class="flex items-start gap-x-4 p-3">
    <span class="block size-8 shrink-0 mt-0.5 rounded-md bg-slate-100"></span>
    <div class="flex-1">
        <p class="text-sm font-semibold text-slate-800">{{ $comment->user->name }}</p>
        <p class="text-slate-800 mt-1">{{ $comment->body }}</p>
            <ul>
                @foreach ($comment->replies as $reply)
                    <x-comment-item :comment="$reply" />
                @endforeach
            </ul>
    </div>
</li>
