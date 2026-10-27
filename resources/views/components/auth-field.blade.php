@props(['label', 'name', 'type' => 'text', 'required' => true])
{{-- One labelled field of the log-in and sign-up forms; passwords are never filled back in after an error. --}}
<div {{ $attributes->only('class')->class(['mb-3 w-full']) }}>
    <label for="{{ $name }}" class="mb-1 block font-bold text-[#1A0841]">{{ $label }} @if ($required)<span class="text-black">*</span>@endif</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" @required($required)
           @if ($type !== 'password') value="{{ old($name) }}" @endif
           class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 font-semibold text-[#1A0841] shadow focus:outline-none focus:ring-2 focus:ring-[#7C3AED]"
           {{ $attributes->only(['autocomplete', 'autofocus', 'placeholder']) }}>
</div>
