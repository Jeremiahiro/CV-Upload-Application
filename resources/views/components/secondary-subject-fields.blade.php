@props([
    'subject' => null,
    'grade' => null,
    'index' => 0,
    'last' => true,
])
<tr id="subject-row-{{$index}}" class="subject-item-row" data-index="{{ $index }}" data-secondaryId="">
    <td style="width: 50%">
        <div class="form-group w-100">
            <div class="form-control-wrap">
                <select name="subject[{{ $index }}][subject_id]" class="form-control subject-select form-control-lg"
                        data-search="on">
                    @if($subject !== null)
                        <option value="{{ $subject->id }}">
                            {{ $subject->name }}
                        </option>
                    @endif
                </select>
            </div>
        </div>
    </td>
    <td style="width: 50%">
        <div class="form-group w-100">
            <div class="form-control-wrap">
                <select name="subject[{{ $index }}][grade_id]" class="form-control grade-select form-control-lg"
                        data-search="on">
                    @if($grade !== null)
                        <option value="{{ $grade->id }}">
                            {{ $grade->name }}
                        </option>
                    @endif
                </select>
            </div>
        </div>
    </td>
    {{-- <td>
        <button
            type="button"
            class="btn add-item-row btn-icon btn-outline-success @if(!$last) d-none @endif"
            onclick="add_new_subject_row(this)"
            data-number="plus"><em class="fas fa-plus"></em>
        </button>

        <button
            type="button"
            class="btn remove-item-row btn-icon btn-danger @if($last) d-none @endif"
            onclick="delete_subject_row(this)"
            data-number="plus"><em
                class="fas fa-trash"></em></button>
    </td> --}}
</tr>
@push('javascript')
    <script>

        window.subjectsMap = [];
        window.gradesMap = [];
        initSecondarySubjects();
        initSecondaryGrades();

        function initSecondarySubjects() {
            $('.subject-select').select2({
                placeholder: 'Select and begin typing',
                ajax: {
                    url: '{{ route('secondary.subjects.list') }}',
                    delay: 250,
                    cache: true,
                    data: function (params) {
                        return {
                            search: params.term,
                        }
                    },
                    processResults: function (result) {
                        return {
                            results: result.map(function (subject) {
                                window.subjectsMap[subject.id] = subject
                                return {
                                    id: subject.id,
                                    text: subject.name,
                                }
                            })
                        }
                    },
                }
            });

            $('.subject-select').on('change', function () {
                var $this = $(this);
            });
        }

        function initSecondaryGrades() {
            $('.grade-select').select2({
                placeholder: 'Select and begin typing',
                ajax: {
                    url: '{{ route('secondary.grades.list') }}',
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
                                window.gradesMap[grade.id] = grade
                                return {
                                    id: grade.id,
                                    text: grade.name,
                                }
                            })
                        }
                    },
                }
            });

            $('.grade-select').on('change', function () {
                var $this = $(this);
            });
        }

        function delete_subject_row(el) {
            let $row = $(el).closest('tr');
            if ($row.data('index') === $('.subject-item-row').length - 1) {
                $row.find('.add-item-row').removeClass('d-none');
                $row.find('.remove-item-row').addClass('d-none');
                return;
            }
            $(el).closest('tr').remove();
        }

        function add_new_subject_row(el, subjectItem, gradeItem) {
            let index = $('.subject-item-row').length;
            let subjectId = '', gradeId = '', secondaryId = '', subjectName = '', gradeName = '';

            if (typeof subjectItem !== 'undefined') {
                secondaryId = subjectItem.secondary_id;
                subjectName = subjectItem.name;
            }

            if (typeof gradeItem !== 'undefined') {
                gradeName = gradeItem.name;
            }

            let row = `<tr id="subject-row-${index}" class="subject-item-row" data-index="${index}" data-secondaryId="${secondaryId}">
                <td style="width: 50%">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select name="subject[${index}][subject_id]" class="form-control subject-select form-control-lg"
                                    data-search="on">
                                    ${(typeof subjectItem !== 'undefined') ? `<option value="${subjectId}" selected>${subjectName}</option>` : ''}
                            </select>
                        </div>
                    </div>
                </td>
                <td style="width: 50%">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select name="subject[${index}][grade_id]" class="form-control grade-select form-control-lg"
                                    data-search="on">
                                    ${(typeof gradeItem !== 'undefined') ? `<option value="${gradeId}" selected>${gradeName}</option>` : ''}
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            `;
            $(el).closest('tr').find('.remove-item-row').removeClass('d-none');
            $(el).closest('tr').find('.add-item-row').addClass('d-none');
            $(el).closest('tr').after(row);
            initSecondarySubjects();
            initSecondaryGrades();
        }

    </script>
@endpush
