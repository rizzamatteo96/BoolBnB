import axios from "axios";

window.findMap = function(location){
  axios.get('https://api.tomtom.com/search/2/geocode/' + location + '.JSON?key=K3xnfxcXAODvZopP0scVRnmjNxjruLUo')
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.log(error);
      });
};