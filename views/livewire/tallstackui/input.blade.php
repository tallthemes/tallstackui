<div class="mb-6 h-20">
    @if(!empty($label))
        <label class="block text-sm font-medium leading-5 text-gray-700">{{ $label }}</label>
    @endif
    <div class="my-1 relative rounded-md shadow-sm">
        <input type="{{ $type }}"
               class="block w-full outline-none focus:outline-none appearance-none bg-white border border-gray-200 rounded-md text-base py-2 px-4 leading-6"
               name="{{ $name }}"
               placeholder="{{ $placeholder }}"
               wire:model="value">
        @if($clearable && strlen($value) > 0)
            <button
                    wire:click.prevent="resetValue"
                    class="w-4 h-4 absolute text-gray-300 top-3 right-2 outline-none focus:outline-none appearance-none">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        @endif
    </div>
    @foreach($fieldErrors as $error)
        <span class="block text-xs italic leading-3 text-red-600">{{ $error }}</span>
    @endforeach
</div>