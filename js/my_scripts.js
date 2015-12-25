//Задание 2(смена цвета текста)
var num = 1;
var flag = 0;
function changeColor(){
    var color = ['red','orange','yellow','lightblue','blue','purple'];
    $('.wrep').css('color',color[num]);
    if(num == 5) flag = 1;
    if(num == 0)flag = 0;
    (flag)? num-- : num++;
}



$(document).ready(function(){
    //Задание 2(смена цвета текста)
    setInterval("changeColor()",4000);


});