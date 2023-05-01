<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSyncserversRequest extends FormRequest
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
            'ss_name' => 'required|unique:syncservers,ss_name,'.$this->route('syncserver'),
            'ss_host_url' => 'required|unique:syncservers,ss_host_url,'.$this->route('syncserver'),
            'max_upload_filesize' => 'max:2147483647|nullable|numeric',
            'report_time' => 'nullable|date_format:H:i:s',
            'report_email' => 'email',
            'max_days_channel_history' => 'max:2147483647|nullable|numeric',
            'video_hls_shift' => 'max:2147483647|nullable|numeric',
        ];
    }
}
