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
    
    public function persist()
    {
        $job = Job::create([
            'user_id'       => auth()->id(),
            'type_id'       => $this->type,
            'title'         => $this->title,
            'description'   => $this->description,
            'how_to_apply'  => $this->how_to_apply,
            'location'      => $this->location
        ]);

        $job->categories()->attach(
            array_values($this->categories)
        );
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
            'how_to_apply'  => 'required'
        ];
    }
}
