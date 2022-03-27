@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'role',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-role" class="form-label">Position / Role</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-role" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.employmentRolesMap = [];
        @if($selected !== null)
            window.employmentRolesMap[{{ $selected->id }}] = @json($selected);
        @endif
        $('#select-role').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('employment.roles') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    console.log(result);
                    return {
                        results: result.map(function (role) {
                            window.employmentRolesMap[role.id] = role
                            return {
                                id: role.id,
                                text: role.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
