<?php


function getFolder(){


    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

function getFolderJs(){


    return app()->getLocale() == 'ar' ? 'js-rtl' : 'js';
}

