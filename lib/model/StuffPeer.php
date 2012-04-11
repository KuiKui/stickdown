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
  static public function getStuffsByBoard($boardId)
  {
    return StuffQuery::create()
      ->filterByBoardId($boardId)
      ->filterByDeletedAt(null, Criteria::ISNULL)
      ->orderByOrder(Criteria::ASC)
      ->orderByCreatedAt(Criteria::DESC)
      ->find();
  }

  static public function updateStuffOrder(array $stuffOrder)
  {
    foreach($stuffOrder as $order => $stuffId)
    {
      StuffQuery::create()
        ->filterById($stuffId)
        ->update(array('Order' => $order));
    }
  }
} // StuffPeer
