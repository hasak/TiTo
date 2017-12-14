$(document).ready(function () {
    $("title").append(' &ndash; Trčanje i to');
});

$(".lvl").click(function () {
    var k=$(this).attr("data-kojilvl");
    var svi=$(".lvl");
    var i,b,g;
    for(i=0;i<k;i++){
        g=15*(10-i)+71;
        b=21*(10-i);
        svi.eq(i).css("background-color","rgb(255,"+g+","+b+")");
        svi.attr("data-checked","false");
    }
    for(i=k;i<10;i++) {
        svi.eq(i).css("background-color", "#fff");
        svi.attr("data-checked","false");
    }
    $(this).attr("data-checked","true");
});

function len(a) {
    return parseInt(a).toString().length;
}


$(".vrim").on("change click keypress keydown keyup",function () {
    var min=$("#minu").val();
    var s=$("#secc").val();
    if(min<0 || min>59 || min==null)
        min=0.0;
    else min=parseFloat(min);
    if(s<0 || s>59 || s==null)
        s=0.0;
    else s=parseFloat(s);
    var km=parseFloat($("#ukuonokm").html());
    var raw=min*60+s;
    raw/=km;
    var m=Math.floor(raw/60);
    var se=raw%60;
    var out="";
    if(len(m)==1)
        out+="0";
    out+=m+":";
    if(len(se)==1)
        out+="0";
    out+=se.toFixed(0);
    $("#pacee").html(out);
});

$(".klikk").click(function () {
    var sta=parseInt($(this).attr("data-sta"));
    var dan=parseInt($(this).attr("data-dan"));
    var ko=parseInt($(this).attr("data-ko"));
    if(ko){
        $("[data-dan="+dan+"][data-ko="+ko+"]").attr("data-sldd","false");
        $(this).attr("data-sldd","true");
        $("[data-dann="+dan+"][data-koba="+ko+"]").find("td").attr("data-clckd","false");
        $("[data-disc][data-koba="+ko+"][data-dann="+dan+"]").hide();
        $("[data-disc="+sta+"][data-koba="+ko+"][data-dann="+dan+"]").show();
    }
    else{
        $("[data-dan="+dan+"]").attr("data-sldd","false");
        $("[data-dan="+dan+"][data-sta="+sta+"]").attr("data-sldd","true");
        $("[data-dann="+dan+"]").find("td").attr("data-clckd","false");
        $("[data-disc][data-dann="+dan+"]").hide();
        $("[data-disc="+sta+"][data-dann="+dan+"]").show();
    }
});

$(".kilik").click(function () {
    var sta=parseInt($(this).attr("data-subdis"));
    var dan=parseInt($(this).parent().parent().parent().attr("data-dann"));
    var ko=parseInt($(this).parent().parent().parent().attr("data-koba"));
    if(ko){
        $("[data-dann="+dan+"][data-koba="+ko+"]").find("td").attr("data-clckd","false");
        $(this).attr("data-clckd","true");
    }
    else{
        $("[data-dann="+dan+"]").find("td").attr("data-clckd","false");
        $("[data-dann="+dan+"]").find("td[data-subdis="+sta+"]").attr("data-clckd","true");
    }
});

$(".slidq").on("input",function () {
    var kome=$(this).attr("data-kos");
    var kadmu=$(this).attr("data-dans");
    var valu=$(this).val();
    $(".sliderval[data-kosu="+kome+"][data-dansu="+kadmu+"]").html("<b>"+valu+"</b> km");
})

$(".slidqu").on("input",function () {
    var kadmu=$(this).attr("data-dansu");
    var valu=$(this).val();
    $(".slidq[data-dans="+kadmu+"]").val(valu);
    $(".sliderval[data-dansu="+kadmu+"]").html("<b>"+valu+"</b> km");
})
