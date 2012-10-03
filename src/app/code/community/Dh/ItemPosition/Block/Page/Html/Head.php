<?php

/**
 * Dh ItemPosition Html page block
 * 
 * Extends Mage_Page_Block_Html_Head to provide extremely basic ordering to included files i.e. js and css
 *
 * @category   Dh
 * @package    Dh_ItemPosition
 * @author     Drew Hunter <drewdhunter@gmail.com>
 */
class Dh_ItemPosition_Block_Page_Html_Head extends Mage_Page_Block_Html_Head
{

    /**
     * Set the first item in the head items list
     *
     * @param $key
     * @return Dh_ItemPosition_Block_Page_Html_Head
     */
    public function setFirstItem($key)
    {
        if (isset($this->_data['items'][$key])) {
            $this->_data['items'] = array($key => $this->_data['items'][$key]) 
                + $this->_data['items'];
        }
        return $this;
    }

    /**
     * Set the last item in the head items list
     *
     * @param $key
     * @return Dh_ItemPosition_Block_Page_Html_Head
     */
    public function setLastItem($key)
    {
        if (isset($this->_data['items'][$key])) {
           $this->_data['items'] = $this->_data['items'] 
                + array($key => $this->_data['items'][$key]);
        }
        return $this;
    }


    /**
     * Ensures that the beforeKey element will always be positioned before
     * the afterKey element.
     * 
     * This is going to work best from local.xml
     *
     * If beforeKey already is before afterKey then nothing is moved.  If
     * beforeKey is after afterKey then it will be moved to directly before it.
     *
     * @param $beforeKey
     * @param $afterKey
     * @return Dh_ItemPosition_Block_Page_Html_Head
     */
    public function setBefore($beforeKey, $afterKey)
    {
        $items = $this->_data['items'];

        if (array_key_exists($beforeKey, $items) && array_key_exists($afterKey, $items)) {

            $keys = array_keys($items); 

            $beforePos = array_search($beforeKey, $keys);
            $afterPos = array_search($afterKey, $keys);
            
            $afterItem = array_splice($items, $afterPos, 1, true);
            $sortedItems = array_slice($items, $beforePos, 1, true)
                + $afterItem
                + array_slice($items, $beforePos+1, null, true)
            ;

            $this->_data['items'] = $sortedItems;
        }
        return $this;
    }
}
