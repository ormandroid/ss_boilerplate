<?php

class PaginatedListExtension extends Extension {

    /**
    * Returns the current item positions in a paginated page.
    *
    * @return string
    */
    public function getCurrentPosition() {
        $total  = $this->owner->getTotalItems();
        $pageLength  = $this->owner->getPageLength();
        $currentPage  = $this->owner->currentPage();
        if($this->owner->CurrentPage() != $this->owner->TotalPages()){
            $y = $currentPage * $pageLength;
        }else{
            $y = $total;
        }
        $x = ($currentPage - 1) * $pageLength + 1;;
        if($x == $y){
            $out = 'Showing record '.$x.' out of '.$total;
        }else{
            $out = 'Showing records '.$x.'-'.$y.' out of '.$total;
        }
        return $out;
    }

}