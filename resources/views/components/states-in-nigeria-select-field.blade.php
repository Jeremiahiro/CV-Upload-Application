@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'nysc_state',
    'disabled' => false,
    'label' => 'States In Nigeria',
])
<div class="form-control-wrap form-group">
    <label for="select-state" class="form-label">{{ $label }}</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-state" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.statesInNigeriaMap = [];
        @if($selected !== null)
            window.statesInNigeriaMap[{{ $selected->id }}] = @json($selected);
        @endif
        $('#select-state').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('states.list.in.nigeria') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (state) {
                            window.statesInNigeriaMap[state.id] = state
                            return {
                                id: state.id,
                                text: state.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
