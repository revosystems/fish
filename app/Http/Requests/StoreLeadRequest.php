<?php

namespace App\Http\Requests;

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
            // CLIENT
            'type'          => 'required',
            'type_segment'  => 'required',
            // > XEF
            'xef_typology_general'    => 'required_if:type,1',
            'xef_typology_specific'   => 'required_if:type,1',
            // > RETAIL
            'retail_typology_general' => 'required_if:type,2',

            // CLIENT INFO
            'trade_name'    => 'required|string|min:3|max:255',
            'name'          => 'required|string|min:5|max:255',
            'surname1'      => 'required|string|min:5|max:255',
            'surname2'      => 'required|string|min:5|max:255',
            'email'         => 'required|string|email|max:255',
            'phone'         => 'required|numeric|digits_between:9,12',
            'city'          => 'required|string|min:3|max:255',

            // PROPERTY
            // > XEF
            'xef_property_quantity'     => 'required_if:type,1|nullable|numeric',
            'xef_property_franchise'    => 'required_if:type,1',
            'xef_property_spaces'       => [function ($attribute, $value, $fail)  {
                if (request()->get("type")==1 && count($value)<=1) {
                    $fail(__('validation.custom.xef_property_spaces.required'));
                }
            }],
            'xef_property_capacity'     => 'required_if:type,1|nullable|numeric',
            // > RETAIL
            'retail_property_quantity'  => 'required_if:type,2|nullable|numeric',
            'retail_property_spaces'    => [function ($attribute, $value, $fail)  {
                if (request()->get("type")==2 && count($value)<=1) {
                    $fail(__('validation.custom.retail_property_spaces.required'));
                }
            }],
            'retail_property_staff_quantity'  => 'required_if:type,2|nullable|numeric',

            // CONFIGURATION
            // > XEF & RETAIL
            'devices'                   => 'required',
            'devices_current'           => 'required_if:devices,1|nullable|string|min:2',
            // > XEF
            'xef_pos_critical_quantity' => 'required_if:type,1|nullable|numeric',
            'xef_cash_quantity'         => 'required_if:type,1|nullable|numeric',
            'xef_printers_quantity'     => 'required_if:type,1|nullable|numeric',
            'xef_kds'                   => 'required_if:type,1',
            'xef_kds_quantity'          => 'required_if:xef_kds,1|nullable|numeric',
            // > XEF & RETAIL
            'pos'                       => 'required',
            // > RETAIL
            'retail_sale_mode'          => 'required_if:type,2',
            'retail_sale_location'      => 'required_if:type,2',
            // > XEF (isFranchise) & RETAIL (isFranchise)
            'franchise_pos_external'    => [function ($attribute, $value, $fail) {
                if ((request()->get("type")==1 && request()->get("xef_property_franchise")==1 && $value=="") ||
                    (request()->get("type_segment")==5 && request()->get("type")==2 && $value=="")) {
                    $fail(__('validation.custom.erp.required'));
                }
            }],
            // > XEF (isHotel)
            'xef_pms'                   => 'required_if:xef_typology_general,7',
            'xef_pms_other'             => 'required_if:xef_erp,-1|string|min:2|max:255',
            // > XEF (Medium-Large) & RETAIL (Medium-Large)
            'erp'                       => [function ($attribute, $value, $fail) {
                if ((request()->get("type")==1 && request()->get("type_segment")!=1 && request()->get("type_segment")!=4 && $value=="") ||
                    (request()->get("type")==2 && request()->get("type_segment")!=1 && request()->get("type_segment")!=4 && $value=="")) {
                    $fail(__('validation.custom.erp.required'));
                }
            }],
            'erp_other'                 => 'required_if:erp,-1|string|min:2|max:255',
            // > XEF (Medium-Large)
            'xef_soft'                  =>[function ($attribute, $value, $fail)  {
                if (request()->get("type")==1 && request()->get("type_segment")!=1 && count($value)<=1) {
                    $fail(__('validation.custom.xef_soft.required'));
                }
            }],
            'xef_soft_other'            => 'required_if:xef_soft,-1|string|min:2|max:255',
            // > RETAIL (Franchise)
            'retail_soft'               =>[function ($attribute, $value, $fail) {
                if (request()->get("type")==2 && request()->get("type_segment")==5 && count($value)<=1) {
                    $fail(__('validation.custom.retail_soft.required'));
                }
            }],
            'retail_soft_other'         => 'required_if:retail_soft,-1|nullable|string|min:2|max:255'
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
