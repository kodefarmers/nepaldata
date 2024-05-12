<?php

namespace KodeFarmers\NepalData;

/**
 * Class NepalData
 *
 * Provides methods to access Nepal-related data such as provinces and districts.
 *
 * @package KodeFarmers\NepalData
 * @property bool $withDistricts Indicates if provinces should include districts.
 * @property bool $withLocalBodies Indicates if districts should include localbodies.
 *
 * @method array all(string $lang = 'english') Get all data.
 * @method array provinces(string $lang = 'english') Get provinces.
 * @method array districts(string $lang = 'english') Get districts.
 **/
class NepalData
{
    /**
     * Indicates if provinces should include districts.
     *
     * @var bool
     */
    protected $withDistricts = false;

    /**
     * Indicates if districts should include localbodies.
     *
     * @var bool
     */
    protected $withLocalBodies = false;

    /**
     * Get all data.
     *
     * @param string $lang Language (english, nepali, devanagari).
     * @return array All data.
     */
    public function all($lang = 'english'): array
    {
        if($lang == 'nepali' || $lang == 'devanagari') {
            return $this->getAllDataInDevanagari();
        }

        return $this->getAllData();
    }

    /**
     * Get provinces.
     *
     * @param string $lang Language (english, nepali, devanagari).
     * @return array Provinces data.
     */
    public function provinces($lang = 'english'): array
    {
        if($this->withDistricts){
            if($lang == 'nepali' || $lang == 'devanagari') {
                return $this->getProvincesWithDistrictsInDevanagari();
            }
            return $this->getProvincesWithDistricts();
        }

        if($lang == 'nepali' || $lang == 'devanagari') {
            return $this->getProvincesInDevanagari();
        }

        return $this->getProvinces();
    }

    /**
     * Get districts.
     *
     * @param string $lang Language (english, nepali, devanagari).
     * @return array Districts data.
     */
    public function districts($lang = 'english'): array
    {
        if($this->withLocalBodies){
            if($lang == 'nepali' || $lang == 'devanagari') {
                return $this->getDistrictsWithLocalBodiesInDevanagari();
            }
            return $this->getDistrictsWithLocalBodies();
        }

        if($lang == 'nepali' || $lang == 'devanagari') {
            return $this->getDistrictsInDevanagari();
        }

        return $this->getDistricts();
    }

    /**
     * Specify the data to include (district or localbody).
     *
     * @param string $with Data to include ('district', 'localbody').
     * @return NepalData
     */
    public function with(string $with): NepalData
    {
        if($with == 'districts' || $with == 'district') {
            $this->withDistricts = true;
        } else if($with == 'localbodies' || $with == 'localbody') {
            $this->withLocalBodies = true;
        }

        return $this;
    }

    /**
     * Get all data.
     *
     * @return array All data.
     */
    public function getAllData(): array
    {
        require 'Datas/allData.php';

        return $allData;
    }

    /**
     * Get all data in devanagari.
     *
     * @return array All data.
     */
    public function getAllDataInDevanagari(): array
    {
        require 'Datas/allData.php';

        return $allDataInDevanagari;
    }

    /**
     * Get provinces data.
     *
     * @return array Provinces data.
     */
    private function getProvinces(): array
    {
        require 'Datas/provinces.php';
        return $provinces;
    }

    /**
     * Get provinces data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getProvincesInDevanagari(): array
    {
        require 'Datas/provinces.php';
        return $provincesInDevanagari;
    }

    /**
     * Get provinces with districts data.
     *
     * @return array Provinces data.
     */
    private function getProvincesWithDistricts(): array
    {
        require 'Datas/provincesWithDistricts.php';
        return $provincesWithDistricts;
    }

    /**
     * Get provinces with districts data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getProvincesWithDistrictsInDevanagari(): array
    {
        require 'Datas/provincesWithDistricts.php';
        return $provincesWithDistrictsInDevanagari;
    }

    /**
     * Get districts data.
     *
     * @return array Provinces data.
     */
    private function getDistricts(): array
    {
        require 'Datas/districts.php';
        return $districts;
    }

    /**
     * Get provinces data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getDistrictsInDevanagari(): array
    {
        require 'Datas/districts.php';
        return $districtsInDevanagari;
    }

    /**
     * Get districts with localbodies data.
     *
     * @return array Provinces data.
     */
    private function getDistrictsWithLocalBodies(): array
    {
        require 'Datas/districtsWithLocalBodies.php';
        return $districtsWithLocalBodies;
    }

    /**
     * Get districts with localbodies data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getDistrictsWithLocalBodiesInDevanagari(): array
    {
        require 'Datas/districtsWithLocalBodies.php';
        return $districtsWithLocalBodiesInDevanagari;
    }
}
