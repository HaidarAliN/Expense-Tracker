$(document).ready(function(){
    // var newRowContent = "<tr><td>y</td><td>y</td><td>y</td><td>y</td></tr>";
    // jQuery("#tblEntAttributes tbody").append(newRowContent);
    $.fn.chartfn = function(){ 
        $('#chart').empty();
        $('#chart').html('<canvas id="mycanvas" width="256" height="256"></canvas>');

        var ctx = $("#mycanvas").get(0).getContext("2d");
        //pie chart data
        //sum of values = 360
        var user_id = "#user";
        var user_id_value = $(user_id).val();
        $.post("php/api/getallcategoryapi.php",
        {
        user_id: user_id_value
        }, function(data){
            data = $.parseJSON( data );
            pie_array = [];
            pie_sub_array = {};
            var i = 0;
            
            data.forEach(data => {
                var back = ["#ff0000","blue","gray"];
                var rand = back[Math.floor(Math.random() * back.length)];
                pie_array.push({value: parseInt(data['amount']), label : data['category'],color: rand});
                i++;
            });
            console.log(pie_array);
            var piechart = new Chart(ctx).Pie(pie_array);
        });
    }
    
    $(".link").click(function(){
        var idnum = $(this).attr('id');
        var idname = idnum.slice(0,-1);
        var lastChar = idnum[idnum.length -1];
        var item_id = "#expense" + lastChar;
        var item_id_value = $(item_id).val();
        var user_id = "#user";
        var user_id_value = $(user_id).val();

        if(idname=="category"){
            var cat = prompt("Enter new category", "");
            if (cat != null && cat != ""){


                $.post("php/api/updatecategoryapi.php",
                {
                item_id: item_id_value,
                user_id: user_id_value,
                newcat: cat
                });
                var idnumtag = "#" + idnum;
                $(idnumtag).html(cat);
                $.fn.chartfn();
            }
        }
        if(idname=="amount"){
            var amount = prompt("Enter new amount", "");
            if (amount != null && amount != ""){

                $.post("php/api/updateamountapi.php",
                {
                item_id: item_id_value,
                user_id: user_id_value,
                newam: amount
                });
                var idnumtag = "#" + idnum;
                $(idnumtag).html(amount+"$");
                $.fn.chartfn();
            }
        }
    });

    $.fn.chartfn();


});