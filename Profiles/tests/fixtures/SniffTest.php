<?php

namespace Dvsa\Permit\Sniffs;

use Common\Controller\Lva\Interfaces\TransportManagerAdapterInterface;
use Dvsa\Olcs\Api\Domain\CommandHandler\AbstractCommandHandler;
use Dvsa\Olcs\Transfer\Command\CommandInterface;

/**
 * Class SniffTest
 */
class SniffTest extends AbstractCommandHandler implements TransportManagerAdapterInterface
{
    public function __construct()
    {
        return $this;
    }

    /**
     * get table
     *
     * @return \Common\Service\Table\TableBuilder
     */
    public function getTable()
    {
        // TODO: Implement getTable() method.
    }

    /**
     * get table data
     *
     * @param int $applicationId application id
     * @param int $licenceId     licence id
     *
     * @return array|null
     */
    public function getTableData($applicationId, $licenceId)
    {
        // TODO: Implement getTableData() method.
    }

    /**
     * whether at least one tm must be present
     *
     * @return int
     */
    public function mustHaveAtLeastOneTm()
    {
        // TODO: Implement mustHaveAtLeastOneTm() method.
    }

    /**
     * delete transport manager
     *
     * @param array $ids           array of ids to be deleted
     * @param int   $applicationId application id
     *
     * @return bool
     */
    public function delete(array $ids, $applicationId)
    {
        // TODO: Implement delete() method.
    }

    /**
     * add messages
     *
     * @param int $licenceId licence id
     *
     * @return void
     */
    public function addMessages($licenceId)
    {
        // TODO: Implement addMessages() method.
    }

    /**
     * get number of rows in the data
     *
     * @param int $applicationId application id
     * @param int $licenceId     licence id
     *
     * @return int
     */
    public function getNumberOfRows($applicationId, $licenceId)
    {
        // TODO: Implement getNumberOfRows() method.
    }

    /**
     * @param CommandInterface $command
     *
     * @return \Dvsa\Olcs\Api\Domain\Command\Result
     */
    public function handleCommand(CommandInterface $command)
    {
        // TODO: Implement handleCommand() method.
    }
}