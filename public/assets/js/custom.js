/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function addrecord(){
    const recordtxt = document.querySelector('.linkrecordtxt');

    recordtxt.innerHTML += `<input type="text" name="link_record[]" class="mt-2 form-control">`
}

function changeapproval(){
    const formchangeapproval = document.getElementById('formchangeapproval')

    

    if(confirm('Ganti status approval ?'))
    {
        formchangeapproval.submit()
    }
}