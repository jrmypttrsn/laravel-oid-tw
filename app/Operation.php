<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property string $certifier_name
 * @property string $certifier_website
 * @property string $certifier_email
 * @property string $operation_id
 * @property string $operation_name
 * @property string $other_operation_names
 * @property string $client_id
 * @property string $contact_first_name
 * @property string $contact_last_name
 * @property string $certification_status
 * @property string $certification_status_effective_on
 * @property string $op_nopAnniversaryDate
 * @property string $crops_certification_status
 * @property string $crops_status_effective_on
 * @property string $crops_products
 * @property string $crops_additional_products
 * @property string $crops_certificate_number
 * @property string $livestock_certification_status
 * @property string $livestock_status_effective_on
 * @property string $livestock_products
 * @property string $livestock_additional_products
 * @property string $livestock_certificate_number
 * @property string $wild_crops_certification_status
 * @property string $wild_crops_status_effective_on
 * @property string $wild_crops_products
 * @property string $wild_crops_additional_products
 * @property string $wild_crops_certificate_number
 * @property string $handling_certification_status
 * @property string $handling_status_effective_on
 * @property string $handling_products
 * @property string $handling_additional_products
 * @property string $handling_certificate_number
 * @property string $physical_address
 * @property string $physical_address2
 * @property string $physical_city
 * @property string $physical_state
 * @property string $physical_country
 * @property string $physical_zip
 * @property string $mailing_address
 * @property string $mailing_address2
 * @property string $mailing_city
 * @property string $mailing_state
 * @property string $mailing_country
 * @property string $mailing_zip
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property string $additional_information
 * @property boolean $broker
 * @property boolean $csa
 * @property boolean $co_packer
 * @property boolean $dairy
 * @property boolean $distrbutor
 * @property boolean $marketer
 * @property boolean $restaurant
 * @property boolean $retail
 * @property boolean $poultry
 * @property boolean $private_labeler
 * @property boolean $slaughter_house
 * @property boolean $storage
 * @property boolean $grower_group
 * @property string $date_as_of
 */
class Operation extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    protected $primaryKey = 'operation_id';
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['certifier_name', 'certifier_website', 'certifier_email', 'operation_id', 'operation_name', 'other_operation_names', 'client_id', 'contact_first_name', 'contact_last_name', 'certification_status', 'certification_status_effective_on', 'op_nopAnniversaryDate', 'crops_certification_status', 'crops_status_effective_on', 'crops_products', 'crops_additional_products', 'crops_certificate_number', 'livestock_certification_status', 'livestock_status_effective_on', 'livestock_products', 'livestock_additional_products', 'livestock_certificate_number', 'wild_crops_certification_status', 'wild_crops_status_effective_on', 'wild_crops_products', 'wild_crops_additional_products', 'wild_crops_certificate_number', 'handling_certification_status', 'handling_status_effective_on', 'handling_products', 'handling_additional_products', 'handling_certificate_number', 'physical_address', 'physical_address2', 'physical_city', 'physical_state', 'physical_country', 'physical_zip', 'mailing_address', 'mailing_address2', 'mailing_city', 'mailing_state', 'mailing_country', 'mailing_zip', 'phone', 'email', 'website', 'additional_information', 'broker', 'csa', 'co_packer', 'dairy', 'distrbutor', 'marketer', 'restaurant', 'retail', 'poultry', 'private_labeler', 'slaughter_house', 'storage', 'grower_group', 'date_as_of'];

    public function certifiers()
    {
        return $this->belongsTo('App\Certifier', 'certifier_id');
    }

    public function getFullNameAttribute()
    {
        $full_name = $this->contact_first_name . ' ' . $this->contact_last_name;

        return $full_name;
    }

    public function product_list()
    {
        // $product_list = Operation::where('crops_products', '!=', NULL)->orWhere('crops_additional_products', '!=', NULL)->paginate(5);
        // $product_list = Operation::where('livestock_products', '!=', NULL)->orWhere('livestock_additional_products', '!=', NULL)->paginate(5);
        // $product_list = Operation::where('wild_crops_products', '!=', NULL)->orWhere('wild_crops_additional_products', '!=', NULL)->paginate(5);
        // $product_list = Operation::where('handling_products', '!=', NULL)->orWhere('handling_additional_products', '!=', NULL)->paginate(5);
        // $product_list = Operation::whereNotNull('crops_products')->get();
        // $product_list = Operation::whereNotNull('crops_additional_products')->get();
        // $product_list = Operation::whereNotNull('livestock_products')->get();
        // $product_list = Operation::whereNotNull('livestock_additional_products')->get();
        // $product_list = Operation::whereNotNull('wild_crops_products')->get();
        // $product_list = Operation::whereNotNull('wild_crops_additional_products')->get();
        // $product_list = Operation::whereNotNull('handling_products')->get();
        // $product_list = Operation::whereNotNull('handling_additional_products')->get();

        // return "{$this->first_name} {$this->last_name}";

        // $query = DB::table('operations')->select('crops_products', 'crops_additional_products', 'livestock_products', 'livestock_additional_products', 'wild_crops_products', 'wild_crops_additional_products', 'handling_products', 'handling_additional_products');
        // $columns = $query;

        // $query->whereNotNull($columns);

        // $product_list = $query->take(5)->get();

        // $product_list = Operation::where('crops_products', '!=', NULL)
        //             ->orWhere('crops_additional_products', '!=', NULL)
        //             ->orWhere('livestock_products', '!=', NULL)
        //             ->orWhere('livestock_additional_products', '!=', NULL)
        //             ->orWhere('wild_crops_products', '!=', NULL)
        //             ->orWhere('wild_crops_additional_products', '!=', NULL)
        //             ->orWhere('handling_products', '!=', NULL)
        //             ->orWhere('handling_additional_products', '!=', NULL)
        //             ->get();
        // return $product_list;

        // $product_list = str_limit('The PHP framework for web artisans.', 7);
        // $value = '-space bicycle meta-kanji augmented reality voodoo god smart-katana saturation point sub-orbital crypto-neural shrine courier A.I. car gang. Shoes denim crypto-silent neon physical soul-delay apophenia. Katana film knife ablative human decay neon DIY post-San Francisco Shibuya artisanal otaku. Kowloon shoes dome math-paranoid disposable savant towards papier-mache construct pistol monofilament. ';
        // $product_list = str_limit('$value', 50, '...');
        // return $product_list;
    }
    // public function getProductlistAttribute($product_list)
    // {
    //       // Change 100 to be whatever length you want
    //       return substr($product_list, 0, 25);
    // }

}
