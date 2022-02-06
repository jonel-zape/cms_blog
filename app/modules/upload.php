<?php

class Upload
{
    public function image()
    {
        $errors = [];
        $targetFile = '';
        $imageFileType = '';

        if (isset($_FILES["image"])) {
            $targetFile = '../public/uploads/'.basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $errors[] = 'File should be an Image';
            }
        } else {
            $errors[] = 'No File Selected';
        }

        if (count($errors) > 0) {
            return errorResponse($errors);
        }

        $newFileName = time().'.'.$imageFileType;
        $targetFile = '../public/uploads/'.$newFileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            return successfulResponse(['uploaded' => '/uploads/'.$newFileName]);
        } else {
            $errors[] = 'Unable to Upload File';
            return errorResponse($errors);
        }
    }
}