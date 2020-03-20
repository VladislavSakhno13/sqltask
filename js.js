let axios = require('axios');
document.getElementById('button').onclick = function(){
    axios.get('./data.php')
    .then(function(response){
        console.log(response.data); 
    })

}

