<!--<script src="assets/css/script.js"></script>-->
<!--<script>
var white = false;

$(document).ready(function(){
    //$(function () {
  $("i").click(function(){
    var idRecette=jQuery(this).attr("data-idRecette");
    var idUtilisateur=jQuery(this).attr("data-idUtilisateur");
    
   
    if (white = !white) 
    {
           
            $(this).css("background-color", "#ff123f");
            
            $.ajax
            ({
                type:"POST",
                url: "controllerEspaceMembre/ajouterFavoris",
                cache:false,
                //dataType: "json",
                data:
                {
                    idRecette:idRecette,
                    idUtilisateur:idUtilisateur
                },
                success:function(data)
                {
                   
                }
            })
           
        } 
        
        else 
        {
            $(this).css("background-color", 'white');
            $.ajax
            ({
                type:"POST",
                url: "controllerEspaceMembre/enleverFavoris",
                //cache:false,
                //dataType: "json",
                data:
                {
                    idRecette:idRecette,
                    idUtilisateur:idUtilisateur
                },
                success:function(data)
                {
                   
                }
            })
           
            
           
        }
 
  });
});
</script>-->



<!--<script>
        function changeIcon()
        {
           
            //document.getElementById('bouton1').classList.toggle('colorffd');
            alert('salut');
        }
        
    </script>-->

    <!--<script>
        $(document).ready(function()
        {
            $("i").click(function()
            {
                alert('salut');
                //var idRecette=$(this).data('id');
                //alert(idRecette);
            });
        }
        
        )
    </script>-->