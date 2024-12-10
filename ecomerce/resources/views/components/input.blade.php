<div class="mb-3">
  <label for="{{ $id }}" class="block text-md font-medium text-gray-900">{{ $label }}</label>
  <div class="mt-2">
      <input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" autocomplete="{{ $name }}" 
      value="{{ $value ?? '' }}" 
      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm lg:text-mg px-3">
  </div>
  @error($name)
<span class= "text-red-600 duration-200">{{ $message }}</span>
@enderror
</div>
