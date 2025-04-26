@php
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

       case 'file':
          $input = "
              <div class='file-upload'>
                  <label class='file-upload-label'>
                      Attach image files here
                      <input type='file' name='{$name}[]' class='border-0' accept='image/*' multiple $isRequired>
                  </label>
              </div>";
          break;

        case 'select':
            $options = $question->options
                ->sortBy('sort')
                ->map(function ($option) {
                    return "<option value='{$option->text}'>" . e($option->text) . "</option>";
                })->implode('');
            $input = "<select name='$name' class='form-control bg-main rounded-4' $isRequired>
                       <option value=''>{$question->text}</option>
                       $options
                      </select>";
            break;

        case 'radio':
            $input = $question->options
                ->sortBy('sort')
                ->map(function ($option) use ($name, $isRequired) {
                    return "
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='$name' id='option{$option->id}' value='{$option->text}' $isRequired>
                            <label class='form-check-label text-white' for='option{$option->id}'>" . e($option->text) . "</label>
                        </div>";
                })->implode('');
            break;

        case 'checkbox':
            $input = $question->options
                ->sortBy('sort')
                ->map(function ($option) use ($name) {
                    return "
                        <div class='form-check'>
                            <input class='form-check-input' type='checkbox' name='{$name}[]' id='option{$option->id}' value='{$option->text}'>
                            <label class='form-check-label text-white' for='option{$option->id}'>" . e($option->text) . "</label>
                        </div>";
                })->implode('');
            break;

            case 'color':
              $input = '<div class="d-flex flex-wrap gap-3">';
              $input .= $question->options
                  ->sortBy('sort')
                  ->map(function ($option) use ($name) {
                      return "
                          <div class='d-flex align-items-center gap-2'>
                              <input type='radio'
                                  class='form-check-input'
                                  name='{$name}'
                                  id='color{$option->id}'
                                  value='{$option->text}'>

                              <label for='color{$option->id}'
                                  class='d-block rounded-circle border border-2'
                                  style='width: 30px; height: 30px; background-color: " . e($option->text) . "; cursor: pointer;'>
                              </label>
                          </div>";
                  })->implode('');
              $input .= '</div>';
              break;

    }
@endphp

<div class="mb-3">{!! $label !!}{!! $input !!}</div>
