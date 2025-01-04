<?php

namespace App\View\Components;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class CommentItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Comment $comment,
        public Collection $comments
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment-item');
    }
}
