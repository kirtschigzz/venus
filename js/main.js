//login
function handleCredentialResponse(response) {
    const data = jwt_decode(response.credential)
    console.log(data)     
}

window.onload = function () {

  google.accounts.id.initialize({
    client_id: "677007561753-bluqmhvnmafaii2c6bmdaf2hug78ft6k.apps.googleusercontent.com",
    callback: handleCredentialResponse
});

  google.accounts.id.renderButton(
    document.getElementById("buttonGoogle"), { 
        
        shape: "pill",
        type: "standard",
        theme: "filled_black",
        text: "$ {button.text}",
        size: "large",
        logo_alignment: "left",

} 
);

  google.accounts.id.prompt(); // also display the One Tap dialog
}

document.addEventListener("keypress", function(e) {
  if(e.key === 'Enter') {
  
      var btn = document.querySelector("#pesquisar", "#logar", "#postar", "#enviar");
    
    btn.click();
  
  }
});

  

