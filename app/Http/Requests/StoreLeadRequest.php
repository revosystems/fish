<?php

namespace App\Http\Requests;

use App\Models\GeneralTypology;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
            'product'                   => 'required',
            'type_segment'              => 'required',
            'xef_general_typology'      => 'required_if:product,' . Product::XEF,
            'retail_general_typology'   => 'required_if:product,' . Product::RETAIL,
            'xef_specific_typology'     => 'required_if:product,' . Product::XEF,

            'trade_name'    => 'required|string|min:3|max:255',
            'name'          => 'required|string|min:2|max:255',
            'surname1'      => 'required|string|min:2|max:255',
            'surname2'      => 'required|string|min:2|max:255',
            'email'         => 'required|string|email|max:255',
            'phone'         => 'required',
            'city'          => 'required|string|min:3|max:255',

            'xef_property_quantity'    => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'retail_property_quantity' => 'required_if:product,'. Product::RETAIL .'|nullable|numeric',
            'xef_property_capacity'    => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'retail_property_capacity' => 'required_if:product,'. Product::RETAIL .'|nullable|numeric',
            'xef_property_spaces'      => 'required_if:product,' . Product::XEF,
            'retail_property_spaces'   => 'required_if:product,' . Product::RETAIL,
            'property_franchise'       => 'required',

            // CONFIGURATION
            // > XEF & RETAIL
            'devices'                   => 'required',
            'devices_current'           => 'required_if:devices,1|nullable|string|min:1',
            // > XEF
            'xef_pos_critical_quantity' => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'xef_cash_quantity'         => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'xef_printers_quantity'     => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'xef_kds'                   => 'required_if:product,' . Product::XEF,
            'xef_kds_quantity'          => 'required_if:xef_kds,1|nullable|numeric',
            // > XEF & RETAIL
            'pos'                       => 'required',
            'pos_other'                 => 'required_if:pos,-1|string|min:2|max:255',
            // > RETAIL
            'retail_sale_mode'          => 'required_if:product,' . Product::RETAIL,
            'retail_sale_location'      => 'required_if:product,' . Product::RETAIL,
            'can_use_another_pos'    => 'required_if:property_franchise,true',
            // > XEF (isHotel)
            'xef_pms'                   => 'required_if:general_typology,' . GeneralTypology::HOTEL,
            'xef_pms_other'             => 'required_if:xef_pms,-1|string|min:2|max:255',
            'xef_soft'                  => 'required_if:product,' . Product::XEF,
            'retail_soft'               => 'required_if:product,' . Product::RETAIL,
            'erp'                       => 'required',
            'erp_other'                 => 'required_if:erp,-1|string|min:2|max:255',
            'soft'                      => 'required',
            'soft_other'                => 'required_if:soft,-1|string|min:2|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // UPDATED @ LANG
        ];
    }
}
