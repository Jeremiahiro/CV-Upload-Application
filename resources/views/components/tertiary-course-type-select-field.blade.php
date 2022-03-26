@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'course_type',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-course_type" class="form-label">Course Type</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-course_type" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.tertirayCourseTypesMap = [];
        @if($selected !== null)
            window.tertirayCourseTypesMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-course_type').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('tertiary.course.type') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (course_type) {
                            window.tertirayCourseTypesMap[course_type.id] = course_type
                            return {
                                id: course_type.id,
                                text: course_type.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
