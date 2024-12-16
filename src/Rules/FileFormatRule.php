<?php

namespace SajadDev\CodeJudge\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FileFormatRule implements ValidationRule
{

    protected array $allowed_formats;

    public function __construct(array $allowed_formats)
    {
        $this->allowed_formats = $allowed_formats;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $extension = $value->getClientOriginalExtension();
        
        if (!in_array($extension, $this->allowed_formats)) {
            $fail("The :attribute must be a file of type: " . implode(', ', $this->allowed_formats) . ".");
        }
    }
}
