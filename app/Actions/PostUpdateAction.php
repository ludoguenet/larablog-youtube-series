<?php

namespace App\Actions;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostUpdateAction
{
    public function handle(Request $request, Post $post): void
    {
        $updateArray = [
            'title' => $request->title,
            'content' => $request->content
        ];

        $post->category()->associate(Category::find($request->category));

        if ($request->image != null) {
            $imageName = $request->image->store('posts');

            $updateArray = array_merge($updateArray, [
                'image' => $imageName
            ]);
        }

        $post->update($updateArray);
    }
}
