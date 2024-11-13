<?php

class CustomFunction{

    public function checkEmpty($items = [])
    {
        foreach($items as $item)
        {
            if(empty($item))
            {
                return true;
            }
        }
        return false;
    }

    public function checkValidEmail($email)
    {
        $valid = ['@','g','m','a','i','l','.','c','o','m'];
        $arr_counter = 0;

        if(strlen($email) < 10)
        {
            return true;
        }

        for($i = strlen($email) - 10; $i < strlen($email); $i++)
        {
            if($email[$i] != $valid[$arr_counter])
            {
                return true;
            }
            $arr_counter++;
        }
        return false;
    }


    public function checkValidImg($img_type)
    {
        $valid_img = ['image/jpg', 'image/jpeg', 'image/png','image/svg'];
        foreach($valid_img as $valid)
        {
            if($img_type == $valid)
            {
                return false;
            }
        }
        return true;
    }

    public function checkValidMultipleImg($img_type = [])
    {
        $valid_img = ['image/jpg', 'image/jpeg', 'image/png','image/svg', 'image/webp'];

        for($i = 0; $i < count($img_type); $i++)
        {
            foreach($valid_img as $valid)
            {
                if($img_type[$i] == $valid)
                {
                    return false;
                }
            }
        }
        
        return true;
    }



    public function uploadPropertyImageToFolderAndReturnName($image, $images)
    {
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];

        $imageExtension = pathinfo($image_name, PATHINFO_EXTENSION);
        $newImageName =  uniqid('image_', true) . '.' . $imageExtension;

        move_uploaded_file($image_tmp, "../frontend/image/post_property_image/$newImageName");

        $imageName = $newImageName;
        $imagesName = [];

        for($i = 0; $i < count($images['name']); $i++)
        {
            $file_name = $images['name'][$i];
            $file_tmp = $images['tmp_name'][$i];

            $imagesExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $newImagesName =  uniqid('image_', true) . '.' . $imagesExtension;
            array_push($imagesName, $newImagesName);
            move_uploaded_file($file_tmp, "../frontend/image/post_property_image/$newImagesName");
        }

        // index 0 is image name and index 1 array 
        return [$imageName, $imagesName];
    }


}