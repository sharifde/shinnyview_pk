@props([
    'rand'=> Str::random(11), 
    'name', 
    'icon', 
    'label', 
    'multiple' => false, 
    'tags' => false, 
    'url' => false, 
    'delay'=> 250, 
    'labelClass' => 'form-label fw-bold', 
    'placeholder' => 'Select an option', 
    'required' => "", 
    'parentClass' => 'form-group', 
    'selectedOption' => '',
    'value' => '', 
    'options' => [],
    'minimumInputLength' => 1,
    'minimumResultsForSearch' => 10,
    'allowClear' => true
])
@php
    // if options are in array make them json
    $options = json_decode(json_encode($options));
@endphp
<div class="{{ $parentClass }}" >
    <div wire:ignore>
        @if(!empty($label))
            <label for="{{ $name }}" class="{{ $labelClass }}">
                {{ $label }}
                {!! $required?'<span class="text-danger">*</span>':'' !!}
            </label>
        @endif
        <select 
            wire:model="{{ $name }}" 
            {{ !empty($required)?'required':'' }}
            {{ $attributes->merge([
                    'class' => 'select2', 
                    'id' => $name.'_'.$rand, 
                    'name' => $name, 
                    'multiple' => $multiple,
                    'placeholder' => $placeholder
                ]) 
            }} 
        >
            {{-- for placeholder --}}
            <option value=""> {{ $placeholder }} </option>
            {{-- if setting for ajax select2 append an option as selected--}}
            @if ($url && $selectedOption != '')
                <option value="{{ $value }}" selected> {{ $selectedOption }} </option>
            @endif
            
            @forelse ($options as $item)
                {{-- if assoc array else set for index array --}}
                @if(isset($item->value))
                    <option value="{{ $item->value }}" {{ $item->value==$value?'selected':'' }}> {{ $item->name }} </option>
                @else 
                    <option value="{{ $item }}" {{ $item==$value?'selected':'' }}> {{ $item }} </option>
                @endif
            @empty
            @endforelse 
        </select>
    </div>
    @error($name) <span class="text-danger">{{ $message }}</span> @enderror
</div>

@push('js')
    <script>
        var select2 = '#{{ $name.'_'.$rand }}';
        $(select2).select2({
            tags: '{{ $tags }}',
            multiple: '{{ $multiple }}',
            placeholder: '{{ $placeholder }}',
            allowClear: '{{ $allowClear }}',
            width: '100%',
            @if($url)
                minimumInputLength: '{{ $minimumInputLength }}',
                minimumResultsForSearch: '{{ $minimumResultsForSearch }}',
                delay: '{{ $delay }}',
                ajax: {
                    url: '{{ $url }}',
                    dataType: "json",
                    type: "GET",
                    data: function (params) {
                        var queryParameters = {
                            term: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (res) {
                        if(res.status == 200){
                            return {
                                results: $.map(res.data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id == undefined ? item.value : item.id
                                    }
                                })
                            };
                        }else{
                            console.log(res.status);
                        }
                    }
                }
            @endif
        });

        $('#{{ $name.'_'.$rand }}').on('change', function (e) {
            var data = $('#{{ $name.'_'.$rand }}').select2("val");
            @this.set("{{ $name }}", data);
        });
    </script>
@endpush

@push('css')
    <style>
        /* select2 start */
        .select2-selection--single .select2-selection__rendered {
            line-height: 45px !important;
        }
        .select2-selection {
            height: 45px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b{
            margin-top: 2px !important;
        }

        .select2-selection__clear{
            height: 33px !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top:6px !important;
        }
        /* select2 end */
    </style>
@endpush