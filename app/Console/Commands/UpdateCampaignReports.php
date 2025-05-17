<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Models\CampaignReport;

class UpdateCampaignReports extends Command
{
    protected $signature = 'campaigns:update-reports';
    protected $description = 'Update campaign reports based on real-time data';

    public function handle()
    {
        $campaigns = Campaign::where('status', 'active')->get();

        foreach ($campaigns as $campaign) {
            $clicks = rand(10, 100); // شبیه‌سازی تعداد کلیک
            $impressions = rand(100, 1000); // شبیه‌سازی تعداد بازدید
            $audienceGrowth = rand(5, 50);

            $ctr = ($impressions > 0) ? ($clicks / $impressions) * 100 : 0;

            CampaignReport::create([
                'campaign_id' => $campaign->id,
                'clicks' => $clicks,
                'impressions' => $impressions,
                'audience_growth' => $audienceGrowth,
                'ctr' => $ctr,
                'report_date' => now()->format('Y-m-d'),
            ]);
        }

        $this->info('Campaign reports updated successfully.');
    }
}
