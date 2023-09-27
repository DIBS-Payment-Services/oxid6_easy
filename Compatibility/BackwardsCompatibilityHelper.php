<?php
namespace Es\NetsEasy\Compatibility;

use OxidEsales\Eshop\Core\ShopVersion;

class BackwardsCompatibilityHelper {
    protected $versionCheck = '6.2';

    /**
     * @return string
     */
    public function getVersionCheck(): string
    {
        return $this->versionCheck;
    }

    public function getQueryBuilder() {

        $shopVersion = ShopVersion::getVersion();
        if ($shopVersion < $this->getVersionCheck()) {

            return \OxidEsales\EshopCommunity\Internal\Application\ContainerFactory::getInstance()->getContainer()->get(\OxidEsales\EshopCommunity\Internal\Common\Database\QueryBuilderFactoryInterface::class)->create();
        }
        return \OxidEsales\EshopCommunity\Internal\Container\ContainerFactory::getInstance()->getContainer()->get(\OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface::class)->create();

    }

}
