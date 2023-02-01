<?php

namespace Mart\ExternalSale\Mapper;


use Magento\Catalog\Model\ResourceModel\Product\Collection;

use Mart\ExternalSale\Api\Data\CurrencyInterfaceFactory;
use Mart\ExternalSale\Api\Data\GrabMartMenuInterfaceFactory;
use Mart\ExternalSale\Api\Data\GrabMartMenuInterface;
use Mart\ExternalSale\Model\Api\Data\Currency;
use Mart\ExternalSale\Model\Api\Data\GrabMartMenu;

class ProductListToGrabMenuMapper
{

    protected $currencyFactory;
    protected $menuFactory;

    /**
     * ProductListToGrabMenuMapper constructor.
     */
    public function __construct(
        CurrencyInterfaceFactory $currencyFactory,
        GrabMartMenuInterfaceFactory $menuFactory
    )
    {
        $this->currencyFactory = $currencyFactory;
        $this->menuFactory = $menuFactory;
    }

    public function map(Collection $source, array $options)
    {
        $des = $this->menuFactory->create();

        $currency = $this->currencyFactory->create();
        $currency->setCode($options['code']);
        $currency->setSymbol($options['currencySymbol']);
        $currency->setExponent($options['exponent']);


       // dd($currency);

        $des->setMerchantID($options['merchantID']);
        $des->setPartnerMerchantID($options['partnerMerchantID']);
        $des->setCurrency($currency);
        $des->setSellingTimes([]);
        $des->setCategories($this->mapCategories($options));

        return $des;
    }

    private function mapCategories(array $options): array
    {
        $grabCategories = [];
        foreach ($options['categories'] as $category) {
            $grabCategory = [];
            $grabCategory['id'] = $category['id'];
            $grabCategory['sellingTimeID'] = "partner-sellingTimeID-01";
            $grabCategory['subCategories'] = [];
            foreach ($category['children_data'] as $child) {
                $subCategory = [];
                $subCategory['id'] = $child['id'];
                $subCategory['items'] = [];
                $grabCategory['subCategories'][] = $subCategory;
            }
            $grabCategories[] = $grabCategory;
        }

        return $grabCategories;
    }
}
