@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-[#1a1a21] border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm transition duration-200 py-3']) !!}>
