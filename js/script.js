/*
@package		mod_qlchucknorris
@copyright	    Copyright (C) 2019 ql.de All rights reserved.
@author 		Mareike Riegel mareike.riegel@ql.de
@license		GNU General Public License version 2 or later; see LICENSE.txt
*/

/**
 *
 * @param numModuleId
 */
function roundhouseKickNow(numModuleId) {

    // get body from source = replacement
    var strSourceSelector = '#qlcn_' + numModuleId;
    var objSource = jQuery(strSourceSelector);
    var strSourceRaw = objSource.text();
    var strSource = strSourceRaw.replace(/(\r\n|\n|\r)/gm, ' ');
    var arrSource = strSourceRaw.split("\n");

    // get replacements for buttons
    var strButtonsSelector = '#qlcn_buttons_' + numModuleId;
    var objButtonContent = jQuery(strButtonsSelector);
    var strButtonsRaw = objButtonContent.text();

    // get html source code from body
    var objBody = jQuery('body');
    var objElements = objBody.find('p');
    // var objElements2 = objBody.find('div');
    var strContent = '';
    var arrSourceShuffled = [];
    jQuery.each(objElements, function(numIndex, elElement) {
        strContent = jQuery(elElement).text();
        arrSourceShuffled = shuffle(arrSource);
        strSource = arrSourceShuffled.join("\n");
        jQuery(elElement).text(replaceContent(strContent, strSource));
    });

    // set html into website
    //objBody.html(strBody2);
    replaceSpecialTags(strSourceRaw.split("\n"), jQuery(':header'));
    //replaceSpecialTags(strSourceRaw.split("\n"), jQuery('p'));
    replaceSpecialTags(strButtonsRaw.split("\n"), jQuery('button'));
    replaceSpecialTags(strButtonsRaw.split("\n"), jQuery('a.label'));
    replaceSpecialTags(strButtonsRaw.split("\n"), jQuery('.btn'));
    capitalizeFirstLetterElement('p');

    // refill source containers
    objBody.find(strSourceSelector).text(strSourceRaw);
    objBody.find(strButtonsSelector).text(strButtonsRaw);
}

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

/**
 *
 * @param strText
 * @param strSource
 * @returns {string}
 */
function replaceContent(strText, strSource) {

    // initiate bool variables
    var boolPositionWithinTag = false;
    var boolNewLineEtc = false;

    // initiate return variables
    var strText2 = '';
    var strChar = '';
    var arrString = [];
    var arrText = [];
    var numPositionSrc = 0;
    var strRegex = new RegExp('[#%\'\!\.\,\(\)\-’a-zA-Z0-9\\s]', 'g');
    var numPosStart = 0;

    // tag check variables
    var numPosStop = 0;
    var strCheckTag = 0;
    var strRegexTag = new RegExp('\\<script');

    // iterate though text letter by letter
    for (var i = 0; i < strText.length; i++) {
        strChar = strText.charAt(i);

        // check if a tag starts
        if ('<' === strChar) {
            boolPositionWithinTag = true;
        }
        // or if a tag ends
        else if ('>' === strChar) {
            // generate string for checking if it is a 'script' tag (we do not want to replace strings within that)
            numPosStart = i - 8;
            numPosStop = i;
            strCheckTag = strText.substr(numPosStart, numPosStop);
            // if we are in a 'script' tag
            if (strCheckTag.match(strRegexTag)) {
                boolPositionWithinTag = true;
            }
            // now we're not in 'script' => activate replacing
            else {
                boolPositionWithinTag = false;
            }
        }
        // get information about the replacement = char and its position
        arrText = getCharOfSource(strSource, numPositionSrc);

        // check if we habe a new line
        boolNewLineEtc = checkTabNewLineEtc(strText, i, strChar);
        if (false === boolPositionWithinTag && false === boolNewLineEtc && strText.charAt(i).match(strRegex)) {
            // use replacement
            arrString[i] = arrText.strChar;
            strText2 += arrText.strChar;
            numPositionSrc = arrText.numPositionSrc;
            numPositionSrc++;
        } else {
            // use original string
            strText2 += strText.charAt(i);
        }
    }

    // add the rest of the replacement line, so that sentences end properly, and are not abruptly cut of
    strText2 += getRestOfLine(strSource, numPositionSrc, strChar);
    return strText2;
}

/**
 *
 * @param strSource
 * @param numPositionSrc
 * @param strChar
 * @returns {string}
 */
function getRestOfLine(strSource, numPositionSrc, strChar) {
    var boolNewLineEtc = checkTabNewLineEtc(strSource, numPositionSrc, strChar);
    if (boolNewLineEtc) {
        return '';
    }
    var numIndexStart = strSource.indexOf("\n", numPositionSrc);
    return strSource.substring(numPositionSrc, numIndexStart);
}

/**
 *
 * @param arrSourceInit
 * @param elElementsAll
 */
function replaceSpecialTags(arrSourceInit, elElementsAll) {
    var elElement = {};
    var strContentNew = '';
    var numLength;
    jQuery.each(elElementsAll, function (numKey, objElement) {
        elElement = jQuery(objElement);
        numLength = elElement.length;
        strContentNew = getRandomFromArray(arrSourceInit);
        jQuery(elElement).text(strContentNew);
    });
}

/**
 *
 * @param arrArray
 * @returns {*}
 */
function getRandomFromArray(arrArray) {
    return arrArray[Math.floor(Math.random() * arrArray.length)];
}

/**
 *
 * @param strText
 * @param numPos
 * @returns {{strChar: string, numPositionSrc: number}}
 */
function getCharOfSource(strText, numPos) {
    var numPosition = numPos % strText.length;
    var strChar = strText.charAt(numPosition);
    return {strChar: strChar, numPositionSrc: numPosition};
}

/**
 *
 * @param strText
 * @param numPos
 * @param strChar
 * @returns {boolean}
 */
function checkTabNewLineEtc(strText, numPos, strChar) {
    if (!strChar.match(/[\\tnr]/)) {
        return false;
    }
    var numPosStart = numPos - 2;
    if (numPosStart < 0) {
        return false;
    }
    var numPosStop = numPos + 1;

    var str2Check = strText.substring(numPosStart, numPosStop);
    var strRegex = /\\n/;
    if (str2Check.match(strRegex)) {
        return true;
    }
    return false;
}

/**
 *
 * @param string
 * @returns {string}
 */
function capitalizeFirstLetter(strString) {
    return strString.charAt(0).toUpperCase() + strString.slice(1);
}

/**
 *
 * @param string
 * @returns {string}
 */
function capitalizeFirstLetterElement(strSelector) {
    var objElementsAll = jQuery(strSelector);
    var objElement = {};
    jQuery.each(objElementsAll, function(numKey, elElement) {
        objElement = jQuery(elElement);
        objElement.text(capitalizeFirstLetter(objElement.text()));
    });
}