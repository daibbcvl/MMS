<?php declare(strict_types=1);

namespace Mart\ExternalSale\Api\Data;


use Mart\SMS\Api\Data\LogSearchResultsInterface;

interface GrabMartMenuInterface
{
    const MERCHANT_ID ='merchantID';
    const PARTNER_MERCHANT_ID = 'partnerMerchantID';
    const SELLING_TIMES = 'sellingTimes';
    const CURRENCY = 'currency';
    const CATEGORIES = 'categories';

//    /**
//     * @return string
//     */
//    public function getMerchantID(): string;
//
//    /**
//     * @param string $merchantID
//     * @return void
//     */
//    public function setMerchantID(string $merchantID): void;
//
//    /**
//     * @return string
//     */
//    public function getPartnerMerchantID(): string;
//
//    /**
//     * @param string $partnerMerchantID
//     * @return void
//     */
//    public function setPartnerMerchantID(string $partnerMerchantID): void;
//
//    /**
//     * @return array
//     */
//    public function getSellingTimes(): array;
//
//    /**
//     * @param array $sellingTimes
//     * @return void
//     */
//    public function setSellingTimes(array $sellingTimes): void;

     /**
      * @return \Mart\ExternalSale\Api\Data\CurrencyInterface|null
      */
     public function getCurrency(): ?CurrencyInterface;

     /**
      * @param \Mart\ExternalSale\Api\Data\CurrencyInterface $currency
      * @return void
      */
     public function setCurrency(CurrencyInterface $currency): void;

    /**
     * @return \Mart\ExternalSale\Api\Data\CategoryInterface[]
     */
    public function getCategories(): array;

    /**
     * @param \Mart\ExternalSale\Api\Data\CategoryInterface[] $categories
     * @return void
     */
    public function setCategories(array $categories): void;


}
