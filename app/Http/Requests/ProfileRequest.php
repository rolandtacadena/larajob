<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class ProfileRequest extends FormRequest
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
    public function update()
    {
        $uploadedFile = $this->file('company_logo');
        $uploadedFileExt = $uploadedFile->getClientOriginalExtension();
        $fileName = $this->user()->id . '.' . $uploadedFileExt;

        $this->user()->update([
            'name'              => $this->name,
            'company_name'      => $this->company_name,
            'company_tagline'   => $this->company_tagline,
            'company_web_url'   => $this->company_web_url,
            'company_logo'      => $fileName
        ]);

        $logoFolder = public_path('images/company_logos/');

        Image::make($uploadedFile->getRealPath())
            ->resize(65, 65)
            ->save($logoFolder . $fileName);
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
            'company_logo'      => 'required|mimes:jpeg,jpg,png|max:1000'
        ];
    }
}
