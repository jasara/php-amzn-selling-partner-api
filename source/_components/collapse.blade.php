<div class="bg-gray-100 overflow-hidden rounded-lg p-4 my-2" x-data="{ open: false }">
    <div class="flex flex-row justify-between items-center cursor-pointer" @click="open = true">
        <h4 class="text-blue-500 mb-0">{{$title}}</h4>
        <span x-show="! open" class="h-4 w-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </span>
        <span x-show="open" class="h-4 w-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
            </svg>
        </span>
    </div>
    <div x-show.transition.scale.origin.top.left="open" @click.away="open = false">
        <pre class="skip">{{$json($slug)}}</pre>
    </div>
</div>