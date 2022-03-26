@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'grade',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-grade" class="form-label">Grade of Qualification</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-grade" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.tertirayGradeMap = [];
        @if($selected !== null)
            window.tertirayGradeMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-grade').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('tertiary.grade') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (grade) {
                            window.tertirayGradeMap[grade.id] = grade
                            return {
                                id: grade.id,
                                text: grade.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
