<x-main>
   {{-- <div>{{auth()->user()->name}}</div>
      @foreach ($users as $user )
                {{$user->name}}
        @endforeach
    --}}
    <form method="POST" action="{{route('actionlogout')}}">
        @csrf
    <button type="submit">Log out</button>
    </form>
    <div class="container  col-md-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if ($count = $posts->count())
                            {{$count}}
                               @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="">
                                                       {{$post->title}}
                                                        <div>POSTED:{{$post->user->name}}</div>
                                                    </a>
                                                </div>
                                            </div>
                                       </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                           <img class="w-20 h-20 rounded-full" src="{{$post->getFirstMediaUrl('images')}}"/>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{route('download', $post->id)}}"><img class="w-20 h-20 rounded-full" src="{{$post->getFirstMediaUrl('downloads')}}"/></a>
                                         </td>
                                         <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{route('showedit', $post->id)}}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                            <form method="POST" action="{{route('delete', $post->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                  <div id="app">
                                    <div class="container">
                                      |
                                      <div class="row justify-content-center">
                                        <form method="POST" action="{{route("postcomment", $post)}}">
                                        @csrf
                                        <header class = "flex items-center">
                                            <img src="http://placeimg.com/80/80" alt="" width="40" height="40" class="rounded-full">
                                            <h5 class = "ml-4">What are you think about?</h5>
                                        </header>
                                            <textarea name="body" class="form-control bg-light border-0 py-3 px-2 w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick, thing of something"
                                            v-model="commentBox">
                                            </textarea>
                                        <div class="flex justify-end mt-10 border-t border-gray-200 pt-6">
                                            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" v-on:click="postComment" >Post </button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                   @foreach($post->comments as $comment)
                                    <section class="col-span-8 col-start-5 mt-10">
                                        <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
                                            <div class="flex-shrink-0">
                                                <img src="" alt="" width="60" height="60" class="rounded-xl" >
                                            </div>
                                            <div>
                                                <header class="mb-4">
                                                <h3 class = "fond-bold"> {{$comment->user->name}} said</h3>
                                                    <p class = "text-xs">
                                                        posted
                                                        <time>{{$comment->created_at->diffForHumans()}}</time>
                                                    </p>
                                                </header>
                                                <p>{{$comment->body}}</p>
                                            </div>
                                        </article>
                                    </section>

                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        </div>
         @else
            <h4>Not posts yet!</h4>
             @endif
</x-main>
