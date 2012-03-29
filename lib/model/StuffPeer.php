<?php



/**
 * Skeleton subclass for performing query and update operations on the 'stuff' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class StuffPeer extends BaseStuffPeer {
  static public function getStuffByBoard($boardId)
  {
    return StuffQuery::create()
      ->filterByBoardId($boardId)
      ->filterByDeletedAt(null, Criteria::ISNULL)
      ->orderByCreatedAt(Criteria::DESC)
      ->find();
  }
} // StuffPeer
