<?php

namespace App\Traits;

use App\Services\File\FileService;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function fileUpload($model, $path, $object_type)
    {
        $file = request('file');
        if (request()->hasFile('file')) {
            $fileName = time() . '.' . $file->extension();
            Storage::putFileAs($path, $file, $fileName);
            $param['object_id'] = $model->id;
            $param['object_type'] = $object_type;
            $param['original_name'] = $file->getClientOriginalName();
            $param['file_name'] = $fileName;
            $res = $this->fileService->store($param);
        }
        return $res;
    }

    public function filesUpload($model, $path, $object_type)
    {
        $files = request()->input('files');
        if ($files) {
            foreach ($files as $key => $item) {
                $fileName = time() . '_' . $key . '.' . $item->extension();
                $item->move(storage_path() . $path, $fileName);
                $param['object_id'] = $model->id;
                $param['object_type'] = $object_type;
                $param['original_name'] = $item->getClientOriginalName();
                $param['file_name'] = $fileName;
                $res = $this->fileService->store($param);
            }
        }
        return $res;
    }

}
