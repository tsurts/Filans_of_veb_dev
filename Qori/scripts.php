<script>
    $(document).ready(function() {
        $.ajax({
            url: 'list_of_flyts.php',
            success: function(c) {
                $('.main_page').html(c);
            }
        });

    });
    function page_changer(id){
        $.ajax({
            url: id,
            success: function(c) {
                $('.main_page').html(c);
            }
        });

    }
        function first_con(){
        var first_county=$('#first_county').val();
        window.open('?first_county='+first_county,'_self');  
    }

    function second_con(){
        var second_county=$('#second_county').val();
        window.open('?second_county='+second_county,'_self');  
    }
        function daj(id){    
        window.open('?seat='+id, '_self');
        
    }
    function load_popup(flight_id) {
            $.ajax({
                    url: 'yidvis_momenti.php',
                    type:'GET',
                    data:'flight_id='+flight_id,
                    success: function (c) {
                    
                    }

                });
    }
        function yidva(id) {
            $.ajax({
                    url: 'yidvis_momenti.php',
                    type:'GET',
                    data:'yidva='+id,
                    success: function (c) {
                    
                    }

                });
    }
            function leave(id) {
            $.ajax({
                    url: 'fun/check',
                    type:'GET',
                    data:'yidva='+id,
                    success: function (c) {
                    
                    }

                });
    }
    function clearinputs(){
        window.open('?washla=1','_self')
    }
    function page_reloader(id){
        $.ajax({
                    url: 'index.php',
                    type:'GET',
                    data:'page_reloader='+id,
                    success: function (c) {
                        location.reload();
                    }

                });
    }

</script>