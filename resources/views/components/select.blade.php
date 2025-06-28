@props(['name', 'label', 'options' => [], 'selected' => null])

<div class="mb-5">
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) }}>
        <option value="">-- Pilih --</option>
        @foreach ($options as $key => $value)
            @php
                // misal key = ID, value = nama
                $harga = isset($hargaMap) && isset($hargaMap[$key]) ? $hargaMap[$key] : 0;
            @endphp
            <option value="{{ $key }}" data-harga="{{ $harga }}"
                {{ (string) $key === (string) $selected ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
