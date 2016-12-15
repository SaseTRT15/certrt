var Y;

    function previewCertrt(){
        //alert(nomeModulo);
        if (typeof location.origin === 'undefined') location.origin = location.protocol + '//' + location.host;
        
        var url2go = location.origin + "/moodle/mod/certrt/pdfpreview.php?";
        url2go += (Y.one("#id_certrttype")      ._node.value) == "A4_embedded" ? "" : "&type="  + (Y.one("#id_certrttype")      ._node.value);
        url2go += (Y.one("#id_columnimage")      ._node.value) == "0" ? "" : "&columnImg="  + (Y.one("#id_columnimage")      ._node.value);
        url2go += (Y.one("#id_printwmark")      ._node.value) == "0" ? "" : "&wmark="  + (Y.one("#id_printwmark")      ._node.value);
        url2go += (Y.one("#id_printseal")      ._node.value) == "0" ? "" : "&pseal="  + (Y.one("#id_printseal")      ._node.value);
        url2go += (Y.one("#id_printsignature")      ._node.value) == "0" ? "" : "&signature="  + (Y.one("#id_printsignature")      ._node.value);
        url2go += (Y.one("#id_orientation")      ._node.value) == "L" ? "" : "&orientation="  + (Y.one("#id_orientation")      ._node.value);
        url2go += (Y.one("#id_secondpageeditable")      ._node.value) == "" ? "" : "&spage="  + (Y.one("#id_secondpageeditable")      ._node.innerHTML);
        url2go += (Y.one("#id_customtext")      ._node.value) == "" ? "" : "&ctext="  + (Y.one("#id_customtext")      ._node.value);
        url2go += (Y.one("#id_borderstyle")      ._node.value) == "0" ? "" : "&bdrImg="  + (Y.one("#id_borderstyle")      ._node.value);
        url2go += (Y.one("#id_bordercolor")      ._node.value) == "0" ? "" : "&bclr="  + (Y.one("#id_bordercolor")      ._node.value);
        url2go += (Y.one("#id_printseal")      ._node.value) == "0" ? "" : "&seal="  + (Y.one("#id_printseal")      ._node.value);
        url2go += (Y.one("#id_printhours")      ._node.value) == "0" ? "" : "&chours="  + (Y.one("#id_printhours")      ._node.value);
         window.open(  url2go , "_blank", 
         "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=800,height=600");
         //Y.one("#id_name")._node.value = nomeModulo;
    }
