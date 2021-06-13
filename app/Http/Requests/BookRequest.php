<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        //publish
        if (request()->type == 'store') {
            return[
                'name' => [
                    "required",
                    Rule::unique('books' , "name")->where("name" , request()->name)
                        ->where("version",request()->version),
                ] ,
                'version' => 'required',
                'description' => 'required',
                'image' => 'required|image',
                'poster' => 'required|image',
                'authors' => 'required|array',
                'version_date' => 'required',
                'category_id' => 'required',
                'publishing_house_id' => 'required',

            ];
        } else {
            return[
                'name' => [
                    "required",
                    Rule::unique('books' , "name")->where("name" , request()->name)
                        ->where("version",request()->version),
                ] ,
                'version' => 'required',
                'description' => 'required',
                'image' => 'sometimes|nullable|image',
                'poster' => 'sometimes|nullable|image',
                'authors' => 'required|array',
                'version_date' => 'required',
                'category_id' => 'required',
                'publishing_house_id' => 'required',
            ];
        }
    }
    public function messages()
    {
        return [
            "name.unique" =>"This is name is unique according to version "
        ];
    }
}
