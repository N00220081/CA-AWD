@props(['colleges', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($colleges as $college)
        <option value="{{ $college->id }}" {{ $selected == $college->id ? 'selected' : '' }}>
            {{ $college->name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror