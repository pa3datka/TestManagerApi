<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'head' => ['required', 'string', 'max:200', 'min:5'],
            'description' => ['required', 'string', 'max:1000', 'min:5'],
            'access_id' => ['required', 'numeric'],
            'calculation_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'attempts' => ['required', 'numeric'],
            'time' => ['required', 'numeric'],
            'image' => ['string', 'nullable'],
            'questions.*.quest' => ['required', 'string', 'max:1000', 'min:5'],
            'questions.*.image' => ['string', 'nullable'],
            'questions.*.answers.*.answer' => ['required', 'string', 'min:1'],
            'questions.*.answers.*.status' => ['required'],
            'questions.*.answers.*.variant' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            "head" => "Пользователь с таким 'E-mail' уже существует",
            "description" => "descriptionПользователь с таким 'E-mail' уже существует",
            "access_id" => "access_idПользователь с таким 'E-mail' уже существует",
            "calculation_id" => "calculation_idПользователь с таким 'E-mail' уже существует",
            "category_id" => "category_idПользователь с таким 'E-mail' уже существует",
            "attempts" => "attemptsПользователь с таким 'E-mail' уже существует",
            "time" => "timeПользователь с таким 'E-mail' уже существует",
            "image" => "imageПользователь с таким 'E-mail' уже существует",
            "quests.*.quest" => "quests.*.questПользователь с таким 'E-mail' уже существует",
            "quests.*.image" => "quests.*.imageПользователь с таким 'E-mail' уже существует",
            "quests.*.answers.*.answer" => "quests.*.answers.*.answerПользователь с таким 'E-mail' уже существует",
            "quests.*.answers.*.status" => "quests.*.answers.*.statusПользователь с таким 'E-mail' уже существует",
            "quests.*.answers.*.variant" => "quests.*.answers.*.variantПользователь с таким 'E-mail' уже существует",

        ];
    }
}
