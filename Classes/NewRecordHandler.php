<?php
namespace Cobweb\Linkhandler;

use TYPO3\CMS\Core\LinkHandling\LinkHandlingInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class NewRecordHandler
 */
class NewRecordHandler implements LinkHandlingInterface
{

    /**
     * The Base URN for this link handling to act on
     * @var string
     */
    protected $baseUrn = 'record:';

    /**
     * Save string for linkhandler like "record:key:table:uid" to rte
     *
     * @param array $parameters
     * @return string
     */
    public function asString(array $parameters): string
    {
        $link = $this->baseUrn . $this->getType($parameters) . ':' . $this->getTable($parameters)
            . ':' . $this->getIdentifier($parameters);
        return $link;
    }

    /**
     * @param array $parameters
     * @return string
     */
    protected function getType(array $parameters): string
    {
        return $this->getParametersFromLinkhandlerLink($parameters)[0];
    }

    /**
     * @param array $parameters
     * @return string
     */
    protected function getTable(array $parameters): string
    {
        return $this->getParametersFromLinkhandlerLink($parameters)[1];
    }

    /**
     * @param array $parameters
     * @return string
     */
    protected function getIdentifier(array $parameters): string
    {
        return $this->getParametersFromLinkhandlerLink($parameters)[2];
    }

    /**
     * @param array $parameters
     * @return array
     */
    protected function getParametersFromLinkhandlerLink(array $parameters): array
    {
        return GeneralUtility::trimExplode(':', $parameters['url'], true);
    }

    /**
     * @param array $data
     * @return array
     */
    public function resolveHandlerData(array $data): array
    {
        return [];
    }
}
