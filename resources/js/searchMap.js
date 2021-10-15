


// ************ SearchMap on create and update .blade.php *******************

window.searchBox = function() {
  var options = {
      searchOptions: {
          key: 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
          language: 'it-IT',
          limit: 5
      },
      autocompleteOptions: {
          key: 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
          language: 'it-IT'
      }
  };
  var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
  var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
  document.getElementById('search-field').append(searchBoxHTML);

  // set the name for the form data send
  document.querySelector('input.tt-search-box-input').name = 'address';
  document.querySelector('input.tt-search-box-input').id = 'search-input-for-coordinates';
  document.querySelector('input.tt-search-box-input').placeholder = 'Indirizzo'
};