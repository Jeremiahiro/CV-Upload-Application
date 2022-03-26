@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'course',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-course" class="form-label">Course of Study</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-course" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.tertirayCourseMap = [];
        @if($selected !== null)
            window.tertirayCourseMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-course').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('tertiary.course') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (course) {
                            window.tertirayCourseMap[course.id] = course
                            return {
                                id: course.id,
                                text: course.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
