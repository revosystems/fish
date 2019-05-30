<?php

namespace App\Http\Requests;

use App\Models\TypeSegment;
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
            'xef_general_typology'      => 'required_if:product,1',
            'retail_general_typology'   => 'required_if:product,2',
            'xef_specific_typology'     => 'required_if:product,1',

            'trade_name'    => 'required|string|min:3|max:255',
            'name'          => 'required|string|min:2|max:255',
            'surname1'      => 'required|string|min:2|max:255',
            'surname2'      => 'required|string|min:2|max:255',
            'email'         => 'required|string|email|max:255',
            'phone'         => 'required',
            'city'          => 'required|string|min:3|max:255',

            'xef_property_quantity'    => 'required_if:product,1|nullable|numeric',
            'retail_property_quantity' => 'required_if:product,2|nullable|numeric',
            'xef_property_capacity'    => 'required_if:product,1|nullable|numeric',
            'retail_property_capacity' => 'required_if:product,2|nullable|numeric',
            'xef_property_spaces'          => [function ($attribute, $value, $fail) {
                if (request('product') == Product::XEF && ! collect($value)->filter(null)->count()) {
                    $fail(__('validation.custom.xef_property_spaces.required'));
                }
            }],
            'retail_property_spaces'          => [function ($attribute, $value, $fail) {
                if (request('product') == Product::RETAIL && ! collect($value)->filter(null)->count()) {
                    $fail(__('validation.custom.retail_property_spaces.required'));
                }
            }],
            'xef_property_franchise'       => 'required_if:product,1',

            // CONFIGURATION
            // > XEF & RETAIL
            'devices'                   => 'required',
            'devices_current'           => 'required_if:devices,1|nullable|string|min:1',
            // > XEF
            'xef_pos_critical_quantity' => 'required_if:product,1|nullable|numeric',
            'xef_cash_quantity'         => 'required_if:product,1|nullable|numeric',
            'xef_printers_quantity'     => 'required_if:product,1|nullable|numeric',
            'xef_kds'                   => 'required_if:product,1',
            'xef_kds_quantity'          => 'required_if:xef_kds,1|nullable|numeric',
            // > XEF & RETAIL
            'pos'                       => 'required',
            'pos_other'                 => 'required_if:pos,-1|string|min:2|max:255',
            // > RETAIL
            'retail_sale_mode'          => 'required_if:product,2',
            'retail_sale_location'      => 'required_if:product,2',
            // > XEF (isFranchise) & RETAIL (isFranchise)
            'franchise_pos_external'    => [function ($attribute, $value, $fail) {
                if ($value === null && $this->isFranchise()) {
                    $fail(__('validation.custom.franchise_pos_external.required_if'));
                }
            }],
            // > XEF (isHotel)
            'xef_pms'                      => 'required_if:general_typology,7',
            'xef_pms_other'                => 'required_if:xef_pms,-1|string|min:2|max:255',
            // > XEF (Medium-Large) & RETAIL (Medium-Large)
            'xef_soft'          => [function ($attribute, $value, $fail) {
                if (request('product') == Product::XEF && ! collect($value)->filter(null)->count()) {
                    $fail(__('validation.custom.xef_soft.required'));
                }
            }],
            'retail_soft'          => [function ($attribute, $value, $fail) {
                if (request('product') == Product::RETAIL && ! collect($value)->filter(null)->count()) {
                    $fail(__('validation.custom.retail_soft.required'));
                }
            }],
            'erp'                       => [function ($attribute, $value, $fail) {
                if ($value === null && $this->hasBigSegmentation(request("type_segment"))) {
                    $fail(__('validation.custom.erp.required'));
                }
            }],
            'erp_other'                 => 'required_if:erp,-1|string|min:2|max:255',
            'soft'                      => [function ($attribute, $value, $fail) {
                if ($value === null && $this->hasBigSegmentation(request("type_segment"))) {
                    $fail(__('validation.custom.soft.required'));
                }
            }],
            'soft_other'            => 'required_if:soft,-1|string|min:2|max:255',
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

    private function isFranchise()
    {
        return (request("xef_property_franchise") == 1 || request("type_segment") == TypeSegment::RETAIL_SEGMENT_FRANCHISE);
    }

    private function hasBigSegmentation($typeSegment)
    {
        return ! in_array($typeSegment, [TypeSegment::XEF_SEGMENT_SMALL, TypeSegment::RETAIL_SEGMENT_STORE]);
    }
}
