<?php

namespace KodeFarmers\NepalData;

class NepalData
{
  public function getAllData()
  {
    require 'Datas/allData.php';
    return $allData;
  }

  public function getAllDataInDevanagari()
  {
    require 'Datas/allData.php';
    return $allDataInDevanagari;
  }

  public function getProvinces()
  {
    require 'Datas/provinces.php';
    return $provinces;
  }

  public function getProvincesInDevanagari()
  {
    require 'Datas/provinces.php';
    return $provincesInDevanagari;
  }

  public function getProvincesWithDistricts()
  {
    require 'Datas/provincesWithDistricts.php';
    return $provincesWithDistricts;
  }

  public function getProvincesWithDistrictsInDevanagari()
  {
    require 'Datas/provincesWithDistricts.php';
    return $provincesWithDistrictsInDevanagari;
  }

  public function getDistricts()
  {
    require 'Datas/districts.php';
    return $districts;
  }

  public function getDistrictsInDevanagari()
  {
    require 'Datas/districts.php';
    return $districtsInDevanagari;
  }

  public function getDistrictsWithLocalBodies()
  {
    require 'Datas/districtsWithLocalBodies.php';
    return $districtsWithLocalBodies;
  }

  public function getDistrictsWithLocalBodiesInDevanagari()
  {
    require 'Datas/districtsWithLocalBodies.php';
    return $districtsWithLocalBodiesInDevanagari;
  }
}
