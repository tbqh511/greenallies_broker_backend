<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'propertys';

    protected $fillable = [
        'category_id',


        //HuyTBQ: Add address columns for property table
        'street_number',
        'street_code',
        'ward_code',
        'host_id',

        'title',
        'description',
        'address',
        'client_address',
        'propery_type',
        'price',
        'title_image',
        'state',
        'country',
        'state',
        'status',
        'total_click',
        'latitude',
        'longitude'

    ];
    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];

    protected $appends = [
        'gallery'
    ];

    //HuyTBQ: Start add address coloumns for propertys table
    public function ward()
    {
        return $this->hasOne(LocationsWard::class, 'code', 'ward_code');
    }

    public function street()
    {
        return $this->hasOne(LocationsStreet::class, 'code', 'street_code');
    }
    //End HuyTBQ

    //HuyTBQ: Add host_id for propertys table
    public function host()
    {
        return $this->hasOne(CrmHost::class, 'id', 'host_id')->select('id', 'gender', 'name', 'contact', 'age', 'company', 'about');
    }

    //End HuyTBQ

    //HuyTBQ: Add function for customer
    public function agent()
    {
        return $this->hasOne(Customer::class, 'id', 'added_by')->select('name', 'profile', 'mobile');
    }
    //End HuyTBQ
    //HuyTBQ: get Code attribute
    public function getCodeAttribute()
    {
        $prefix = ($this->propery_type == 0) ? 'S' : 'R';
        $wardName = $this->ward->name ?? '';
        return $prefix . '_' . $this->id . '_' . $wardName;
    }
    //End HuyTBQ
    //HuyTBQ: add function get count image
    public function getImagesCountAttribute()
    {
        return PropertyImages::where('propertys_id', $this->id)->count();
    }
    //End HuyTBQ

    //HuyTBQ: add function get Aera
    public function getAreaAttribute()
    {
        return $this->parameters->where('id', config('global.area'))->first()->pivot->value ?? null;
    }
    //End HuyTBQ

    //HuyTBQ: add function get number Floor
    public function getNumberFloorAttribute()
    {
        return $this->parameters->where('id', config('global.number_floor'))->first()->pivot->value ?? null;
    }
    //End HuyTBQ

    //HuyTBQ: add function get number room
    public function getNumberRoomAttribute()
    {
        return $this->parameters->where('id', config('global.number_room'))->first()->pivot->value ?? null;
    }
    //End HuyTBQ
    //HuyTBQ: add function get address location
    public function getAddressLocationAttribute()
    {
        return optional($this->street)->street_name . ', ' . optional($this->ward)->name;
    }
    //End HuyTBQ
    //HuyTBQ: add function get title
    public function getTitleByAddressAttribute()
    {
        $address = $this->getAddressLocationAttribute();

        if ($this->propery_type == 0) {
            return "Bán " . $this->category->category . ', ' . $address . ', Tp Đà Lạt';
        } elseif ($this->propery_type == 1) {
            return "Cho thuê " . $this->category->category . ', ' . $address;
        } else {
            return $address;
        }
    }
    //End HuyTBQ

    //HuyTBQ: add function get formatted prices
    public function getFormattedPricesAttribute()
    {
        \Carbon\Carbon::setLocale('vi');
        $formatter = new \NumberFormatter('vi_VN', \NumberFormatter::CURRENCY);

        $price = $this->price;
        $ty = 1000000000;
        $trieu = 1000000;

        if ($price > $ty) {
            if ($price % $ty == 0) {
                $formattedPrice = number_format($price / $ty, 0) . ' tỷ';
            } else {
                $formattedPrice = number_format($price / $ty, 1) . ' tỷ';
            }
        } elseif ($price > 0) {
            $formattedPrice = number_format($price / $trieu, 0) . ' triệu';
        } else {
            $formattedPrice = 'Giá thỏa thuận';
        }

        return $formattedPrice;
    }
    //End HuyTBQ
    //HuyTBQ: add function get title
    public function getTypeAttribute()
    {
        if ($this->propery_type == 0) {
            return 'Bán';
        } elseif ($this->propery_type == 1) {
            return 'Cho thuê';
        } else {
            return null; // Hoặc bất kỳ giá trị mặc định nào bạn muốn nếu không có giá trị phù hợp
        }
    }
    //End HuyTBQ
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->select('id', 'category', 'parameter_types', 'image');
    }
    public function customer()
    {
        return $this->hasMany(Customer::class, 'id', 'added_by', 'fcm_id', 'notification');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'added_by', 'fcm_id', 'notification');
    }

    public function assignParameter()
    {
        return  $this->morphMany(AssignParameters::class, 'modal');
    }

    public function parameters()
    {
        return $this->belongsToMany(parameter::class, 'assign_parameters', 'modal_id', 'parameter_id')->withPivot('value');
    }
    public function assignfacilities()
    {
        return $this->hasMany(AssignedOutdoorFacilities::class);
    }

    public function favourite()
    {
        return $this->hasMany(Favourite::class);
    }
    public function interested_users()
    {
        return $this->hasMany(InterestedUser::class);
    }
    // public function assign_parameter()
    // {
    //     return $this->hasMany(AssignParameters::class);
    // }
    public function advertisement()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function getGalleryAttribute()
    {
        $data = PropertyImages::select('id', 'image')->where('propertys_id', $this->id)->get();


        foreach ($data as $item) {
            if ($item['image'] != '') {
                $item['image'] = $item['image'];
                $item['image_url'] = ($item['image'] != '') ? url('') . config('global.IMG_PATH') . config('global.PROPERTY_GALLERY_IMG_PATH') . $this->id . "/" . $item['image'] : '';
            }
        }
        return $data;
    }

    public function getTitleImageAttribute($image)
    {
        return $image != '' ? url('') . config('global.IMG_PATH') . config('global.PROPERTY_TITLE_IMG_PATH') . $image : '';
    }
    public function getThreeDImageAttribute($threeDimage)
    {
        return $threeDimage != '' ? url('') . config('global.IMG_PATH') . config('global.3D_IMG_PATH') . $threeDimage : '';
    }

    protected $casts = [
        'category_id' => 'integer',
    ];
}
