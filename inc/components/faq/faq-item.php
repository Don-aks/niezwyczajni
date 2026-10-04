<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_faq_item(array $item, int $index): void
{
    $question_id = 'faq-question-' . $index;
    $answer_id = 'faq-answer-' . $index;

    $question = esc_html($item['question'] ?? '');
    $answer = wp_kses_post($item['answerHtml'] ?? '');

    $video = '';

    if (!empty($item['video'])) {
        ob_start();

        zn_render_video(
            $item['video'] + [
                'hasTitle' => false,
            ],
            'faq__answer-video',
        );

        $video = ob_get_clean();
    }

    $buttons = '';

    if (!empty($item['buttons'])) {
        ob_start();

        foreach ($item['buttons'] as $button) {
            zn_render_faq_button($button);
        }

        $buttons = ob_get_clean();
    }

    $actions = '';

    if ($buttons !== '') {
        $actions = <<<HTML
        <div class="faq__answer-action flex flex-col gap-15">
            {$buttons}
        </div>
        HTML;
    }

    $icon = zn_get_icon('arrow-right', 'faq__question-icon');

    echo <<<HTML
    <details
        class="faq__item"
        name="faq"
        id="{$question_id}"
        aria-controls="{$answer_id}"
    >
        <summary class="faq__question">
            {$question}
        </summary>
    </details>

    <div
        class="faq__answer grid"
        id="{$answer_id}"
        role="region"
        aria-labelledby="{$question_id}"
    >
        <div class="faq__answer-inner flex justify-between">
            <div class="faq__answer-text-wrapper">
                <div class="faq__answer-text text">
                    {$answer}
                </div>

                {$video}
            </div>

            {$actions}
        </div>
    </div>
    HTML;
}
