<?php

namespace Sohel\ImageProcessor;

use Illuminate\Support\ServiceProvider;

class ImageProcessorServiceProvider extends ServiceProvider //-> undefine type show why 
{
    public function register()
    {
        $this->app->singleton(ImageResizer::class, function ($app) {  // app undefine property why
            return new ImageResizer();
        });
    }

    public function boot()
    {
        // এখানে আপনি মাইগ্রেশন, পাবলিশিং ইত্যাদি করতে পারেন
    }
}
