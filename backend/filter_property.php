<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    if(isset($_POST['search_btn']))
    {
        $search_id = $_POST['search_id'];

        $property_data = $database->get('select * from post_property join landlords on post_property.landlord_id = landlords.account_id where post_id = ?', [$search_id], 'fetchAll');
    }

    if(isset($_POST['filter_btn']))
    {
        $minPrice = $_POST['min_price'];
        $maxPrice = $_POST['max_price'];
        $room = $_POST['room_count'];
        $bathroom = $_POST['bathroom_count'];
        $location = $_POST['location'];

        $unfiltered_property = $property_data;

        if(!empty($minPrice))
        {
            $unfiltered_property = array_filter($unfiltered_property, fn($data) => $data['post_price'] >= $minPrice);
        }

        if(!empty($maxPrice))
        {
            $unfiltered_property = array_filter($unfiltered_property, fn($data) => $data['post_price'] <= $maxPrice);
        }

        if(!empty($room))
        {
            $unfiltered_property = array_filter($unfiltered_property, fn($data) => $data['room_count'] == $room);
        }

        if(!empty($bathroom))
        {
            $unfiltered_property = array_filter($unfiltered_property, fn($data) => $data['bathroom_count'] == $bathroom);
        }

        if(!empty($location))
        {
            $unfiltered_property = array_filter($unfiltered_property, fn($data) => $data['post_location'] == $location);
        }

        $property_data = $unfiltered_property;
    }
    
    
}
