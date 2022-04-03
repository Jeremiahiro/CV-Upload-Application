@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'industry_sector',
    'disabled' => false,
    'label' => 'Industry Sector',
    'class' => 'industry_sector',
    'index' => '0',

])
<div class="form-control-wrap form-group">
    <label for="select-industry_sector" class="form-label">{{ $label }}</label>
    <select name="{{ $fieldName }}" class="select-industry_sector form-select form-input {{ $class }}"
            data-search="on" id="select-industry_sector-{{ $index }}" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.industryMap = [];
        @if($selected !== null)
            window.industryMap[{{ $selected->id }}] = @json($selected);
        @endif
        $('.select-industry_sector').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('industry.list') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (industry) {
                            window.industryMap[industry.id] = industry
                            return {
                                id: industry.id,
                                text: industry.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
