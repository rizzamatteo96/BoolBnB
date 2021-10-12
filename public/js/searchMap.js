/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/searchMap.js ***!
  \***********************************/
// ************ SearchMap on create and update .blade.php *******************
window.searchBox = function () {
  console.log('fando');
  var options = {
    searchOptions: {
      key: this.apiKey,
      language: 'it-IT',
      limit: 5
    },
    autocompleteOptions: {
      key: this.apiKey,
      language: 'it-IT'
    }
  };
  var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
  var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
  document.getElementById('search-field').append(searchBoxHTML);
};
/******/ })()
;