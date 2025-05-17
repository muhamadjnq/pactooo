<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignReport extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'clicks', 'impressions', 'audience_growth', 'ctr', 'report_date'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
