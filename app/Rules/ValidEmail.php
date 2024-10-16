<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
class ValidEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        $validator = new EmailValidator();

        // Kiểm tra định dạng RFC và DNS của email
        return $validator->isValid($value, new RFCValidation()) &&
               $validator->isValid($value, new DNSCheckValidation());
    }

    public function message()
    {
        return 'Email không hợp lệ hoặc domain không tồn tại.';
    }

}
