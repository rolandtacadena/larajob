<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobsFormRequest extends FormRequest
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
        $job = $this->user()->createJobFromForm( $this->all() );

        $job->syncCategories( $this->categories );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|max:255',
            'description'   => 'required',
            'location'      => 'required:max:255',
            'how_to_apply'  => 'required|max:255',
            'categories'    => 'required',
            'type'          => 'required'
        ];
    }
}
