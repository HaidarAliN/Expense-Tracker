$(document).ready(function(){

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
      }
      let lc = 0;
      $.fn.link = function(){ 
        $(".link").click(function(){
            var idrow = $(this).attr('id');
            var idname = idrow.slice(0,-1);
            var lastChar = idrow[idrow.length -1];
            var item_id = "#expense" + lastChar;
            var item_id_value = $(item_id).val();
            var user_id = "#user";
            var user_id_value = $(user_id).val();
            var table_row_id = "#tr"+ lastChar; 
            if(idname == "delete"){
                const deleteexpense = async () => {
                    var requestObject = {expense_id: item_id_value};
                    const dele = await fetch("php/api/deleteexpenseapi.php", {
                        method: "POST",
                        headers: {
                            "Content-type": "application/x-www-form-urlencoded"
                        },
                        body: formEncode(requestObject)
                      });
                      const status = await dele.json();
                      if (status[0]['status'] == 200){
                        $(table_row_id).remove();
                        $.fn.chartfn();
                      }
                };
                deleteexpense();
            }else{
                var id = "#tr" + lastChar;
                $('#ecategorie').val($(id).find("td:eq(0)").text());
                $('#edate').val($(id).find("td:eq(2)").text());
                $('#eamount').val($(id).find("td:eq(1)").text().slice(0,-1));
                lc = lastChar;
            }
        });
      }
    
    let currentindex = 0;
    $.fn.chartfn = function(){ 
        $('#chart').empty();
        $('#chart').html('<canvas id="mycanvas" width="256" height="256"></canvas>');
        var ctx = $("#mycanvas").get(0).getContext("2d");
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
                pie_array.push({value: parseInt(data['amount']), label : data['category'],color: getRandomColor()});
                i++;
            });
            var piechart = new Chart(ctx).Pie(pie_array);
        });
    }

    function formEncode(obj) {
        var str = [];
        for(var p in obj)
        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        return str.join("&");
    }

    $.fn.getexpenses = function(){ 
        const getexpense = async () => {
            var tr = "";
            var user_id = "#user";
            var user_id_value = $(user_id).val();
            var requestObject = {id: user_id_value};
            const dele = await fetch("php/api/getexpensesapi.php", {
                method: "POST",
                headers: {
                    "Content-type": "application/x-www-form-urlencoded"
                },
                body: formEncode(requestObject)
              });
              const data = await dele.json();
              if(data.hasOwnProperty('status')){
                  console.log(data.hasOwnProperty('status'));
              }else{
              $.each(data, function(index, element) {
                currentindex = index;
                tr += "<tr id='tr" + index + "'><th scope='row'>*</th><input type='hidden' id='expense"+ index +"' value='"+element['id'] + "'>";
                tr += "<td>" + element['name'] + "</td><td>" + element['amount'] + "$</td><td>" + element['date'] + "</td>";
                tr += "<td><a class='link' data-toggle='modal' data-target='#editModal' id='edit"+ index +"'>Edit</a> <a class='link' id='delete"+ index +"'>Delete</a></td><tr>";
                });
                currentindex += 1;
                jQuery("#tblexpensis tbody").append(tr);
            }
            $.fn.link();
        };
        getexpense();
    }
      $.fn.getcategories = function() {
        const getcat = async () => {
            var user_id = "#user";
            var user_id_value = $(user_id).val();
            var requestObject = {
                id: user_id_value
            };
            const dele = await fetch("php/api/getcategorieapi.php", {
                method: "POST",
                headers: {
                    "Content-type": "application/x-www-form-urlencoded"
                },
                body: formEncode(requestObject)
            });
            const data = await dele.json();
            if(data.hasOwnProperty('status')){
                console.log(data.hasOwnProperty('status'));
            }else{
            $.each(data, function(index, element) {
                var categ = "<li><a href='#'>" + element['categorie'] +"</a></li>";
                $("#demolist").append(categ);
                $("#demolist2").append(categ);
            });
        }
            $('#demolist li').on('click', function(){
                $('#categorie').val($(this).text());
            });

            $('#demolist2 li').on('click', function(){
                $('#ecategorie').val($(this).text());
            });
        }
        getcat();
    }

    $.fn.getcategories();
    $.fn.getexpenses();
    $.fn.chartfn();

    $('#addr').on('click', function(){
        var date=  $('#date').val();
        var datestr = "'" + date + "'";
        var amount = $('#amount').val();
        var categorie = $('#categorie').val();
        var name = "'" + categorie + "'";
        if($.isNumeric(amount) && categorie.length>2 && date != ""){
        const addexp = async () => {
            var user_id = "#user";
            var user_id_value = $(user_id).val();
            var requestObject = {
                user_id: user_id_value,
                date: datestr,
                amount: amount,
                name: name
            };
            const add = await fetch("php/api/addexpenseapi.php", {
                method: "POST",
                headers: {
                    "Content-type": "application/x-www-form-urlencoded"
                },
                body: formEncode(requestObject)
            });
            const data = await add.json();
            if(data[0]['status']==200){
                $("#demolist").empty();
                $("#demolist2").empty();
                $.fn.getcategories();
                $.fn.chartfn();
                var newtr = "";
                newtr += "<tr id='tr" + currentindex + "'><th scope='row'>*</th><input type='hidden' id='expense"+ currentindex +"' value='"+data[0]['id'] + "'>";
                newtr += "<td>" + categorie + "</td><td>" + amount + "$</td><td>" + date + "</td>";
                newtr += "<td><a class='link' data-toggle='modal' data-target='#editModal' id='edit"+ currentindex +"'>Edit</a> <a class='link' id='delete"+ currentindex +"'>Delete</a></td><tr>";
                jQuery("#tblexpensis tbody").append(newtr);
                currentindex +=1;
                $.fn.link();
            }
        }
        addexp();
        $('#addr').attr('data-dismiss', 'modal');
    }
    });

    $('#edit').on('click', function(){
        var date=  $('#edate').val();
        var datestr = "'" + date + "'";
        var amount = $('#eamount').val();
        var categorie = $('#ecategorie').val();
        var idtag = "#expense"+lc;
        var id = $(idtag).val();
        var name = "'" + categorie + "'";
        if($.isNumeric(amount) && categorie.length>2 && date != ""){
        const addexp = async () => {
            var user_id = "#user";
            var user_id_value = $(user_id).val();
            var requestObject = {
                user_id: user_id_value,
                date: datestr,
                amount: amount,
                name: name,
                id:id
            };
            const add = await fetch("php/api/updateexpenseapi.php", {
                method: "POST",
                headers: {
                    "Content-type": "application/x-www-form-urlencoded"
                },
                body: formEncode(requestObject)
            });
            const data = await add.json();
            if(data[0]['status']==200){
                $("#demolist").empty();
                $("#demolist2").empty();
                $.fn.getcategories();
                $.fn.chartfn();
                var idt = "#tr" + lc;
                var newtr = "";
                newtr += "<th scope='row'>*</th><input type='hidden' id='expense"+ lc +"' value='"+ id + "'>";
                newtr += "<td>" + categorie + "</td><td>" + amount + "$</td><td>" + date + "</td>";
                newtr += "<td><a class='link' data-toggle='modal' data-target='#editModal' id='edit"+ lc +"'>Edit</a> <a class='link' id='delete"+ lc+"'>Delete</a></td>";
                $(idt).empty();
                $(idt).html(newtr);
                $.fn.link();
            }
        }
        addexp();
        $('#edit').attr('data-dismiss', 'modal');
    }
        
    });

});