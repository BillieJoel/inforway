<?php
function isActivePage($currentPage, $pageName)
{
  if ($currentPage == $pageName) {
    return 'active';
  }
  return '';
}
?>