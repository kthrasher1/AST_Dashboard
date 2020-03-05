

var slider = document.getElementById("slider");
//var sliderVal = slider.value;
var img = document.getElementById("emotion-icons");

function between(x, min, max) {
    return x >= min && x <= max;
}

slider.oninput = function()
{ 

    if(between(slider.value, 0, 2))
    {
        img.src="img/very-sad.svg";
    }
    else if(between(slider.value, 3, 4))
    {
        img.src="img/kinda-sad.svg";
    }
    else if(between(slider.value,5,6)){
        img.src = "img/neutral.svg";
    }
    else if(between(slider.value,7,8)){
        
        img.src = "img/kinda-happy.svg";
    }
    else if(between(slider.value, 9, 10)){
        img.src = "img/very-happy.svg";
    }
}


