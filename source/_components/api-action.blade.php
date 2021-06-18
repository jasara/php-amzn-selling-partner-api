<div class="bg-gray-100 overflow-hidden rounded-lg p-4">
    <div class="flex flex-row">
        <x-badge :colour="$badgeColour">
            {{ strtoupper($method) }}
        </x-badge>
        <code class="bg-gray-200 ml-2">
            {{ $endpoint }}
        </code>
    </div>
    
    @if(count($parametersArray()))
    <x-table.base class="mt-2">
        <x-slot name="headings">
            <x-table.th>Parameter</x-table.th>
            <x-table.th>Type</x-table.th>
            <x-table.th>Examples</x-table.th>
            <x-table.th>Description</x-table.th>
        </x-slot>
    
        @foreach($parametersArray() as $parameter)
        <tr class="bg-white">
            <x-table.td><code>{{$parameter['parameter']}}</code></x-table.td>
            <x-table.td>
                <x-badge colour="blue">{{$parameter['type']}}</x-badge>
            </x-table.td>
            <x-table.td>{{$parameter['example']}}</x-table.td>
            <x-table.td>{{$parameter['description']}}</x-table.td>
        </tr>
        @endforeach
    </x-table.base>
    @endif
</div>