<?php

namespace App\Http\Requests;

use App\Job;
use App\Type;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJobsFormRequest extends FormRequest
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
     * Process of updating job.
     */
    public function update()
    {
        $job = Job::findOrFail($this->job_id);
        $type = Type::findOrFail($this->type);

        $job->title     = $this->title;
        $job->description = $this->description;
        $job->how_to_apply = $this->how_to_apply;
        $job->location = $this->location;
        $job->save();

        // sync categories on the job
        $job->syncCategories($this->categories);

        $type->jobs()->save($job);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:2|max:255',
            'description'   => 'required',
            'how_to_apply'  => 'required',
            'categories'    => 'required',
            'type'          => 'required'
        ];
    }
}
