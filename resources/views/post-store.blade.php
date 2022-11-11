<x-main>
{{auth()->user()->name}}
<div class="max-w-6xl mx-auto mt-12">
    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
          <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
            <div class="mt-1">
              <input name="title" type="text" id="title" wire:model.lazy="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
          </div>

          <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Post Image </label>
            <div class="mt-1">
              <input name="image" type="file" id="image" wire:model="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Download Image </label>
            <div class="mt-1">
              <input name="downloadimage" type="file" id="image" wire:model="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
            <div class="mt-1">
              <textarea name="body" id="body" rows="3" wire:model.lazy="body" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <button type="submit">Post</button>

        </form>
      </div>
</div>
</x-main>
