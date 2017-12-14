$("#zadator").click(function () {
    $(this).prop("disabled","true");
    var s = '?a=tassk', i;
    var sve = $("[data-clckd=true]");
    var c=0;
    for (i = 0; i < sve.length; i++){
        if (sve.eq(i).closest("table").attr("data-koba") != '0'){
            s += "&s" + c + "=" + sve.eq(i).attr("data-subdis") +
                "&k" + c + "=" + sve.eq(i).closest("table").attr("data-koba") +
                "&t" + c + "=" + sve.eq(i).closest("table").attr("data-dann") +
                "&m" + c + "=" +
                $(".slidq[data-dans="+sve.eq(i).closest("table").attr("data-dann")+"][data-kos="+sve.eq(i).closest("table").attr("data-koba")+"]").val();
            c++;
        }
    }
    //alert(s);
    $.ajax({
        url: "/php/ajax.php" + s,
        type: "POST",
        success: function (e) {
            alert(e);
            location.reload();
        }
    });
});

$("#usp").click(function () {
    $(this).prop("disabled","true");
    var pace=$("#pacee").html();
    var umor=$("[data-checked=true]").attr("data-kojilvl");
    $.ajax({
        url: "/php/ajax.php",
        type: "POST",
        data: {a:"uspi",pace:pace,umor:umor},
        success: function (e) {
            alert(e);
            location.reload();
        }
    });
});