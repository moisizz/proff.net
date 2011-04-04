<?php

/**
 * room actions.
 *
 * @package    proff.dev
 * @subpackage room
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class roomActions extends myActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    /**
     * @todo Когда будут готовы картинки квартиры вида с верху список комнат больше не понадобится
     */
    $this->rooms = RoomTable::getInstance()->getRooms();
  }
  
  
  
  public function executeShow(sfWebRequest $request)
  {
    $this->room = $this->getRoute()->getObject();
    
    
    $room_id = $this->room['id'];
    $this->room_furniture_type_list = FurnitureTypeTable::getInstance()->getRoomFurnitureTypes($room_id);
    $this->portfolio_list = PortfolioTable::getInstance()->getRoomPortfolio($room_id);
  }
}
