<x-main>
    <div class="container  col-md-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            
                            @if ($posts->count())
                               @foreach ($posts as $post)
                                   
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="">
                                                       {{$post->title}}
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