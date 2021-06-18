<span {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-'.$colour.'-100 text-'.$colour.'-800']) }}>
    {{ $slot }}
</span>
{{-- Specify classes to prevent purgeCSS from stripping them
    bg-blue-100 bg-teal-100 bg-red-100 bg-yellow-100 bg-yellow-100 bg-green-100 bg-primary-100
    text-blue-800 text-teal-800 text-red-800 text-yellow-800 text-yellow-800 text-green-800 text-primary-800
--}}