    $(document).ready(function () {
        function showDependentQuestions(parentId, childIds) {
            const container = $(`[data-dependent-container-for='${parentId}']`);
            container.empty();

            const shown = new Set();
            childIds.forEach(function (childId) {
                if (!childId || shown.has(childId)) return;

                const questionBlock = $(`[data-parent-question='${childId}']`).first().clone();
                questionBlock.removeClass('d-none');
                container.append(questionBlock);
                shown.add(childId);
            });
        }

        function extractParentId(name) {
            const match = name.match(/\[(\d+)]/);
            return match ? match[1] : null;
        }

        function handleSingleChoiceChange(el) {
            const parentId = extractParentId(el.attr('name'));
            const childIds = el.data('child-questions')?.toString().split(',') || [];
            showDependentQuestions(parentId, childIds);
        }

        function handleCheckboxChange(el) {
            const parentId = extractParentId(el.attr('name'));
            const container = $(`[data-dependent-container-for='${parentId}']`);
            container.empty();

            const shown = new Set();
            $(`input[name='answers[${parentId}][]']:checked`).each(function () {
                const childIds = $(this).data('child-questions')?.toString().split(',') || [];
                childIds.forEach(function (childId) {
                    if (!childId || shown.has(childId)) return;

                    const questionBlock = $(`[data-parent-question='${childId}']`).first().clone();
                    questionBlock.removeClass('d-none');
                    container.append(questionBlock);
                    shown.add(childId);
                });
            });
        }

        // Event bindings
        $(document).on('change', '.dependent-select', function () {
            const selected = $(this).find('option:selected');
            const parentId = $(this).data('question-id');
            const childIds = selected.data('child-questions')?.toString().split(',') || [];
            showDependentQuestions(parentId, childIds);
        });

        $(document).on('change', '.dependent-radio, .dependent-color, .dependent-image', function () {
            handleSingleChoiceChange($(this));
        });

        $(document).on('change', '.dependent-checkbox', function () {
            handleCheckboxChange($(this));
        });
    });