<?php

namespace App\Http\Requests\Kader\Kegiatan;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreKegiatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'kader_id' => auth()->user()->kaders[0]->kader_id,
            'tgl_kegiatan' => Carbon::create($this->input('year'), $this->input('month'), $this->input('day'))->format('Y-m-d')
        ]);
        $this->request->replace($this->only([
            'kader_id',
            'nama',
            'tgl_kegiatan',
            'jam_mulai',
            'tempat'
        ]));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kader_id' => [
                'bail',
                'required',
                'exists:kaders',
            ],
            'nama' => [
                'bail',
                'required',
                'string',
                'max:100',
                'min:5'
            ],
            'tgl_kegiatan' => [
                'bail',
                'required',
                'date'
            ],
            'jam_mulai' => [
                'bail',
                'required',
            ],
            'tempat' => [
                'bail',
                'required',
                'string',
                'max:200',
                'min:5'
            ]
        ];
    }
}