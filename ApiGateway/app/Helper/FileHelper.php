<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Helper;

class FileHelper
{

    static public function handleUploadFile($file, $old = null, $id = null)
    {
        if ($file) {
            $filenameWithExt = preg_replace('/\s/', '_', $file->getClientOriginalName());
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = $filename . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = ($id == null) ? public_path('uploads/') : public_path('uploads/' . $id . '/');
            if (! is_dir($destinationPath)) {
                mkdir($destinationPath, 777);
            }
            $file->move($destinationPath, $fileNameToStore);
            if ($old !== null) {
                $oldPath = $destinationPath . $old;
                if (file_exists($oldPath))
                    @unlink($oldPath);
            }
            return $fileNameToStore;
        }
        return null;
    }

    static public function hasImage($fileName)
    {
        $filePath = public_path('/uploads/') . $fileName;
        return is_file($filePath) && true;
    }

    static public function getFile($fileName, $defaultImage = '/default.jpg')
    {
        $result = self::normalizeFileName($fileName);
        if (! is_array($result)) {
            $fileName = $result;
        }
        if (self::hasImage($fileName)) {
            return asset('/uploads/' . $fileName);
        }
        return asset('/assets/images') . $defaultImage;
    }

    static public function removeImage($fileName)
    {
        if (self::hasImage($fileName)) {
            return @unlink(public_path('/uploads/' . $fileName)) && true;
        }
        return false;
    }
}