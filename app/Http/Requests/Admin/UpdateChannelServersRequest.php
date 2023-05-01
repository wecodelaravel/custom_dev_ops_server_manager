<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelServersRequest extends FormRequest
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
        return [
            
            'cs_name' => 'required|unique:channel_servers,cs_name,'.$this->route('channel_server'),
            'cs_host' => 'required|unique:channel_servers,cs_host,'.$this->route('channel_server'),
        ];
    }
}
