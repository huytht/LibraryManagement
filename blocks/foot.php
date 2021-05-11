<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="public/templates/js/script.js"></script>
<script type="text/javascript">
    $("#btnRD").click(function(){
        var src = document.getElementById('txtD').innerHTML;
        $.ajax({
            url: "pages/api.php",
            type: 'POST',
            data: {
                "source": src
            },
            success: function(res){
                $('audio').attr('src', res);
                $('audio').get(0).load()
               $('audio').get(0).play()
            }
        })
    })
    $(document).ready(function(){
    // when any character press on the input field keyup function call
        $("#searchword").keyup(function(){
            $.ajax({
            type: "POST", // here used post method
            url: "pages/search_suggestion.php",//php file where retrive the post value and fetch all the matched item from database
            data:'searchterm='+$(this).val(),//send data or search term to readname file to process
            success: function(data){
                // get the output from database on success
                $("#id_suggesstions").show();//show the suggestions
                $("#id_suggesstions").html(data);//append data in the box for selection
                $("#searchword").css("background","#FFF");
            }
            });
        });
    });
    $("#btnSearch").click(function(){
        var sw = $('#searchword').val();
        $.ajax({
            url: 'pages/search.php',
            type: 'POST',
            data: {
                'keyWord': sw
            },
            success: function(res){
                
            }
        })
    })
</script>