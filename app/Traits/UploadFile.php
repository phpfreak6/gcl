<?php

namespace App\Traits;

trait UploadFile
{
    public static function bootUploadFile()
	{
        static::saved(function ($model) {
            if(request('file_name') && request('file_attachment'))
                foreach(request('file_attachment')  as $key => $image)
                    $model->addMedia($image)->usingName(request('file_name')[$key])->toMediaCollection();
            });
    }

}
