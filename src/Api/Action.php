<?php

/**
 * This file is part of the DigitalOceanV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DigitalOceanV2\Api;

use DigitalOceanV2\Entity\Action as ActionEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class Action extends AbstractApi
{
    /**
     * @return ActionEntity[]
     */
    public function getAll()
    {
        $actions = $this->adapter->get(sprintf('%s/actions', self::ENDPOINT));
        $actions = json_decode($actions);

        $results = array();
        foreach ($actions->actions as $action) {
            $results[] = new ActionEntity($action);
        }

        return $results;
    }

    /**
     * @param  integer      $id
     * @return ActionEntity
     */
    public function getById($id)
    {
        $action = $this->adapter->get(sprintf('%s/actions/%d', self::ENDPOINT, $id));
        $action = json_decode($action);

        return new ActionEntity($action->action);
    }
}
