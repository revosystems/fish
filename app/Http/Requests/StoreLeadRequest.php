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
            'xef_specific_typology' => [function ($attribute, $value, $fail) {
                if (request("product") == Product::XEF && count($value) < 2) {
                    $fail(__('validation.custom.xef_specific_typology.required_if'));
                }
            }],
            'trade_name'    => 'required|string|min:3|max:255',
            'name'          => 'required|string|min:2|max:255',
            'surname1'      => 'required|string|min:2|max:255',
            'surname2'      => 'required|string|min:2|max:255',
            'email'         => 'required|string|email|max:255',
            'phone'         => 'required',
            'city'          => 'required|string|min:3|max:255',

            'property_quantity'        => 'required|numeric',
            'xef_property_capacity'    => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'retail_property_capacity' => 'required_if:product,'. Product::RETAIL . '|nullable|numeric',
            'xef_property_spaces'      => 'required_if:product,' . Product::XEF,
            'retail_property_spaces'   => 'required_if:product,' . Product::RETAIL,
            'property_franchise'       => 'required',

            'devices'                   => 'required',
            'devices_current'           => 'required_if:devices,1|nullable|string|min:1',
            'xef_pos_critical_quantity' => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'xef_cash_quantity'         => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'xef_printers_quantity'     => 'required_if:product,' . Product::XEF . '|nullable|numeric',
            'xef_kds'                   => 'required_if:product,' . Product::XEF,
            'xef_kds_quantity'          => 'required_if:xef_kds,1|nullable|numeric',
            'pos'                       => 'required',
            'pos_other'                 => 'required_if:pos,-1|string|min:2|max:255',
            'retail_sale_mode'          => 'required_if:product,' . Product::RETAIL,
            'retail_sale_location'      => 'required_if:product,' . Product::RETAIL,
            'can_use_another_pos'       => 'required_if:property_franchise,true',
            'xef_pms'                   => 'required_if:general_typology,' . GeneralTypology::HOTEL,
            'xef_pms_other'             => 'required_if:xef_pms,-1|string|min:2|max:255',
            'erp'                       => 'required',
            'erp_other'                 => 'required_if:erp,-1|string|min:2|max:255',
            'retail_soft'               => [function ($attribute, $value, $fail) {
                if (request("product") == Product::RETAIL && count($value) < 2) {
                    $fail(__('validation.custom.retail_soft.required_if'));
                }
            }],
            'xef_soft'                  => [function ($attribute, $value, $fail) {
                if (request("product") == Product::XEF && count($value) < 2) {
                    $fail(__('validation.custom.xef_soft.required_if'));
                }
            }],
            'retail_soft_other'         => [function ($attribute, $value, $fail) {
                if (request("product") == Product::RETAIL && collect(request('retail_soft'))->contains("-1") && ! $value) {
                    $fail(__('validation.custom.retail_soft_other.string'));
                }
            }],
            'xef_soft_other'         => [function ($attribute, $value, $fail) {
                if (request("product") == Product::XEF && collect(request('xef_soft'))->contains("-1") && ! $value) {
                    $fail(__('validation.custom.xef_soft_other.string'));
                }
            }],
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

    protected function isArrayAndHasLength($value): bool {
        return (is_array($value) && count($value) < 2);
    }

    protected function notIsArrayAndHasValue($value): bool {
        return !is_array($value) && $value;
    }

    protected function valueHasValue($value): bool {
        return $this->isArrayAndHasLength($value) || $this->notIsArrayAndHasValue($value);
    }
}
