@props([
    'theme' => '',
    'column' => null,
    'inline' => null,
    'inputText' => null
])
<div>
    @if(filled($inputText))
        <div class="@if(!$inline) pt-1 p-2 @endif">
            @if(!$inline)
                <label>{{ $inputText['label'] }}</label>
            @endif
            <div class="@if($inline) flex flex-col @else flex flex-row @endif">
                <div class="@if(!$inline) pl-0 pt-1 pr-3 @endif">
                    <input
                        data-id="{{ data_get($inputText, 'field') }}"
                        wire:input.debounce.800ms="filterInputText('{{ data_get($inputText, 'field') }}', $event.target.value, '{{ data_get($inputText, 'label') }}')"
                        type="text"
                        class="power_grid {{ $theme->inputClass }}"
                        placeholder="{{ $column->placeholder ?: $column->title }}">
                </div>
            </div>
        </div>
    @endif
</div>
