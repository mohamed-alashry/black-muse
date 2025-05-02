@php
   if (!function_exists('renderChildQuestions')) {
        function renderChildQuestions($option) {
            $childs = '';
            foreach ($option->childQuestions ?? [] as $child) {
                $childs .= "<div class='question-block d-none' data-parent-question='{$child->id}'>";
                $childs .= view('partials.site.question-field', ['question' => $child])->render();
                $childs .= '</div>';
            }
            return $childs;
        }
    }

    $isRequired = $question->pivot->is_required ?? false ? 'required' : '';
    $requiredMark = $question->pivot->is_required ?? false ? ' *' : '';
    $name = "answers[{$question->id}]";
    $label = "<label class='form-label text-white fw-light'>{$question->text}{$requiredMark}</label>";
    $input = '';

    switch ($question->type) {
        case 'text':
        case 'number':
            $input = "<input type='{$question->type}' name='$name' class='form-control bg-main rounded-4' placeholder='Type here...' $isRequired>";
            break;

        case 'date':
            $input = "<input type='date' name='$name' class='form-control bg-main rounded-4 datepicker' placeholder='Choose from here' $isRequired>";
            break;

        case 'textarea':
            $input = "<textarea name='$name' class='form-control bg-main rounded-4' placeholder='Type here...' $isRequired></textarea>";
            break;

        case 'file-upload':
            $input = "<div class='file-upload'><label class='file-upload-label'>Attach image files here<input type='file' name='{$name}[]' class='border-0' accept='image/*' multiple $isRequired></label></div>";
            break;

        case 'select':
            $options = $question->options->sortBy('sort')->map(function ($option) {
                $dependencyIds = $option->childQuestions->pluck('id')->implode(',');
                return "<option value='{$option->value}' data-child-questions='{$dependencyIds}'>" . e($option->label) . "</option>" . renderChildQuestions($option);
            })->implode('');
            $input = "<select name='$name' class='form-control bg-main rounded-4 dependent-select' data-question-id='{$question->id}' $isRequired><option value=''>{$question->text}</option>$options</select>";
            break;

        case 'radio':
            $input = $question->options->sortBy('sort')->map(function ($option) use ($name, $isRequired) {
                $dependencyIds = $option->childQuestions->pluck('id')->implode(',');
                $html = "<div class='form-check'><input class='form-check-input dependent-radio' type='radio' name='$name' id='option{$option->id}' value='{$option->value}' data-child-questions='{$dependencyIds}' $isRequired><label class='form-check-label text-white' for='option{$option->id}'>" . e($option->label) . "</label></div>";
                return $html . renderChildQuestions($option);
            })->implode('');
            break;

        case 'checkbox':
            $input = $question->options->sortBy('sort')->map(function ($option) use ($name) {
                $dependencyIds = $option->childQuestions->pluck('id')->implode(',');
                $html = "<div class='form-check'><input class='form-check-input dependent-checkbox' type='checkbox' name='{$name}[]' id='option{$option->id}' value='{$option->value}' data-child-questions='{$dependencyIds}'><label class='form-check-label text-white' for='option{$option->id}'>" . e($option->label) . "</label></div>";
                return $html . renderChildQuestions($option);
            })->implode('');
            break;

        case 'color-select':
            $input = '<div class="d-flex flex-wrap gap-3">';
            $input .= $question->options->sortBy('sort')->map(function ($option) use ($name) {
                $dependencyIds = $option->childQuestions->pluck('id')->implode(',');
                $html = "<div class='d-flex align-items-center gap-2'><input type='radio' class='form-check-input dependent-color' name='{$name}' id='color{$option->id}' value='{$option->value}' data-child-questions='{$dependencyIds}'><label for='color{$option->id}' class='d-block rounded-circle border border-2' style='width: 30px; height: 30px; background-color: " . e($option->label) . "; cursor: pointer;'></label></div>";
                return $html . renderChildQuestions($option);
            })->implode('');
            $input .= '</div>';
            break;

        case 'image-select':
            $input = '<div class="d-flex flex-wrap gap-3">';
            $input .= $question->options->sortBy('sort')->map(function ($option) use ($name) {
                $dependencyIds = $option->childQuestions->pluck('id')->implode(',');
                $html = "<label for='image{$option->id}' class='d-block'><input type='radio' name='{$name}' id='image{$option->id}' value='{$option->value}' class='form-check-input dependent-image' data-child-questions='{$dependencyIds}' style='margin: 5px;margin-top: 50px;'><a href='" . asset('storage/' . $option->label) . "' target='_blank'><img src='" . asset('storage/' . $option->label) . "' alt='Option' style='width: 100px; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer;'></a></label>";
                return $html . renderChildQuestions($option);
            })->implode('');
            $input .= '</div>';
            break;
    }
@endphp

<div class="row">
    <div class="col-md-6" data-question-row="{{ $question->id }}">
        {!! $label !!}
        {!! $input !!}
    </div>

    <div class="col-md-6" data-dependent-container-for="{{ $question->id }}"></div>
</div>



