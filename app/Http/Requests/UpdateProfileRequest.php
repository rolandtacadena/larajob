<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Persist form data.
     */
    public function persist()
    {
        $this->user()->update([
            'name'              => $this->name,
            'company_name'      => $this->company_name,
            'company_tagline'   => $this->company_tagline,
            'company_web_url'   => $this->company_web_url,
            'company_logo'      => $this->company_logo
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required',
            'company_name'      => 'required',
            'company_web_url'   => 'required',
        ];
    }
}
