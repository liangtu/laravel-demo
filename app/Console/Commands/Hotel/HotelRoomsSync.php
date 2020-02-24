<?php

namespace App\Console\Commands\Hotel;

use Illuminate\Console\Command;

class HotelRoomsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hotelRoomsSync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步酒店产品数据';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = 'time : ' . date('Y-m-d H:i:s') . ' hotel rooms, 要找中台要' . "\n";

		file_put_contents('/tmp/cron.txt', $content, FILE_APPEND);
    }
}
