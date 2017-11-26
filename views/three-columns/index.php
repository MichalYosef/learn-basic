<?php

$this->registerCss( <<< EOT_CSS

    .column
    {
        border:1px solid black;
    }

    #layout
    {
        position:relative;
        margin:0pt auto;
        width:1400px;
    }
    
    
    #colSx 
    {
        width:15%;
        float:left;
       
    }

    #colCenter 
    {
        width:15%;
        float:left;
        margin-left: 2%;
    }

    #colDx 
    {
        width:20%;
        float:left;
        margin-left: 2%;
    }
     
EOT_CSS
);

?>

<?php
$this->registerJS( <<< EOT_JS
    
    function resizeLayout()
    {
        var windowWidth = $(window).width();
        
        if(windowWidth > 1400)
        {
            $('#colSx').css('display', 'block');
            $('#colCenter').css('display', 'block');
            $('#colDx').css('display', 'block');
            $('#layout').css('width', 1400);
        }
        else if((windowWidth>1200)&&(windowWidth<=1400))
        {
            $('#colSx').css('display', 'block');
            $('#colCenter').css('display', 'block');
            $('#colDx').css('display', 'none');
            $('#layout').css('width', 1200);
        }
        else if(windowWidth<1200)
        {
            $('#colSx').css('display', 'none');
            $('#colCenter').css('display', 'block');
            $('#colDx').css('display', 'none');
            $('#layout').css('width', 1000);
        }
        
    }
   
    $(window).resize(function() {
        resizeLayout();
    });
    
    $(function() {
        resizeLayout();
    });
   
EOT_JS
);
?>

<!-- // #colSx 
// {
//     width:200px;
//     float:left;
// }

// #colCenter 
// {
//     width:1000px;
//     float:left;
// }

// #colDx 
// {
//     width:200px;
//     float:left;
// } -->

<div id="layout">
    <div id="colSx" class="column">
        <br /><br />
        Content of SX Column        
        <br /><br />
    </div>
    <div id="colCenter" class="column">
        <br /><br />
        Content of Central Column
        <br /><br />
    </div>
    <div id="colDx" class="column">
        <br /><br />
        Content of DX Column
        <br /><br />
    </div>
</div>

