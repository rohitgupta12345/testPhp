<?php
    require_once('connect.php');
 
    
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "SELECT City.Name, City.CountryCode, Country.Code, Country.Name AS Country, Country.Continent, Country.Region FROM City, Country WHERE City.CountryCode = Country.Code";
 
    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $page, $limit );
?>