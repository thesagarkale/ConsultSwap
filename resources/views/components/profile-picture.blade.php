@props(['user'])

<!-- TODO: Need to redo with VueJS -->
<div class="flex flex-col items-center">
    <div class="relative bg-gray-200 rounded-full max-w-min">
        <i class="fa fa-user-alt p-8 fa-lg"></i>
        <span class="rounded-full absolute bottom-0 p-1 bg-green-300"></span>
    </div>
    <div class="text-gray-500 pt-2">
        {{ $user->getProfileUsername() }}
    </div>
</div>

