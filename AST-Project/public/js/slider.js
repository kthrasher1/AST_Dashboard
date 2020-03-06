

let slider = document.getElementById("slider");
let img = document.getElementById("emotion-icons");
let text = document.getElementById("emotion-text");

slider.oninput = function()
{

    if(slider.value == 1)
    {
        img.src="img/very-sad.svg";
        text.innerHTML = "Really Bad!";

    }
    else if(slider.value == 2)
    {
        img.src="img/kinda-sad.svg";
        text.innerHTML = "Not Great";
    }
    else if(slider.value == 3){
        img.src = "img/neutral.svg";
        text.innerHTML = "Okay";
    }
    else if(slider.value == 4){

        img.src = "img/kinda-happy.svg";
        text.innerHTML = "Pretty Okay";
    }
    else if(slider.value == 5){
        img.src = "img/very-happy.svg";
        text.innerHTML = "Amazing!";
    }
}


