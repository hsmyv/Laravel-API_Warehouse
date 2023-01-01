<x-main>
@foreach ($users as $user )
<div>{{$user->name}}</div>
@endforeach
</x-main>
